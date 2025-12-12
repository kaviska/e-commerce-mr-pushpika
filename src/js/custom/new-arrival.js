document.addEventListener('DOMContentLoaded', function () {
    fetchNewArrivals();
});

const fetchNewArrivals = async () => {
    try {
        if (!window.SERVER_URL) {
            console.error('SERVER_URL is not defined');
            return;
        }
        console.log('Fetching new arrivals from:', `${window.SERVER_URL}/products?with=all&limit=1000&latest_product=true`);
        const response = await fetch(`${window.SERVER_URL}/products?with=all&limit=1000&latest_product=true`);
        const data = await response.json();

        if (data.status === 'success') {
            console.log('New arrivals fetched successfully', data.data.length);
            renderNewArrivals(data.data);
        } else {
            console.warn('New arrivals fetch returned status:', data.status);
        }
    } catch (error) {
        console.error('Error fetching new arrivals:', error);
    }
};

const renderNewArrivals = (products) => {
    const container = document.getElementById('new-arrival-container');
    if (!container || !products || products.length === 0) return;

    // Use only the first 8 products for the layout (4 per column)
    const productsToDisplay = products.slice(0, 8);

    // Split into two columns
    const half = Math.ceil(productsToDisplay.length / 2);
    const col1Products = productsToDisplay.slice(0, half);
    const col2Products = productsToDisplay.slice(half);

    const createProductColumn = (items, isSecondColumn) => {
        const colDiv = document.createElement('div');
        colDiv.className = `col-sm-6 col-lg-4 d-flex flex-column gap-3 ${isSecondColumn ? 'pt-3 py-lg-4' : 'pt-4 py-lg-4'}`;

        items.forEach(product => {
            const baseUrl = window.SERVER_URL.replace('/api', '');
            const imagePath = product.primary_image.startsWith('/') ? product.primary_image : '/' + product.primary_image;
            const imageUrl = product.primary_image ? `${baseUrl}${imagePath}` : 'assets/img/placeholder.png';

            let price = 'Check Price';
            let originalPrice = '';

            if (product.stocks && product.stocks.length > 0) {
                const stock = product.stocks[0];
                price = `Rs. ${stock.web_price}`;
                const discount = parseFloat(stock.web_discount);
                if (discount > 0) {
                    const oldPrice = parseFloat(stock.web_price) + discount;
                    originalPrice = `Rs. ${oldPrice}`;
                }
            }

            // Generate stars based on rating
            const rating = parseFloat(product.reviews_avg_rating) || 0;
            let starsHtml = '';
            for (let i = 1; i <= 5; i++) {
                if (i <= rating) {
                    starsHtml += '<i class="ci-star-filled text-warning"></i>';
                } else if (i - 0.5 <= rating) {
                    starsHtml += '<i class="ci-star-half text-warning"></i>';
                } else {
                    starsHtml += '<i class="ci-star text-body-tertiary opacity-75"></i>';
                }
            }

            const productHtml = `
                <div class="position-relative animate-underline d-flex align-items-center ps-xl-3">
                  <div class="ratio ratio-1x1 flex-shrink-0" style="width: 110px">
                    <img src="${imageUrl}" width="110" alt="${product.name}" style="object-fit: contain;">
                  </div>
                  <div class="w-100 min-w-0 ps-2 ps-sm-3">
                    <div class="d-flex align-items-center gap-2 mb-2">
                      <div class="d-flex gap-1 fs-xs">
                        ${starsHtml}
                      </div>
                      <span class="text-body-tertiary fs-xs">${product.reviews_count || 0}</span>
                    </div>
                    <h4 class="mb-2">
                      <a class="stretched-link d-block fs-sm fw-medium text-truncate" href="shop-product.php?slug=${product.slug}">
                        <span class="animate-target">${product.name}</span>
                      </a>
                    </h4>
                    <div class="h5 mb-0">${price} ${originalPrice ? `<del class="text-body-tertiary fs-sm fw-normal">${originalPrice}</del>` : ''}</div>
                  </div>
                </div>
            `;

            const itemDiv = document.createElement('div');
            itemDiv.innerHTML = productHtml;
            // Get the first child (the actual product container) and append
            colDiv.appendChild(itemDiv.firstElementChild);
        });

        return colDiv;
    };

    if (col1Products.length > 0) {
        container.appendChild(createProductColumn(col1Products, false));
    }

    if (col2Products.length > 0) {
        container.appendChild(createProductColumn(col2Products, true));
    }
};
