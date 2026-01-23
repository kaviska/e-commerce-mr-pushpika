document.addEventListener('DOMContentLoaded', () => {
  console.log('special-offer.js loaded');
  fetchSpecialOffers();
});

async function fetchSpecialOffers() {
  try {
    if (!window.SERVER_URL) {
      console.error('SERVER_URL is not defined in special-offer.js');
      return;
    }
    console.log('Fetching special offers from:', `${window.SERVER_URL}/products?with=all&limit=1000&has_web_discount=1`);
    const response = await fetch(`${window.SERVER_URL}/products?with=all&limit=1000&has_web_discount=1`, {
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      }
    });

    console.log('Response Status:', response.status);
    if (response.status === 401 || response.status === 302) {
      console.warn('Authentication issue or redirect detected. You might need to be logged in, or the API endpoint is protected.');
    }

    const data = await response.json();

    if (data.status === 'success' && data.data && data.data.length > 0) {
      console.log('Special offers fetched:', data.data.length);
      renderSpecialOffers(data.data);
    } else {
      console.log('No special offers found or API returned error');
    }
  } catch (error) {
    console.error('Error fetching special offers:', error);
  }
}

function renderSpecialOffers(products) {
  const container = document.getElementById('special-offer-wrapper');
  if (!container) return;

  // slice to limit if needed, e.g. 10
  const itemsToRender = products.slice(0, 10);

  itemsToRender.forEach(product => {
    const slide = document.createElement('div');
    slide.className = 'swiper-slide';

    const productLink = `shop-product.php?slug=${product.slug}`;
    const imageUrl = product.primary_image ? `${window.SERVER_URL.replace('/api', '')}/${product.primary_image}` : 'assets/img/placeholder.png';

    let price = 0;
    let discount = 0;
    let originalPrice = 0;
    let stockQuantity = 0;

    if (product.stocks && product.stocks.length > 0) {
      const stock = product.stocks[0];
      price = parseFloat(stock.web_price || 0);
      discount = parseFloat(stock.web_discount || 0);
      originalPrice = discount > 0 ? price + discount : price;
      stockQuantity = parseInt(stock.quantity || 0);
    }

    // Calculate progress bar percentage (arbitrary logic or based on initial stock if available)
    // Since we don't have total initial stock, we can just show available stock. 
    // Or make up a percentage for visual effect: (quantity / (quantity + 10)) * 100 ?
    // Static HTML used aria-valuenow="quantity" aria-valuemax="100". Let's assume max 100 for now or just visual.
    const progressBarWidth = Math.min(stockQuantity, 100);

    // Generate details for hover (Brand, Category, Variations)
    let detailsHtml = '';

    // Category
    if (product.category) {
      detailsHtml += createDetailItem('Category', product.category.name);
    }

    // Brand
    if (product.brand) {
      detailsHtml += createDetailItem('Brand', product.brand.name);
    }

    // Variations (from first stock)
    if (product.stocks && product.stocks.length > 0) {
      const firstStock = product.stocks[0];
      if (firstStock.variation_stocks) {
        firstStock.variation_stocks.forEach(vStock => {
          if (vStock.variation_option && vStock.variation_option.variation) {
            const label = vStock.variation_option.variation.name;
            const value = vStock.variation_option.name;
            detailsHtml += createDetailItem(label, value);
          }
        });
      }
    }

    slide.innerHTML = `
            <div class="product-card animate-underline hover-effect-opacity bg-body rounded">
              <div class="position-relative">
                <div class="position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 mt-3 me-3">
                  <div class="d-flex flex-column gap-2">
                    <button type="button" class="btn btn-icon btn-secondary animate-pulse d-none d-lg-inline-flex" aria-label="Add to Wishlist">
                      <i class="ci-heart fs-base animate-target"></i>
                    </button>
                    <button type="button" class="btn btn-icon btn-secondary animate-rotate d-none d-lg-inline-flex" aria-label="Compare">
                      <i class="ci-refresh-cw fs-base animate-target"></i>
                    </button>
                  </div>
                </div>
                <div class="dropdown d-lg-none position-absolute top-0 end-0 z-2 mt-2 me-2">
                  <button type="button" class="btn btn-icon btn-sm btn-secondary bg-body" data-bs-toggle="dropdown" aria-expanded="false" aria-label="More actions">
                    <i class="ci-more-vertical fs-lg"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end fs-xs p-2" style="min-width: auto">
                    <li>
                      <a class="dropdown-item" href="#!">
                        <i class="ci-heart fs-sm ms-n1 me-2"></i>
                        Add to Wishlist
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#!">
                        <i class="ci-refresh-cw fs-sm ms-n1 me-2"></i>
                        Compare
                      </a>
                    </li>
                  </ul>
                </div>
                <a class="d-block rounded-top overflow-hidden p-3 p-sm-4" href="${productLink}">
                  <div class="ratio" style="--cz-aspect-ratio: calc(240 / 258 * 100%)">
                    <img loading="lazy" decoding="async" src="${imageUrl}" alt="${product.name}">
                  </div>
                </a>
              </div>
              <div class="w-100 min-w-0 px-1 pb-2 px-sm-3 pb-sm-3">
                <div class="d-flex align-items-center gap-2 mb-2">
                  <div class="d-flex gap-1 fs-xs">
                   
                  </div>
                  <span class="text-body-tertiary fs-xs">(${product.reviews_count || 0})</span>
                </div>
                <h3 class="pb-1 mb-2">
                  <a class="d-block fs-sm fw-medium text-truncate" href="${productLink}">
                    <span class="animate-target">${product.name}</span>
                  </a>
                </h3>
                <div class="d-flex align-items-center justify-content-between pb-2 mb-1">
                  <div class="h5 lh-1 mb-0">LKR ${price.toFixed(2)} ${discount > 0 ? `<del class="text-body-tertiary fs-sm fw-normal">LKR ${originalPrice.toFixed(2)}</del>` : ''}</div>
                  <button type="button" class="product-card-button btn btn-icon btn-secondary animate-slide-end ms-2" aria-label="Add to Cart">
                    <i class="ci-shopping-cart fs-base animate-target"></i>
                  </button>
                </div>
                <div class="progress mb-2" role="progressbar" aria-label="Available in stock" aria-valuenow="${stockQuantity}" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                  <div class="progress-bar rounded-pill" style="width: ${progressBarWidth}%"></div>
                </div>
                <div class="text-body-secondary fs-sm">Available: <span class="text-dark-emphasis fw-medium">${stockQuantity}</span></div>
              </div>
              <div class="product-card-details position-absolute top-100 start-0 w-100 bg-body rounded-bottom shadow mt-n2 p-3 pt-1">
                <span class="position-absolute top-0 start-0 w-100 bg-body mt-n2 py-2"></span>
                <ul class="list-unstyled d-flex flex-column gap-2 m-0">
                  ${detailsHtml}
                </ul>
              </div>
            </div>
        `;
    container.appendChild(slide);
  });
}

function createDetailItem(label, value) {
  return `
    <li class="d-flex align-items-center">
      <span class="fs-xs">${label}:</span>
      <span class="d-block flex-grow-1 border-bottom border-dashed px-1 mt-2 mx-2"></span>
      <span class="text-dark-emphasis fs-xs fw-medium text-end">${value}</span>
    </li>
    `;
}
