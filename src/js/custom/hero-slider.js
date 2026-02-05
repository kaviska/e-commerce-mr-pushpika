document.addEventListener('DOMContentLoaded', () => {
    fetchHeroSliders();
});

async function fetchHeroSliders() {
    try {
        if (!window.SERVER_URL) {
            console.error('SERVER_URL is not defined in hero-slider.js');
            return;
        }

        const response = await fetch(`${window.SERVER_URL}/hero-sliders?status=active`);
        const data = await response.json();

        if (data.status === 'success' && data.data && data.data.length > 0) {
            renderHeroSliders(data.data);
        } else {
            console.error('No hero sliders found');
        }
    } catch (error) {
        console.error('Error fetching hero sliders:', error);
    }
}

function renderHeroSliders(sliders) {
    const textContainer = document.getElementById('hero-text-slides');
    const imageContainer = document.getElementById('hero-image-slides');
    
    if (!textContainer || !imageContainer) return;

    const baseUrl = window.SERVER_URL.replace('/api', '');

    // Clear existing content
    textContainer.innerHTML = '';
    imageContainer.innerHTML = '';

    sliders.forEach((slider, index) => {
        // Create text slide
        const textSlide = document.createElement('div');
        textSlide.className = 'swiper-slide text-center text-xl-start pt-5 py-xl-5';
        textSlide.innerHTML = `
            <p class="text-body fs-sm fs-xl-base">${slider.sub_heading || ''}</p>
            <h2 class="h3 h1-xl pb-2 pb-xl-4">${slider.heading || ''}</h2>
            <a class="btn btn-md btn-lg-lg btn-primary" href="shop-catalog.php">
                Shop now
                <i class="ci-arrow-up-right fs-lg ms-2 me-n1"></i>
            </a>
        `;
        textContainer.appendChild(textSlide);

        // Create image slide
        const imageSlide = document.createElement('div');
        imageSlide.className = 'swiper-slide d-flex justify-content-end';
        
        const imageUrl = slider.image ? `${baseUrl}/storage/${slider.image}` : 'assets/img/placeholder.png';
        
        const isFirstSlide = index === 0;

        imageSlide.innerHTML = `
            <div class="ratio rtl-flip" style="max-width: 495px; --cz-aspect-ratio: calc(537 / 495 * 100%)">
                <img src="${imageUrl}" alt="${slider.heading || 'Hero Slider'}" ${isFirstSlide ? '' : 'loading="lazy"'}>
            </div>
        `;
        imageContainer.appendChild(imageSlide);
    });

    // Reinitialize Swiper after content is loaded
    reinitializeSwiper();
}

function reinitializeSwiper() {
    // Wait a bit for DOM to update
    setTimeout(() => {
        // Find existing Swiper instances and update them
        const textSwiper = document.querySelector('.swiper[data-swiper]');
        const imageSwiper = document.getElementById('sliderImages');
        
        if (textSwiper && textSwiper.swiper) {
            textSwiper.swiper.update();
        }
        
        if (imageSwiper && imageSwiper.swiper) {
            imageSwiper.swiper.update();
        }
    }, 100);
}
