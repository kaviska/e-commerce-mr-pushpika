// Fetch and display categories with products
async function loadCategories() {
    try {
        const response = await fetch(`${window.SERVER_URL}/categories?category_with_products`);
        const result = await response.json();

        if (result.status === 'success' && result.data) {
            renderCategoryForPage(result.data);
        } else {
            console.error('Failed to load categories:', result.message);
        }
    } catch (error) {
        console.error('Error fetching categories:', error);
    }
}

// Render categories in the DOM
function renderCategoryForPage(categories) {
    const container = document.getElementById('categoryCardsContainer');
    
    if (!container) {
        console.error('Category container not found');
        return;
    }

    container.innerHTML = ''; // Clear existing content

    categories.forEach(category => {
        const categoryCard = createCategoryCard(category);
        container.appendChild(categoryCard);
    });
}

// Create a single category card
function createCategoryCard(category) {
    const col = document.createElement('div');
    col.className = 'col';

    // Get up to 5 products based on rating (assuming products are already sorted by rating from API)
    const products = category.products.slice(0, 5);

    // Create products list HTML
    const productsHTML = products.map(product => `
        <li class="d-flex w-100 pt-1">
            <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0" 
               href="shop-product.php?slug=${product.slug}">
                ${product.name}
            </a>
        </li>
    `).join('');

    col.innerHTML = `
        <div class="hover-effect-scale">
            <a class="d-block bg-body-tertiary rounded p-4 mb-4" href="shop-catalog.php?category=${category.slug}">
                <div class="ratio" style="--cz-aspect-ratio: calc(184 / 258 * 100%)">
                    <img loading="lazy" decoding="async" src="${window.SERVER_URL.replace('/api', '')}/${category.image}" 
                         class="hover-effect-target" 
                         alt="${category.name}"
                         onerror="this.src='assets/img/shop/electronics/categories/placeholder.png'">
                </div>
            </a>
            <h2 class="h6 d-flex w-100 pb-2 mb-1">
                <a class="animate-underline animate-target d-inline text-truncate" 
                   href="shop-catalog.php?category=${category.slug}">
                    ${category.name}
                </a>
            </h2>
            <ul class="nav flex-column gap-2 mt-n1">
                ${productsHTML}
            </ul>
        </div>
    `;

    return col;
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    loadCategories();
});
