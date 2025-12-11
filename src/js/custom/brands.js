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
    const brandsToShow = brands.slice(0, 12);

    brandsToShow.forEach(brand => {
        const col = document.createElement('div');
        col.className = 'col';

        // Modern card design with hover effects and brand logo placeholder
        col.innerHTML = `
            <div class="brand-card position-relative">
                <a class="d-block text-decoration-none" href="shop-catalog-electronics.php?brand=${brand.slug || brand.id}">
                    <div class="bg-body-tertiary rounded-3 p-4 text-center transition-all hover-lift" style="min-height: 100px;">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            ${brand.logo ? 
                                `<img src="${window.SERVER_URL.replace('/api', '')}/${brand.logo}" 
                                     alt="${brand.name}" 
                                     class="img-fluid" 
                                     style="max-height: 60px; max-width: 100%; object-fit: contain;"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                                 <span class="fw-semibold text-body-emphasis d-none" style="font-size: 0.95rem;">${brand.name}</span>` 
                                : 
                                `<span class="fw-semibold text-body-emphasis" style="font-size: 0.95rem;">${brand.name}</span>`
                            }
                        </div>
                    </div>
                </a>
            </div>
        `;
        container.appendChild(col);
    });
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
