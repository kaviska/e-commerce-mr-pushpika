// Cache to store loaded products by category
const categoryProductsCache = {};

document.addEventListener('DOMContentLoaded', async () => {
    await fetchCategories();
    handleCategoryMenuState();
    initializeSearch();
});

const initializeSearch = () => {
    const searchInputs = document.querySelectorAll('[data-search-input]');

    searchInputs.forEach(input => {
        const resultsContainer = input.parentElement.querySelector('[data-search-results]');
        if (!resultsContainer) return;

        let debounceTimeout;

        // Input listener
        input.addEventListener('input', (e) => {
            const query = e.target.value.trim();

            clearTimeout(debounceTimeout);

            if (query.length === 0) {
                resultsContainer.style.display = 'none';
                resultsContainer.innerHTML = '';
                return;
            }

            debounceTimeout = setTimeout(() => {
                performSearch(query, resultsContainer);
            }, 300);
        });

        // Focus listener
        input.addEventListener('focus', () => {
            if (input.value.trim().length > 0 && resultsContainer.innerHTML !== '') {
                resultsContainer.style.display = 'block';
            }
        });

        // Click outside listener
        document.addEventListener('click', (e) => {
            if (!input.contains(e.target) && !resultsContainer.contains(e.target)) {
                resultsContainer.style.display = 'none';
            }
        });
    });
};

const performSearch = async (query, container) => {
    container.style.display = 'block';
    container.innerHTML = `
        <div class="d-flex justify-content-center p-3">
            <div class="spinner-border spinner-border-sm text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    `;

    try {
        const response = await fetch(`${window.SERVER_URL}/products?search=${encodeURIComponent(query)}&limit=5`);
        const data = await response.json();
        const products = data.data || [];

        renderSearchResults(products, container);
    } catch (error) {
        console.error('Search error:', error);
        container.innerHTML = '<div class="p-3 text-danger fs-sm text-center">Error searching products.</div>';
    }
};

const renderSearchResults = (products, container, query) => {
    if (products.length === 0) {
        container.innerHTML = '<div class="p-3 text-body-secondary fs-sm text-center">No products found.</div>';
        return;
    }

    const baseUrl = window.SERVER_URL.replace('/api', '');

    let html = '<div class="list-group list-group-flush">';

    products.forEach(product => {
        const imagePath = product.primary_image && product.primary_image.startsWith('/')
            ? product.primary_image
            : '/' + (product.primary_image || 'assets/img/placeholder.png');
        const imageUrl = product.primary_image ? `${baseUrl}${imagePath}` : 'assets/img/placeholder.png';
        const price = product.stocks && product.stocks.length > 0 ? product.stocks[0].web_price : 'N/A';
        const categoryName = product.category ? product.category.name : '';

        html += `
            <a href="shop-product.php?slug=${product.slug}" class="list-group-item list-group-item-action d-flex align-items-center p-2 border-0 border-bottom-dashed">
                <div class="flex-shrink-0 position-relative rounded-2 overflow-hidden bg-body-secondary" style="width: 56px; height: 56px;">
                     <img src="${imageUrl}" class="w-100 h-100 object-fit-contain" alt="${product.name}">
                </div>
                <div class="flex-grow-1 min-w-0 ps-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="fs-xs fw-medium text-body-tertiary text-uppercase">${categoryName}</span>
                    </div>
                    <div class="h6 mb-0 text-truncate fs-sm">${product.name}</div>
                    <div class="text-primary fw-semibold fs-sm">$${price}</div>
                </div>
            </a>
        `;
    });

    if (query) {
        html += `
            <a href="shop-catalog-electronics.php?search=${encodeURIComponent(query)}" class="list-group-item list-group-item-action py-3 text-center text-primary fw-medium fs-sm border-0">
                View all results
                <i class="ci-chevron-right fs-xs ms-1"></i>
            </a>
        `;
    }

    html += '</div>';
    container.innerHTML = html;
};

const handleCategoryMenuState = () => {
    // Check if homepage
    const path = window.location.pathname;
    const isHome = path.endsWith('/') || path.toLowerCase().includes('index.php');

    if (isHome && window.innerWidth >= 992) { // Desktop only
        const toggle = document.querySelector('.d-none.d-lg-block[data-bs-toggle="dropdown"]');
        if (toggle && window.bootstrap) {
            const dropdown = new bootstrap.Dropdown(toggle);
            dropdown.show();
        }
    }
};

const fetchCategories = async () => {
    try {
        if (!window.SERVER_URL) {
            console.error('SERVER_URL is not defined in header.js');
            return;
        }
        const response = await fetch(`${window.SERVER_URL}/categories`);
        const data = await response.json();

        if (data.status === 'success') {
            renderCategories(data.data);
        }
    } catch (error) {
        console.error('Error fetching categories:', error);
    }
};

