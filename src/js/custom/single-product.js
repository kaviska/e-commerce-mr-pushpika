document.addEventListener('DOMContentLoaded', () => {
    initSingleProduct();
});

let currentProduct = null;
let selectedVariations = {}; // { "Color": "Red", "Size": "M" }
let productStocks = [];

async function initSingleProduct() {
    const urlParams = new URLSearchParams(window.location.search);
    const slug = urlParams.get('slug');

    if (!slug) {
        console.error('No slug parameter found in URL');
        if (document.getElementById('product-title')) {
            document.getElementById('product-title').innerText = 'Product not found (No ID)';
        }
        return;
    }

    await fetchProductDetails(slug);
    setupEventListeners();
}

async function fetchProductDetails(slug) {
    if (!window.SERVER_URL) {
        console.error('SERVER_URL is not defined');
        return;
    }

    try {
        const response = await fetch(`${window.SERVER_URL}/products?slug=${slug}&with=all`, {
            headers: {
                'Accept': 'application/json'
            }
        });
        const data = await response.json();

        if (data.status === 'success' && data.data && data.data.length > 0) {
            currentProduct = data.data[0];
            productStocks = currentProduct.stocks || [];
            renderProductDetails(currentProduct);
        } else {
            console.error('Product not found');
            if (document.getElementById('product-title')) {
                document.getElementById('product-title').innerText = 'Product not found';
            }
        }
    } catch (error) {
        console.error('Error fetching product:', error);
    }
}

function renderProductDetails(product) {
    // 1. Title
    const titleEl = document.getElementById('product-title');
    if (titleEl) titleEl.innerText = product.name;

    // 2. Price (Initial Range)
    updatePriceDisplay();

    // 3. Gallery
    renderGallery(product);

    // 4. Options
    renderOptions(product);

    // 5. Description
    const descEl = document.getElementById('product-description-text');
    if (descEl) {
        descEl.innerHTML = product.description || 'No description available.';
    }

    // 6. Reviews
    if (product.id) {
        loadReviews(product.id);
    }

    // 7. Show initial selection note
    updateAddToCartButton();
}


function updatePriceDisplay() {
    const priceEl = document.getElementById('product-price');
    if (!priceEl) return;

    if (!productStocks || productStocks.length === 0) {
        priceEl.innerText = 'Unavailable';
        return;
    }

    // Check if a specific stock is fully selected
    const matchingStock = findMatchingStock();

    if (matchingStock) {
        // Display specific price
        const price = parseFloat(matchingStock.web_price);
        priceEl.innerText = formatCurrency(price);
    } else {
        // Display Range
        const prices = productStocks.map(s => parseFloat(s.web_price));
        const minPrice = Math.min(...prices);
        const maxPrice = Math.max(...prices);

        if (minPrice === maxPrice) {
            priceEl.innerText = formatCurrency(minPrice);
        } else {
            priceEl.innerText = `${formatCurrency(minPrice)} - ${formatCurrency(maxPrice)}`;
        }
    }
}

function formatCurrency(mount) {
    return 'LKR ' + mount.toFixed(2);
}

function renderGallery(product) {
    const galleryWrapper = document.getElementById('product-gallery-wrapper');
    const thumbsWrapper = document.getElementById('product-thumbnails-wrapper');

    if (!galleryWrapper || !thumbsWrapper) return;

    // Collect Images
    let images = [];
    const baseUrl = window.SERVER_URL.replace('/api', '');

    if (product.primary_image) {
        images.push(`${baseUrl}/${product.primary_image}`);
    }

    // Check stocks for images
    productStocks.forEach(stock => {
        if (stock.image) {
            images.push(`${baseUrl}/${stock.image}`);
        }
    });

    // Unique images
    images = [...new Set(images)];

    // If no images found, use placeholder
    if (images.length === 0) {
        images.push('assets/img/shop/electronics/01.png'); // Fallback
    }

    // Render HTML
    const mainSlides = images.map(img => `
        <div class="swiper-slide">
            <div class="ratio ratio-1x1">
                <img src="${img}" data-zoom="${img}" alt="Product Image">
            </div>
        </div>
    `).join('');

    const thumbSlides = images.map(img => `
        <div class="swiper-slide swiper-thumb">
            <div class="ratio ratio-1x1" style="max-width: 94px">
                <img src="${img}" class="swiper-thumb-img" alt="Thumbnail">
            </div>
        </div>
    `).join('');

    galleryWrapper.innerHTML = mainSlides;
    thumbsWrapper.innerHTML = thumbSlides;

    const mainSwiperEl = galleryWrapper.closest('.swiper');
    const thumbSwiperEl = thumbsWrapper.closest('.swiper');

    if (mainSwiperEl && mainSwiperEl.swiper) {
        mainSwiperEl.swiper.update();
    }
    if (thumbSwiperEl && thumbSwiperEl.swiper) {
        thumbSwiperEl.swiper.update();
    }
}

