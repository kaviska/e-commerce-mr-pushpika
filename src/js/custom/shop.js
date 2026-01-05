
// Helper function to get URL parameters
function getURLParameter(name) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
}

// Pagination variables
let allProducts = [];
let currentPage = 1;
const productsPerPage = 12;
let userChangedPrice = false; // Track if user has interacted with price slider

document.addEventListener('DOMContentLoaded', async () => {
    await loadFilters();
    loadProducts();

    // Event Listeners for static filters
    const stockFilter = document.getElementById('filter-in-stock');
    if (stockFilter) {
        stockFilter.addEventListener('change', () => loadProducts());
    }

    // Sort dropdown
    const sortSelect = document.getElementById('sort-select');
    if (sortSelect) {
        sortSelect.addEventListener('change', () => loadProducts());
    }

    // Price inputs - handle both 'input' and 'change' events for range slider compatibility
    const priceMin = document.querySelector('[data-range-slider-min]');
    const priceMax = document.querySelector('[data-range-slider-max]');

    // Debounce price update
    let priceTimeout;
    const handlePriceChange = () => {
        userChangedPrice = true; // Mark that user has interacted with price
        clearTimeout(priceTimeout);
        priceTimeout = setTimeout(() => loadProducts(), 800);
    };

    if (priceMin) {
        priceMin.addEventListener('change', handlePriceChange);
        priceMin.addEventListener('input', handlePriceChange);
    }
    if (priceMax) {
        priceMax.addEventListener('change', handlePriceChange);
        priceMax.addEventListener('input', handlePriceChange);
    }

    // Hook into noUiSlider if it exists
    const rangeSliderContainer = document.querySelector('[data-range-slider]');
    if (rangeSliderContainer) {
        const rangeSliderUI = rangeSliderContainer.querySelector('.range-slider-ui');
        if (rangeSliderUI && rangeSliderUI.noUiSlider) {
            // Listen to the noUiSlider 'change' event (fired when user stops dragging)
            rangeSliderUI.noUiSlider.on('change', handlePriceChange);
        } else {
            // If noUiSlider hasn't initialized yet, wait for it
            setTimeout(() => {
                const rangeSliderUI = rangeSliderContainer.querySelector('.range-slider-ui');
                if (rangeSliderUI && rangeSliderUI.noUiSlider) {
                    rangeSliderUI.noUiSlider.on('change', handlePriceChange);
                }
            }, 500);
        }
    }

    // Clear All Filters
    const clearAllBtn = document.getElementById('clear-all-filters');
    if (clearAllBtn) {
        clearAllBtn.addEventListener('click', () => {
            // Uncheck all checkboxes
            document.querySelectorAll('input[type="checkbox"]').forEach(el => el.checked = false);

            // Reset price inputs
            const priceMin = document.querySelector('[data-range-slider-min]');
            const priceMax = document.querySelector('[data-range-slider-max]');
            userChangedPrice = false; // Reset the flag
            if (priceMin) priceMin.value = '';
            if (priceMax) priceMax.value = '';

            // Trigger input event to update slider UI if range slider library is active
            if (priceMin) priceMin.dispatchEvent(new Event('input', { bubbles: true }));
            if (priceMax) priceMax.dispatchEvent(new Event('input', { bubbles: true }));

            loadProducts();
        });
    }
});

async function loadFilters() {
    try {
        // Fetch Categories
        const catRes = await fetch(`${window.SERVER_URL}/categories?category_with_product_count=true`);
        const catData = await catRes.json();
        renderCategories(catData.data || []);

        // Fetch Brands
        const brandRes = await fetch(`${window.SERVER_URL}/brands`);
        const brandData = await brandRes.json();
        renderBrands(brandData.data || []);

    } catch (e) {
        console.error('Error loading filters:', e);
    }
}

