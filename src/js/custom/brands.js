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

    // Show more brands for better coverage
    const brandsToShow = brands.slice(0, 11);

    brandsToShow.forEach(brand => {
        const col = document.createElement('div');
        col.className = 'col';

        // Determine the image to use: brand image, or default apple logo
        const defaultImage = 'assets/img/shop/electronics/brands/apple-light-mode.svg';
        const defaultImageDark = 'assets/img/shop/electronics/brands/apple-dark-mode.svg';
        const brandImage = brand.image ? `${window.SERVER_URL.replace('/api', '')}/${brand.image}` : null;

        col.innerHTML = `
            <a class="btn btn-outline-secondary w-100 rounded-4 p-3" href="shop-catalog.php?brand=${brand.slug || brand.id}">
                ${brandImage ? 
                    `<img src="${brandImage}" alt="${brand.name}" class="img-fluid" style="max-height: 60px; object-fit: contain;" onerror="this.src='${defaultImage}';">` 
                    : 
                    `<img src="${defaultImage}" class="d-none-dark" alt="${brand.name}">
                     <img src="${defaultImageDark}" class="d-none d-block-dark" alt="${brand.name}">`
                }
            </a>
        `;
        container.appendChild(col);
    });

    // Add "All brands" button
    const allBrandsCol = document.createElement('div');
    allBrandsCol.className = 'col';
    allBrandsCol.innerHTML = `
        <a class="btn btn-outline-secondary w-100 h-100 rounded-4 p-3" href="shop-catalog.php">
            All brands
            <i class="ci-plus-circle fs-base ms-2"></i>
        </a>
    `;
    container.appendChild(allBrandsCol);
}

// Add custom CSS for hover effects
const style = document.createElement('style');
style.textContent = `
    .brand-card .hover-lift {
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }
    .brand-card:hover .hover-lift {
        transform: translateY(-4px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        border-color: var(--bs-primary);
    }
    .transition-all {
        transition: all 0.3s ease;
    }
`;
document.head.appendChild(style);