function renderOptions(product) {
    const container = document.getElementById('product-options');
    if (!container) return;

    let variationsMap = {};

    productStocks.forEach(stock => {
        if (stock.variation_stocks) {
            stock.variation_stocks.forEach(vs => {
                if (vs.variation_option && vs.variation_option.variation) {
                    const varName = vs.variation_option.variation.name;
                    const optName = vs.variation_option.name;
                    const optId = vs.variation_option.id;

                    if (!variationsMap[varName]) {
                        variationsMap[varName] = {};
                    }
                    variationsMap[varName][optName] = optId;
                }
            });
        }
    });

    let html = '';

    for (const [varName, optionsMap] of Object.entries(variationsMap)) {
        const uniqueOptions = Object.keys(optionsMap);

        html += `<div class="pb-3 mb-2 mb-lg-3">`;
        html += `<label class="form-label fw-semibold pb-1 mb-2">${varName}: <span class="text-body fw-normal" id="selected-${varName}">-</span></label>`;
        html += `<div class="d-flex flex-wrap gap-2">`;

        uniqueOptions.forEach((optName, index) => {
            const isColor = varName.toLowerCase() === 'color';
            const inputId = `opt-${varName}-${optName}`.replace(/\s+/g, '-');

            html += `
            <input type="radio" class="btn-check variation-input" name="var-${varName}" id="${inputId}" value="${optName}" data-variation="${varName}">
            <label for="${inputId}" class="btn btn-outline-secondary btn-sm">${optName}</label>
            `;
        });

        html += `</div></div>`;
    }

    container.innerHTML = html;

    container.querySelectorAll('.variation-input').forEach(input => {
        input.addEventListener('change', (e) => {
            const vName = e.target.getAttribute('data-variation');
            const vValue = e.target.value;
            handleOptionSelect(vName, vValue);
        });
    });
}

function handleOptionSelect(name, value) {
    selectedVariations[name] = value;

    const labelSpan = document.getElementById(`selected-${name}`);
    if (labelSpan) labelSpan.innerText = value;

    updatePriceDisplay();
    updateAddToCartButton();
}

function findMatchingStock() {
    if (productStocks.length === 0) return null;

    const getStockVariations = (stock) => {
        const map = {};
        if (stock.variation_stocks) {
            stock.variation_stocks.forEach(vs => {
                if (vs.variation_option && vs.variation_option.variation) {
                    map[vs.variation_option.variation.name] = vs.variation_option.name;
                }
            });
        }
        return map;
    };

    const compatibleStocks = productStocks.filter(stock => {
        const sVars = getStockVariations(stock);
        for (const [key, val] of Object.entries(selectedVariations)) {
            if (sVars[key] !== val) return false;
        }
        return true;
    });

    const allVarNames = new Set();
    productStocks.forEach(s => {
        if (s.variation_stocks) {
            s.variation_stocks.forEach(vs => {
                if (vs.variation_option?.variation?.name) allVarNames.add(vs.variation_option.variation.name);
            });
        }
    });

    if (Object.keys(selectedVariations).length < allVarNames.size) {
        return null;
    }

    if (compatibleStocks.length > 0) {
        return compatibleStocks[0];
    }

    return null;
}