function renderCategories(categories) {
    const container = document.getElementById('filter-categories');
    if (!container) return;

    let html = '';
    categories.forEach(cat => {
        // Assuming API returns id, name, products_count (or product_count)
        const count = cat.products_count !== undefined ? cat.products_count : (cat.product_count || 0);

        // Using checkbox style but finding a way to make it look like the nav links if desired,
        // or just simple checkboxes as per typical filter logic.
        // User requested: "categories categories?category_with_product_count=true"
        // Let's use a nice checkbox list similar to Brands for consistency and multi-select capability.
        // But original design was nav links. Let's try to preserve nav link look but make it effectively a filter.
        // Actually, checkboxes are safer for "with paramter ... category_ids[]=3".

        html += `
        <li class="nav d-block pt-2 mt-1">
            <div class="form-check d-flex align-items-center justify-content-between w-100">
                <input class="form-check-input filter-category-input" type="checkbox" id="cat-${cat.id}" value="${cat.id}">
                <label class="form-check-label d-flex align-items-center justify-content-between w-100 ps-2 cursor-pointer" for="cat-${cat.id}">
                    <span class="animate-target text-truncate me-3">${cat.name}</span>
                    <span class="text-body-secondary fs-xs ms-auto">${count}</span>
                </label>
            </div>
        </li>
        `;
    });

    container.innerHTML = html;

    // Add listeners
    container.querySelectorAll('.filter-category-input').forEach(input => {
        input.addEventListener('change', () => loadProducts());
    });
}

function renderBrands(brands) {
    const container = document.getElementById('filter-brands');
    if (!container) return;

    // Get brand ID from URL parameter
    const urlBrandId = getURLParameter('brand');

    let html = '';
    brands.forEach(brand => {
        // Assuming brand object has id, name. Count might not be there based on API description/brands.js
        // If count is not available, we omit it.

        // Check if this brand matches the URL parameter
        const isChecked = urlBrandId && brand.id.toString() === urlBrandId ? 'checked' : '';

        html += `
        <div class="d-flex align-items-center justify-content-between">
            <div class="form-check">
                <input type="checkbox" class="form-check-input filter-brand-input" id="brand-${brand.id}" value="${brand.id}" ${isChecked}>
                <label for="brand-${brand.id}" class="form-check-label text-body-emphasis">${brand.name}</label>
            </div>
            <!-- <span class="text-body-secondary fs-xs">Count?</span> -->
        </div>
        `;
    });

    container.innerHTML = html;

    // Add listeners
    container.querySelectorAll('.filter-brand-input').forEach(input => {
        input.addEventListener('change', () => loadProducts());
    });
}

async function loadProducts() {
    const grid = document.getElementById('product-grid');
    if (!grid) return;

    // Collect Filters
    const params = new URLSearchParams();
    params.append('with', 'all');
    params.append('limit', '100000');

    // Sort
    const sortSelect = document.getElementById('sort-select');
    if (sortSelect && sortSelect.value) {
        params.append('sortBy', sortSelect.value);
    }

    // Categories
    document.querySelectorAll('.filter-category-input:checked').forEach(input => {
        params.append('category_ids[]', input.value);
    });

    // Brands
    document.querySelectorAll('.filter-brand-input:checked').forEach(input => {
        params.append('brand_ids[]', input.value);
    });

    // In Stock
    const stockInput = document.getElementById('filter-in-stock');
    if (stockInput && stockInput.checked) {
        params.append('in_stock', '1');
    }

    // Price - apply if values are present AND user has interacted with slider
    const priceMin = document.querySelector('[data-range-slider-min]');
    const priceMax = document.querySelector('[data-range-slider-max]');
    if (userChangedPrice && priceMin && priceMin.value && priceMin.value !== '') {
        params.append('web_price_min', priceMin.value);
    }
    if (userChangedPrice && priceMax && priceMax.value && priceMax.value !== '') {
        params.append('web_price_max', priceMax.value);
    }

    // Check URL for discount parameter
    const urlDiscount = getURLParameter('has_web_discount') || getURLParameter('sale');
    console.log('URL discount parameter:', urlDiscount);
    if (urlDiscount === '1' || urlDiscount === 'true') {
        params.append('has_web_discount', '1');
    }

    // Show loading
    grid.style.opacity = '0.5';

    try {
        const url = `${window.SERVER_URL}/products?${params.toString()}`;
        console.log('Fetching:', url); // Debug

        const response = await fetch(url);
        if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

        const result = await response.json();
        const products = result.data || result;

        if (Array.isArray(products)) {
            // Store all products for pagination
            allProducts = products;
            currentPage = 1;
            
            // Render products with pagination
            renderProductsWithPagination();

            // Update counts and selected filters UI
            const countEl = document.getElementById('product-count');
            if (countEl) countEl.textContent = products.length;

            updateSelectedFilters();
        } else {
            console.error('Products data is not an array:', products);
            grid.innerHTML = '<div class="col-12 text-center">No products found.</div>';
        }

    } catch (error) {
        console.error('Error fetching products:', error);
        grid.innerHTML = '<div class="col-12 text-center text-danger">Failed to load products.</div>';
    } finally {
        grid.style.opacity = '1';
    }
}

