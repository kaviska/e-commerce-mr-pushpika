// Shop Banner Dynamic Loading
document.addEventListener('DOMContentLoaded', function() {
    loadShopBanners();
});

async function loadShopBanners() {
    try {
        const response = await fetch(`${window.SERVER_URL}/notices?section=shop_offer`);
        const data = await response.json();

        if (data.status === 'success' && data.data && data.data.length > 0) {
            renderShopBanners(data.data);
        }
    } catch (error) {
        console.error('Error loading shop banners:', error);
    }
}

function renderShopBanners(banners) {
    const container = document.getElementById('shop-banners-container');
    if (!container) return;

    container.innerHTML = '';

    // First banner (larger - col-md-7)
    if (banners[0]) {
        const banner1 = banners[0];
        const baseUrl = window.SERVER_URL.replace('/api', '');
        const imageUrl = banner1.image ? `${baseUrl}/${banner1.image}` : 'assets/img/shop/electronics/banners/iphone-1.png';
        
        const banner1HTML = `
            <div class="col-md-7">
                <div class="position-relative d-flex flex-column flex-sm-row align-items-center h-100 rounded-5 overflow-hidden px-5 px-sm-0 pe-sm-4">
                    <span class="position-absolute top-0 start-0 w-100 h-100 d-none-dark rtl-flip" style="background: linear-gradient(90deg, #accbee 0%, #e7f0fd 100%)"></span>
                    <span class="position-absolute top-0 start-0 w-100 h-100 d-none d-block-dark rtl-flip" style="background: linear-gradient(90deg, #1b273a 0%, #1f2632 100%)"></span>
                    <div class="position-relative z-1 text-center text-sm-start pt-4 pt-sm-0 ps-xl-4 mt-2 mt-sm-0 order-sm-2">
                        <h2 class="h3 mb-2">${banner1.title || ''}</h2>
                        <p class="fs-sm text-light-emphasis mb-sm-4">${banner1.description || ''}</p>
                        ${banner1.button_text ? `
                        <a class="btn btn-primary" href="${banner1.link || '#'}">
                            ${banner1.button_text}
                            <i class="ci-arrow-up-right fs-base ms-1 me-n1"></i>
                        </a>
                        ` : ''}
                    </div>
                    <div class="position-relative z-1 w-100 align-self-end order-sm-1" style="max-width: 416px">
                        <div class="ratio rtl-flip" style="--cz-aspect-ratio: calc(320 / 416 * 100%)">
                            <img src="${imageUrl}" alt="${banner1.title || 'Banner'}">
                        </div>
                    </div>
                </div>
            </div>
        `;
        container.innerHTML += banner1HTML;
    }

    // Second banner (smaller - col-md-5)
    if (banners[1]) {
        const banner2 = banners[1];
        const baseUrl = window.SERVER_URL.replace('/api', '');
        const imageUrl = banner2.image ? `${baseUrl}/${banner2.image}` : 'assets/img/shop/electronics/banners/ipad.png';
        
        const banner2HTML = `
            <div class="col-md-5">
                <div class="position-relative d-flex flex-column align-items-center justify-content-between h-100 rounded-5 overflow-hidden pt-3">
                    <span class="position-absolute top-0 start-0 w-100 h-100 d-none-dark rtl-flip" style="background: linear-gradient(90deg, #fdcbf1 0%, #fdcbf1 1%, #ffecfa 100%)"></span>
                    <span class="position-absolute top-0 start-0 w-100 h-100 d-none d-block-dark rtl-flip" style="background: linear-gradient(90deg, #362131 0%, #322730 100%)"></span>
                    <div class="position-relative z-1 text-center pt-3 mx-4">
                        <i class="ci-apple text-body-emphasis fs-3 mb-3"></i>
                        <p class="fs-sm text-light-emphasis mb-1">Deal of the week</p>
                        <h2 class="h3 mb-4">${banner2.title || ''}</h2>
                    </div>
                    <a class="position-relative z-1 d-block w-100" href="${banner2.link || '#'}">
                        <div class="ratio" style="--cz-aspect-ratio: calc(159 / 525 * 100%)">
                            <img loading="lazy" src="${imageUrl}" width="525" alt="${banner2.title || 'Banner'}">
                        </div>
                    </a>
                </div>
            </div>
        `;
        container.innerHTML += banner2HTML;
    }
}
