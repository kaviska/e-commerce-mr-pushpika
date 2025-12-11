document.addEventListener('DOMContentLoaded', () => {
    fetchBrands();
});

async function fetchBrands() {
    try {
        if (!window.SERVER_URL) {
            console.error('SERVER_URL is not defined in brands.js');
            return;
        }

        const response = await fetch(`${window.SERVER_URL}/brands`, {
            headers: {
                'Accept': 'application/json'
            }
        });
        const data = await response.json();

        if (data.status === 'success' && data.data) {
            renderBrands(data.data);
        } else {
            console.error('Failed to fetch brands:', data);
        }
    } catch (error) {
        console.error('Error fetching brands:', error);
    }
}

function renderBrands(brands) {
    const container = document.getElementById('brands-container');
    if (!container) return;

    // Clear existing content
    container.innerHTML = '';

    // Render limited number of brands or all? 
    // Screenshot shows 5 brands + "All brands". Let's show first 5.
    const brandsToShow = brands.slice(0, 5);

    brandsToShow.forEach(brand => {
        const col = document.createElement('div');
        col.className = 'col';

        // Using a text-based modern look as requested since no logos are available.
        // Centered text, bold, nice padding.
        col.innerHTML = `
            <a class="btn btn-outline-secondary w-100 rounded-4 p-3 d-flex align-items-center justify-content-center" href="#" style="min-height: 80px;">
                <span class="fs-lg fw-bold text-body-emphasis mb-0">${brand.name}</span>
            </a>
        `;
        container.appendChild(col);
    });

    // Add "All brands" button
    const allBrandsCol = document.createElement('div');
    allBrandsCol.className = 'col';
    allBrandsCol.innerHTML = `
        <a class="btn btn-outline-secondary w-100 h-100 rounded-4 p-3 d-flex align-items-center justify-content-center" href="shop-categories-electronics.html">
            <span class="me-2">All brands</span>
            <i class="ci-plus-circle fs-base"></i>
        </a>
    `;
    container.appendChild(allBrandsCol);
}