function renderProducts(products, container) {
    container.innerHTML = ''; // Clear container

    if (products.length === 0) {
        container.innerHTML = '<div class="col-12 text-center py-5"><h3>No products found matching your criteria.</h3></div>';
        return;
    }

    products.forEach(product => {
        // --- Price Calculation ---
        let priceDisplay = '';
        let minPrice = Infinity;
        let maxPrice = -Infinity;
        let minOriginalPrice = Infinity;
        let maxOriginalPrice = -Infinity;
        let hasStock = false;
        let hasDiscount = false;
        let maxDiscountPercent = 0;

        if (product.stocks && product.stocks.length > 0) {
            hasStock = true;
            product.stocks.forEach(stock => {
                const price = parseFloat(stock.web_price) || 0;
                const discount = parseFloat(stock.web_discount) || 0;
                const finalPrice = Math.max(0, price - discount);

                if (finalPrice < minPrice) minPrice = finalPrice;
                if (finalPrice > maxPrice) maxPrice = finalPrice;
                if (price < minOriginalPrice) minOriginalPrice = price;
                if (price > maxOriginalPrice) maxOriginalPrice = price;

                if (discount > 0) {
                    hasDiscount = true;
                    const discountPercent = Math.round((discount / price) * 100);
                    if (discountPercent > maxDiscountPercent) maxDiscountPercent = discountPercent;
                }
            });

            if (minPrice === Infinity) {
                priceDisplay = 'Price unavailable';
            } else if (minPrice === maxPrice) {
                if (hasDiscount) {
                    priceDisplay = `
                        <div class="d-flex align-items-center gap-2">
                            <span class="h6 mb-0">${formatCurrency(minPrice)}</span>
                            <del class="text-body-tertiary fs-sm">${formatCurrency(minOriginalPrice)}</del>
                        </div>
                    `;
                } else {
                    priceDisplay = formatCurrency(minPrice);
                }
            } else {
                if (hasDiscount) {
                    priceDisplay = `
                        <div class="d-flex flex-column">
                            <span class="h6 mb-0">${formatCurrency(minPrice)} - ${formatCurrency(maxPrice)}</span>
                            <del class="text-body-tertiary fs-xs">${formatCurrency(minOriginalPrice)} - ${formatCurrency(maxOriginalPrice)}</del>
                        </div>
                    `;
                } else {
                    priceDisplay = `${formatCurrency(minPrice)} - ${formatCurrency(maxPrice)}`;
                }
            }
        } else {
            priceDisplay = 'Out of Stock';
        }

        // --- Variation Logic (Hover Details) ---
        let variationsHtml = '';
        const variationsMap = new Map();

        if (product.stocks) {
            product.stocks.forEach(stock => {
                if (stock.variation_stocks && Array.isArray(stock.variation_stocks)) {
                    stock.variation_stocks.forEach(vs => {
                        if (vs.variation_option && vs.variation_option.variation) {
                            const variationName = vs.variation_option.variation.name;
                            const optionName = vs.variation_option.name;

                            if (!variationsMap.has(variationName)) {
                                variationsMap.set(variationName, new Set());
                            }
                            variationsMap.get(variationName).add(optionName);
                        }
                    });
                }
            });
        }

        variationsMap.forEach((optionsSet, variationName) => {
            const optionsList = Array.from(optionsSet).join(', ');
            variationsHtml += `
            <li class="d-flex align-items-center">
                <span class="fs-xs">${variationName}:</span>
                <span class="d-block flex-grow-1 border-bottom border-dashed px-1 mt-2 mx-2"></span>
                <span class="text-dark-emphasis fs-xs fw-medium text-end">${optionsList}</span>
            </li>`;
        });

        // --- Helper Data ---
        const categoryName = product.category ? product.category.name : '';
        const brandName = product.brand ? product.brand.name : '';

        let imageUrl = product.primary_image || 'assets/img/shop/electronics/placeholder.png';
        if (imageUrl && !imageUrl.startsWith('http') && !imageUrl.startsWith('assets')) {
            const baseUrl = window.SERVER_URL.replace(/\/api\/?$/, '');
            imageUrl = `${baseUrl}/${imageUrl.replace(/^\//, '')}`;
        }

        const rating = parseFloat(product.reviews_avg_rating) || 0;
        const reviewCount = product.reviews_count || 0;

        // --- HTML Construction ---
        const cardHtml = `
              <div class="col">
                <div class="product-card animate-underline hover-effect-opacity bg-body rounded">
                  <div class="position-relative">
                    ${hasDiscount ? `<div class="position-absolute top-0 start-0 m-3 z-2">
                      <span class="badge bg-danger text-white fs-xs px-2 py-1">
                       %
                      </span>
                    </div>` : ''}
                    <a class="d-block rounded-top overflow-hidden p-3 p-sm-4" href="shop-product.php?slug=${product.slug}">
                      <div class="ratio" style="--cz-aspect-ratio: calc(240 / 258 * 100%)">
                        <img src="${imageUrl}" alt="${product.name}" style="object-fit: contain;">
                      </div>
                    </a>
                  </div>
                  <div class="w-100 min-w-0 px-1 pb-2 px-sm-3 pb-sm-3">
                    <div class="d-flex align-items-center gap-2 mb-2">
                      <div class="d-flex gap-1 fs-xs">
                        ${renderStars(rating)}
                      </div>
                      <span class="text-body-tertiary fs-xs">(${reviewCount})</span>
                    </div>
                    <h3 class="pb-1 mb-2">
                      <a class="d-block fs-sm fw-medium text-truncate" href="shop-product.php?slug=${product.slug}">
                        <span class="animate-target">${product.name}</span>
                      </a>
                    </h3>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="${hasDiscount ? '' : 'h6 lh-1 mb-0'}">${priceDisplay}</div>
                      <button type="button" class="product-card-button btn btn-icon btn-secondary animate-slide-end ms-2" aria-label="Add to Cart">
                        <i class="ci-shopping-cart fs-base animate-target"></i>
                      </button>
                    </div>
                  </div>
                  <div class="product-card-details position-absolute top-100 start-0 w-100 bg-body rounded-bottom shadow mt-n2 p-3 pt-1">
                    <span class="position-absolute top-0 start-0 w-100 bg-body mt-n2 py-2"></span>
                    <ul class="list-unstyled d-flex flex-column gap-2 m-0">
                      ${categoryName ? `
                      <li class="d-flex align-items-center">
                        <span class="fs-xs">Category:</span>
                        <span class="d-block flex-grow-1 border-bottom border-dashed px-1 mt-2 mx-2"></span>
                        <span class="text-dark-emphasis fs-xs fw-medium text-end">${categoryName}</span>
                      </li>` : ''}
                      
                      ${brandName ? `
                      <li class="d-flex align-items-center">
                        <span class="fs-xs">Brand:</span>
                        <span class="d-block flex-grow-1 border-bottom border-dashed px-1 mt-2 mx-2"></span>
                        <span class="text-dark-emphasis fs-xs fw-medium text-end">${brandName}</span>
                      </li>` : ''}
                      
                      ${variationsHtml}
                    </ul>
                  </div>
                </div>
              </div>
        `;

        container.insertAdjacentHTML('beforeend', cardHtml);
    });
}