const renderCategories = (categories) => {
    const container = document.getElementById('mega-menu-container');
    if (!container) return;

    // clear container
    container.innerHTML = '';

    // Add "All Categories" item for mobile (matching original design)
    const mobileHeader = document.createElement('li');
    mobileHeader.className = 'd-lg-none pt-2';
    mobileHeader.innerHTML = `
        <a class="dropdown-item fw-medium" href="#">
            <i class="ci-grid fs-xl opacity-60 pe-1 me-2"></i>
            All Categories
            <i class="ci-chevron-right fs-base ms-auto me-n1"></i>
        </a>
    `;
    container.appendChild(mobileHeader);

    categories.forEach(category => {
        const li = document.createElement('li');
        li.className = 'dropend position-static';

        const baseUrl = SERVER_URL.replace('/api', '');
        const imagePath = category.image.startsWith('/') ? category.image : '/' + category.image;
        const iconUrl = category.image ? `${baseUrl}${imagePath}` : '';

        // Structure:
        // Desktop: hover triggers open.
        // Mobile: click triggers open.
        // We use data-bs-toggle="dropdown" which handles the visibility toggling.
        // We just need to ensure data is loaded when it opens.

        li.innerHTML = `
            <div class="position-relative rounded pt-2 pb-1 px-lg-2" data-bs-toggle="dropdown" data-bs-trigger="hover click" data-bs-auto-close="outside" aria-expanded="false">
                <a class="dropdown-item fw-medium stretched-link d-none d-lg-flex" href="#">
                    <img src="${iconUrl}" class="opacity-60 pe-1 me-2" width="24" height="24" style="object-fit: contain;" alt="${category.name}">
                    <span class="text-truncate">${category.name}</span>
                    <i class="ci-chevron-right fs-base ms-auto me-n1"></i>
                </a>
                <div class="dropdown-item fw-medium text-wrap stretched-link d-lg-none">
                     <img src="${iconUrl}" class="opacity-60 pe-1 me-2" width="24" height="24" style="object-fit: contain;" alt="${category.name}">
                    ${category.name}
                    <i class="ci-chevron-down fs-base ms-auto me-n1"></i>
                </div>
            </div>
            <div class="dropdown-menu rounded-4 p-4" style="top: 1rem; height: calc(100% - .1875rem); --cz-dropdown-spacer: .3125rem; animation: none;">
                <div class="d-flex justify-content-center align-items-center h-100" style="min-height: 200px;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        `;

        // Event handling
        // We attach listeners to the trigger element (the div with data-bs-toggle)
        const trigger = li.querySelector('[data-bs-toggle="dropdown"]');
        if (trigger) {
            // Mouseenter for desktop smooth preloading
            trigger.addEventListener('mouseenter', () => {
                loadProductByCategory(category.id, li.querySelector('.dropdown-menu'));
            });

            // "show.bs.dropdown" is the native Bootstrap event that fires when the instance is about to show.
            // This covers click (mobile/desktop) and focus.
            trigger.addEventListener('show.bs.dropdown', () => {
                loadProductByCategory(category.id, li.querySelector('.dropdown-menu'));
            });

            // Fallback: Click listener.
            // In case show.bs.dropdown doesn't bubble or bind correctly in this specific setup,
            // a direct click ensures the fetch is called. 
            // Caching prevents redundancy.
            trigger.addEventListener('click', () => {
                loadProductByCategory(category.id, li.querySelector('.dropdown-menu'));
            });
        }

        container.appendChild(li);
    });
};

const loadProductByCategory = async (categoryId, menuContainer) => {
    // If already loaded and cached, render from cache
    if (categoryProductsCache[categoryId]) {
        renderMegaMenu(menuContainer, categoryProductsCache[categoryId]);
        return;
    }

    try {
        const response = await fetch(`${SERVER_URL}/products?category_id=${categoryId}&with=all&limit=10`);
        const data = await response.json();

        if (data.status === 'success') {
            categoryProductsCache[categoryId] = data.data;
            renderMegaMenu(menuContainer, data.data);
        } else {
            categoryProductsCache[categoryId] = [];
            renderMegaMenu(menuContainer, []);
        }
    } catch (error) {
        console.error('Error loading products:', error);
        menuContainer.innerHTML = '<div class="p-4 text-danger">Error loading products.</div>';
    }
};