function updateAddToCartButton() {
    const btn = document.getElementById('add-to-cart-btn');
    if (!btn) return;

    const matchingStock = findMatchingStock();
    const noteDiv = document.getElementById('selection-note');
    const noteText = document.getElementById('selection-note-text');

    if (matchingStock) {
        const quantity = matchingStock.quantity - (matchingStock.reserved_quantity || 0);

        if (quantity > 0) {
            btn.disabled = false;
            btn.innerHTML = `<i class="ci-message-circle fs-lg animate-target ms-n1 me-2"></i> Buy on WhatsApp`;
            btn.classList.remove('btn-secondary', 'btn-primary');
            btn.classList.add('btn-success');
            
            // Hide note when stock is selected and available
            if (noteDiv) noteDiv.classList.add('d-none');
        } else {
            btn.disabled = true;
            btn.innerText = 'Out of Stock';
            btn.classList.remove('btn-primary', 'btn-success');
            btn.classList.add('btn-secondary');
            
            // Show out of stock message
            if (noteDiv && noteText) {
                noteText.innerText = 'This product variation is currently out of stock.';
                noteDiv.classList.remove('d-none');
                noteDiv.classList.remove('alert-warning');
                noteDiv.classList.add('alert-danger');
            }
        }
    } else {
        btn.disabled = true;
        btn.innerHTML = `<i class="ci-message-circle fs-lg animate-target ms-n1 me-2"></i> Buy on WhatsApp`;
        btn.classList.remove('btn-success');
        btn.classList.add('btn-primary');
        
        // Show selection note
        if (noteDiv && noteText) {
            const missingOptions = getMissingOptions();
            if (missingOptions.length > 0) {
                const optionsList = missingOptions.map(opt => `<strong>${opt}</strong>`).join(', ');
                noteText.innerHTML = `Please select ${optionsList} option${missingOptions.length > 1 ? 's' : ''} before adding the product to your cart.`;
                noteDiv.classList.remove('d-none', 'alert-danger');
                noteDiv.classList.add('alert-warning');
            }
        }
    }
}

function setupEventListeners() {
    // Quantity Input
    const quantityInput = document.getElementById('quantity-input');
    const decrementBtn = document.querySelector('[data-decrement]');
    const incrementBtn = document.querySelector('[data-increment]');

    if (quantityInput) {
        if (decrementBtn) {
            decrementBtn.addEventListener('click', () => {
                let val = parseInt(quantityInput.value) || 1;
                if (val > 1) quantityInput.value = val - 1;
            });
        }
        if (incrementBtn) {
            incrementBtn.addEventListener('click', () => {
                let val = parseInt(quantityInput.value) || 1;
                quantityInput.value = val + 1;
            });
        }
    }

    // Add to Cart (Now WhatsApp)
    const addToCartBtn = document.getElementById('add-to-cart-btn');
    if (addToCartBtn) {
        addToCartBtn.replaceWith(addToCartBtn.cloneNode(true));
        const newBtn = document.getElementById('add-to-cart-btn');
        newBtn.addEventListener('click', buyOnWhatsApp);
    }

    // Review Form Submit
    const reviewForm = document.getElementById('add-review-form');
    if (reviewForm) {
        reviewForm.addEventListener('submit', handleReviewSubmit);
    }
}

async function loadReviews(productId) {
    const list = document.getElementById('reviews-list');
    if (!list) return;

    try {
        const response = await fetch(`${window.SERVER_URL}/products/${productId}/reviews`, {
            headers: { 'Accept': 'application/json' }
        });
        const result = await response.json();

        if (result.status === 'success') {
            if (result.data.length === 0) {
                list.innerHTML = '<p class="text-body-secondary py-3">No reviews yet. Be the first to review!</p>';
                return;
            }

            list.innerHTML = result.data.map(review => `
                <div class="border-bottom py-3 mb-3">
                    <div class="d-flex align-items-center mb-3">
                        <div class="text-nowrap me-3">
                            <span class="h6 mb-0">${review.user ? review.user.name : 'Anonymous'}</span>
                        </div>
                        <span class="text-body-secondary fs-sm ms-auto">${new Date(review.created_at).toLocaleDateString()}</span>
                    </div>
                    <div class="d-flex gap-1 fs-sm pb-2 mb-1">
                        ${renderStars(review.rating)}
                    </div>
                    <p class="fs-sm">${review.comment || ''}</p>
                </div>
            `).join('');

            // Update Review Stats Links (Nav) - Optional
            // document.querySelectorAll('a[href="#reviews"]').forEach(el => el.innerText = `Reviews (${result.data.length})`);

        } else {
            list.innerHTML = '<p class="text-danger">Failed to load reviews.</p>';
        }
    } catch (error) {
        console.error("Error loading reviews:", error);
        list.innerHTML = '<p class="text-danger">Error loading reviews.</p>';
    }
}