function formatCurrency(value) {
    return new Intl.NumberFormat('en-LK', { style: 'currency', currency: 'LKR', minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(value);
}

function renderStars(rating) {
    let starsHtml = '';
    for (let i = 1; i <= 5; i++) {
        if (rating >= i) {
            starsHtml += '<i class="ci-star-filled text-warning"></i>';
        } else if (rating >= i - 0.5) {
            starsHtml += '<i class="ci-star-half text-warning"></i>';
        } else {
            starsHtml += '<i class="ci-star text-body-tertiary opacity-75"></i>';
        }
    }
    return starsHtml;
}

function updateSelectedFilters() {
    const container = document.getElementById('selected-filters-container');
    const clearBtn = document.getElementById('clear-all-filters');
    if (!container) return;

    // Helper to create tag
    const createTag = (text, onClick) => {
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'btn btn-sm btn-secondary animate-slide-end ms-2 mb-2'; // Added margins
        btn.innerHTML = `<i class="ci-close fs-sm ms-n1 me-1"></i>${text}`;
        btn.addEventListener('click', onClick);
        return btn;
    };

    const tags = [];

    // Stock
    const stockInput = document.getElementById('filter-in-stock');
    if (stockInput && stockInput.checked) {
        tags.push(createTag('In Stock', () => {
            stockInput.checked = false;
            loadProducts();
        }));
    }

    // Categories
    document.querySelectorAll('.filter-category-input:checked').forEach(input => {
        // Find label text
        const label = document.querySelector(`label[for="${input.id}"] span.animate-target`);
        const text = label ? label.textContent : 'Category';
        tags.push(createTag(text, () => {
            input.checked = false;
            loadProducts();
        }));
    });

    // Brands
    document.querySelectorAll('.filter-brand-input:checked').forEach(input => {
        const label = document.querySelector(`label[for="${input.id}"]`);
        const text = label ? label.textContent : 'Brand';
        tags.push(createTag(text, () => {
            input.checked = false;
            loadProducts();
        }));
    });

    // Price - show if values are present AND user has changed them
    const priceMinInput = document.querySelector('[data-range-slider-min]');
    const priceMaxInput = document.querySelector('[data-range-slider-max]');
    if (userChangedPrice && priceMinInput && priceMaxInput) {
        if (priceMinInput.value !== '' && priceMaxInput.value !== '') {
            const min = parseInt(priceMinInput.value) || 0;
            const max = parseInt(priceMaxInput.value) || 0;
            
            const display = `$${min} - $${max}`;
            tags.push(createTag(display, () => {
                // Reset to empty
                userChangedPrice = false; // Reset the flag
                priceMinInput.value = '';
                priceMaxInput.value = '';
                // Dispatch events to update slider UI
                priceMinInput.dispatchEvent(new Event('input', { bubbles: true }));
                priceMaxInput.dispatchEvent(new Event('input', { bubbles: true }));
                loadProducts();
            }));
        }
    }

    // Render
    container.innerHTML = '';
    tags.forEach(tag => container.appendChild(tag));

    if (clearBtn) {
        container.appendChild(clearBtn);
        if (tags.length > 0) {
            clearBtn.classList.remove('d-none');
        } else {
            clearBtn.classList.add('d-none');
        }
    }
}
// Pagination Functions
function renderProductsWithPagination() {
    const grid = document.getElementById('product-grid');
    if (!grid) return;

    // Calculate pagination
    const totalProducts = allProducts.length;
    const totalPages = Math.ceil(totalProducts / productsPerPage);
    
    // Get products for current page
    const startIndex = (currentPage - 1) * productsPerPage;
    const endIndex = startIndex + productsPerPage;
    const productsToShow = allProducts.slice(startIndex, endIndex);
    
    // Render products
    renderProducts(productsToShow, grid);
    
    // Render pagination
    renderPagination(totalPages);
}

function renderPagination(totalPages) {
    const paginationContainer = document.getElementById('pagination-container');
    if (!paginationContainer) return;
    
    paginationContainer.innerHTML = '';
    
    if (totalPages <= 1) return;
    
    // Previous button
    const prevLi = document.createElement('li');
    prevLi.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
    prevLi.innerHTML = `
        <a class="page-link" href="#" aria-label="Previous">
            <i class="ci-chevron-left"></i>
        </a>
    `;
    if (currentPage > 1) {
        prevLi.querySelector('a').addEventListener('click', (e) => {
            e.preventDefault();
            goToPage(currentPage - 1);
        });
    }
    paginationContainer.appendChild(prevLi);
    
    // Page numbers
    for (let i = 1; i <= totalPages; i++) {
        const pageLi = document.createElement('li');
        pageLi.className = `page-item ${i === currentPage ? 'active' : ''}`;
        pageLi.innerHTML = `<a class="page-link" href="#">${i}</a>`;
        
        if (i !== currentPage) {
            pageLi.querySelector('a').addEventListener('click', (e) => {
                e.preventDefault();
                goToPage(i);
            });
        }
        
        paginationContainer.appendChild(pageLi);
    }
    
    // Next button
    const nextLi = document.createElement('li');
    nextLi.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
    nextLi.innerHTML = `
        <a class="page-link" href="#" aria-label="Next">
            <i class="ci-chevron-right"></i>
        </a>
    `;
    if (currentPage < totalPages) {
        nextLi.querySelector('a').addEventListener('click', (e) => {
            e.preventDefault();
            goToPage(currentPage + 1);
        });
    }
    paginationContainer.appendChild(nextLi);
}

function goToPage(page) {
    currentPage = page;
    renderProductsWithPagination();
    
    // Scroll to top of product grid
    const grid = document.getElementById('product-grid');
    if (grid) {
        grid.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}