const renderMegaMenu = (container, products) => {
    if (!products || products.length === 0) {
        container.innerHTML = '<div class="d-flex justify-content-center align-items-center h-100 text-muted">No products available in this category.</div>';
        return;
    }

    const listProducts = products.slice(0, 14);
    const featuredProduct = products.length > 0 ? products[0] : null;

    const midPoint = Math.ceil(listProducts.length / 2);
    const col1Products = listProducts.slice(0, midPoint);
    const col2Products = listProducts.slice(midPoint);

    const baseUrl = SERVER_URL.replace('/api', '');

    let html = `
        <div class="d-flex flex-column flex-lg-row h-100 gap-4">
            <div style="min-width: 194px">
                 <div class="d-flex w-100">
                   <h6 class="text-dark-emphasis border-bottom pb-2 w-100">Top Choices</h6>
                 </div>
                 <ul class="nav flex-column gap-2 mt-2">
                    ${col1Products.map(p => `
                        <li class="d-flex w-100 pt-1">
                            <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0" href="shop-product.php?slug=${p.slug}">${p.name}</a>
                        </li>
                    `).join('')}
                 </ul>
            </div>
            <div style="min-width: 194px">
                 <div class="d-flex w-100">
                    <h6 class="text-dark-emphasis border-bottom pb-2 w-100">&nbsp;</h6> 
                 </div>
                 <ul class="nav flex-column gap-2 mt-2">
                    ${col2Products.map(p => `
                        <li class="d-flex w-100 pt-1">
                            <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0" href="shop-product.php?slug=${p.slug}">${p.name}</a>
                        </li>
                    `).join('')}
                 </ul>
            </div>
    `;

    if (featuredProduct) {
        let price = 'Check Price';
        let discount = 0;
        let originalPrice = 0;

        if (featuredProduct.stocks && featuredProduct.stocks.length > 0) {
            const stock = featuredProduct.stocks[0];
            price = `Rs. ${stock.web_price}`;
            discount = stock.web_discount;
            if (discount > 0) {
                originalPrice = parseFloat(stock.web_price) + parseFloat(discount);
            }
        }

        const imagePath = featuredProduct.primary_image.startsWith('/') ? featuredProduct.primary_image : '/' + featuredProduct.primary_image;
        const image = featuredProduct.primary_image ? `${baseUrl}${imagePath}` : 'assets/img/placeholder.png';

        html += `
            <div class="d-none d-lg-block ms-auto">
                 <div class="d-none d-xl-block" style="width: 300px"></div>
                 <div class="d-xl-none" style="width: 260px"></div>
                 
                 <div class="card h-100 border-0 shadow-lg overflow-hidden position-relative group" style="background: linear-gradient(135deg, #ffffff 0%, #f3f6f9 100%);">
                    
                    <div class="card-body d-flex flex-column justify-content-center text-center p-4 position-relative z-1">
                         ${discount > 0 ? `
                         <span class="badge bg-danger shadow-sm fs-xs rounded-pill mb-3 align-self-center px-3 py-2">
                            Save Rs. ${discount}
                         </span>`
                :
                '<span class="badge bg-primary bg-opacity-10 text-primary fs-xs rounded-pill mb-3 align-self-center px-3 py-2">Featured</span>'
            }
                         
                         <h5 class="mb-1 text-dark-emphasis text-truncate w-100" title="${featuredProduct.name}">${featuredProduct.name}</h5>
                         <div class="fs-sm text-muted mb-3">Limited stock available</div>
                         
                         <div class="my-3 d-flex justify-content-center position-relative" style="height: 180px;">
                            <img src="${image}" class="img-fluid transition-scale" style="max-height: 100%; object-fit: contain; transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);" alt="${featuredProduct.name}">
                         </div>
                         
                         <div class="mb-4">
                            <span class="h4 text-primary fw-bold">${price}</span>
                            ${originalPrice > 0 ? `<div class="fs-sm text-decoration-line-through text-muted mt-1">Rs. ${originalPrice}</div>` : ''}
                         </div>

                         <a class="btn btn-primary rounded-pill stretched-link fw-semibold px-4 shadow-sm hover-lift" href="shop-product.php?slug=${featuredProduct.slug}">
                            Shop Now
                         </a>
                    </div>
                    
                    <!-- Inline styles for micro-interactions -->
                    <style>
                        .card.group:hover .transition-scale {
                            transform: scale(1.1) translateY(-5px);
                        }
                        .hover-lift {
                            transition: transform 0.2s ease, box-shadow 0.2s ease;
                        }
                        .hover-lift:hover {
                            transform: translateY(-2px);
                            box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
                        }
                    </style>
                 </div>
            </div>
        `;
    }

    html += `</div>`;
    container.innerHTML = html;
};
