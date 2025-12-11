// Fetch and display hero sliders
async function loadHeroSliders() {
    try {
        const response = await fetch(`${window.SERVER_URL}/hero-sliders`);
        const result = await response.json();

        if (result.status === 'success' && result.data && result.data.length > 0) {
            renderHeroSliders(result.data);
        } else {
            console.log('No hero sliders found, using default slides');
            // Initialize with default content
            initializeSwipers();
        }
    } catch (error) {
        console.error('Error fetching hero sliders:', error);
        console.log('Using default slides due to error');
        // Initialize with default content
        initializeSwipers();
    }
}

// Render hero sliders dynamically
function renderHeroSliders(sliders) {
    const textSliderWrapper = document.getElementById('hero-text-slider');
    const imageSliderWrapper = document.getElementById('hero-image-slider');
    
    if (!textSliderWrapper || !imageSliderWrapper) {
        console.error('Hero slider containers not found');
        return;
    }

    const baseUrl = window.SERVER_URL.replace('/api', '');

    // Clear existing content
    textSliderWrapper.innerHTML = '';
    imageSliderWrapper.innerHTML = '';

    // Render each slider
    sliders.forEach(slider => {
        // Create text slide
        const textSlide = document.createElement('div');
        textSlide.className = 'swiper-slide text-center text-xl-start pt-5 py-xl-5';
        textSlide.innerHTML = `
            <p class="text-body">${slider.sub_heading || ''}</p>
            <h2 class="display-4 pb-2 pb-xl-4">${slider.heading || ''}</h2>
            <a class="btn btn-lg btn-primary" href="${slider.link || 'shop-catalog-electronics.php'}">
                Shop now
                <i class="ci-arrow-up-right fs-lg ms-2 me-n1"></i>
            </a>
        `;
        textSliderWrapper.appendChild(textSlide);

        // Create image slide
        const imageSlide = document.createElement('div');
        imageSlide.className = 'swiper-slide d-flex justify-content-end';
        
        const imagePath = slider.image.startsWith('/') ? slider.image : '/' + slider.image;
        const imageUrl = slider.image ? `${baseUrl}${imagePath}` : 'assets/img/home/electronics/hero-slider/01.png';
        
        imageSlide.innerHTML = `
            <div class="ratio rtl-flip" style="max-width: 495px; --cz-aspect-ratio: calc(537 / 495 * 100%)">
                <img src="${imageUrl}" 
                     alt="${slider.heading || 'Hero Image'}"
                     onerror="this.src='assets/img/home/electronics/hero-slider/01.png'">
            </div>
        `;
        imageSliderWrapper.appendChild(imageSlide);
    });

    // Initialize Swiper after content is loaded
    initializeSwipers();
}

// Initialize Swiper instances
function initializeSwipers() {
    // Wait a bit for DOM to update
    setTimeout(() => {
        // Destroy existing swiper instances if they exist
        const textSliderEl = document.querySelector('.swiper[data-swiper]');
        const imageSliderEl = document.getElementById('sliderImages');
        
        if (textSliderEl && textSliderEl.swiper) {
            textSliderEl.swiper.destroy(true, true);
        }
        
        if (imageSliderEl && imageSliderEl.swiper) {
            imageSliderEl.swiper.destroy(true, true);
        }

        // Reinitialize using Swiper
        if (window.Swiper) {
            // Image slider first (controlled)
            const imageSwiper = new window.Swiper('#sliderImages', {
                allowTouchMove: false,
                loop: true,
                speed: 400,
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                }
            });

            // Text slider (master/controller)
            const textSwiper = new window.Swiper('.swiper[data-swiper]', {
                spaceBetween: 64,
                loop: true,
                speed: 400,
                autoplay: {
                    delay: 5500,
                    disableOnInteraction: false
                },
                scrollbar: {
                    el: '.swiper-scrollbar',
                    draggable: true
                }
            });

            // Link the two swipers - ensure image follows text
            textSwiper.on('slideChangeTransitionStart', function() {
                const realIndex = textSwiper.realIndex;
                imageSwiper.slideTo(realIndex);
            });
            
            // Also handle direct navigation
            textSwiper.on('slideChange', function() {
                const realIndex = textSwiper.realIndex;
                imageSwiper.slideTo(realIndex);
            });
        }
    }, 200);
}

// Prevent theme from auto-initializing these specific swipers
document.addEventListener('DOMContentLoaded', () => {
    // Destroy any auto-initialized swipers for hero slider
    const textSliderEl = document.querySelector('.swiper[data-swiper]');
    const imageSliderEl = document.getElementById('sliderImages');
    
    if (textSliderEl && textSliderEl.swiper) {
        textSliderEl.swiper.destroy(true, true);
    }
    
    if (imageSliderEl && imageSliderEl.swiper) {
        imageSliderEl.swiper.destroy(true, true);
    }
    
    // Load hero sliders from API
    loadHeroSliders();
});