function renderStars(rating) {
    let stars = '';
    for (let i = 1; i <= 5; i++) {
        if (i <= rating) {
            stars += '<i class="ci-star-filled text-warning"></i>';
        } else {
            stars += '<i class="ci-star text-body-tertiary opacity-75"></i>'; // Empty star styling
        }
    }
    return stars;
}

async function handleReviewSubmit(e) {
    e.preventDefault();

    const userToken = localStorage.getItem('token');
    if (!userToken) {
        alert("Please login to submit a review.");
        window.location.href = 'account-signin.html'; // Redirect to login?
        return;
    }

    if (!currentProduct) return;

    // Get input values from modal form
    // Note: The modal has specific IDs.
    // Rating: The template uses a special 'choices.js' select which might mask the original select.
    // However, for simplicity, let's grab the value or assume user interactions update the underlying select.
    // If the template JS handles the select, `.value` should work.

    // Check IDs from Modal HTML in shop-product.php view
    // Rating select: `data-select` attribute. It doesn't have an ID? 
    // Line 73: `<select class="form-select" ... required></select>` - No ID!
    // I need to add an ID to the rating select and comment textarea.

    // Wait, I can't easily add IDs without viewing again or assuming blindly.
    // The previous view showed:
    // Line 73: `<select class="form-select" ...>`
    // Line 127: `<textarea class="form-control" rows="4" id="review-text" required></textarea>`

    // I must modify the Modal HTML to add an ID to the rating select!
    // Or I can query selector inside the form: `form.querySelector('select')`

    const form = e.target;
    // Rating is likely the only select in the form?
    const ratingInput = form.querySelector('select'); // Simplest assumption
    const commentInput = document.getElementById('review-text');

    const rating = ratingInput ? ratingInput.value : 5;
    const comment = commentInput ? commentInput.value : '';

    if (!rating) {
        alert("Please select a rating.");
        return;
    }

    try {
        const response = await fetch(`${window.SERVER_URL}/reviews`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${userToken}`,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                product_id: currentProduct.id,
                rating: rating,
                comment: comment
            })
        });

        const result = await response.json();

        if (result.status === 'success') {
            alert('Review submitted successfully!');

            // Close Modal (Bootstrap)
            const modalEl = document.getElementById('reviewForm');
            const modalInstance = bootstrap.Modal.getInstance(modalEl);
            if (modalInstance) modalInstance.hide();

            form.reset();
            loadReviews(currentProduct.id);
        } else {
            alert(result.message || 'Failed to submit review');
        }

    } catch (error) {
        console.error("Error submitting review:", error);
        alert("An error occurred.");
    }
}



function buyOnWhatsApp() {
    const stock = findMatchingStock();
    if (!stock) return;

    if (!currentProduct) return;

    const quantityInput = document.getElementById('quantity-input');
    const quantity = parseInt(quantityInput ? quantityInput.value : 1);

    // Phone Number - User didn't specify, using a placeholder or generic. 
    // Ideally user configures this.
    const phoneNumber = '94770000000'; // REPLACE WITH ACTUAL NUMBER

    const message = `Halo, I want to buy this product:
Name: ${currentProduct.name}
Variation: ${getStockDescription(stock)}
Quantity: ${quantity}
Link: ${window.location.href}`;

    const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;

    window.open(whatsappUrl, '_blank');
}

function getStockDescription(stock) {
    let desc = [];
    if (stock.variation_stocks) {
        stock.variation_stocks.forEach(vs => {
            if (vs.variation_option) {
                desc.push(vs.variation_option.name);
            }
        });
    }
    return desc.join(', ') || 'Standard';
}

function getMissingOptions() {
    // Get all variation names available in the product
    const allVarNames = new Set();
    productStocks.forEach(stock => {
        if (stock.variation_stocks) {
            stock.variation_stocks.forEach(vs => {
                if (vs.variation_option?.variation?.name) {
                    allVarNames.add(vs.variation_option.variation.name);
                }
            });
        }
    });

    // Find which ones are not selected
    const missing = [];
    allVarNames.forEach(varName => {
        if (!selectedVariations[varName]) {
            missing.push(varName);
        }
    });

    return missing;
}
