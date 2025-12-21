// Show loading animation immediately
showPageLoader();

// Track when the page started loading
const pageLoadStartTime = Date.now();

// Check if current page should have extended loading (7 seconds minimum)
function shouldUseExtendedLoading() {
    const currentPage = window.location.pathname;
    const pageName = currentPage.split('/').pop() || 'index.php';
    
    // List of pages that should show 7 second loading
    const extendedLoadingPages = [
        'shop-catalog-electronics.php',
        'shop-product.php',
        'index.php',
        '' // root URL case
    ];
    
    return extendedLoadingPages.includes(pageName) || currentPage === '/' || currentPage.endsWith('/');
}

document.addEventListener('DOMContentLoaded', () => {
    console.log('hhs');
    
    // Initialize WhatsApp popup
    initWhatsAppWidget();
    
    // Hide loader when page is fully loaded
    window.addEventListener('load', () => {
        if (shouldUseExtendedLoading()) {
            // Calculate how long the page has been loading
            const elapsedTime = Date.now() - pageLoadStartTime;
            const minimumLoadTime = 5000; // 7 seconds
            
            // If less than 7 seconds have passed, wait for the remaining time
            if (elapsedTime < minimumLoadTime) {
                const remainingTime = minimumLoadTime - elapsedTime;
                setTimeout(() => {
                    hidePageLoader();
                }, remainingTime);
            } else {
                // If already 7+ seconds, hide immediately
                hidePageLoader();
            }
        } else {
            // For other pages, hide loader immediately
            hidePageLoader();
        }
    });
});

//updated
window.SERVER_URL = 'http://127.0.0.1:8000/api';

/**
 * Page Loader Functions
 * Beautiful loading animation that matches the theme
 */

/**
 * Create and show page loader
 */
function showPageLoader() {
    // Create loader HTML
    const loader = document.createElement('div');
    loader.id = 'page-loader';
    loader.className = 'page-loader';
    
    loader.innerHTML = `
        <div class="loader-content">
            <div class="loader-logo">
                <img src="assets/logo.png" alt="Logo" class="loader-logo-img">
            </div>
            <div class="loader-spinner">
                <div class="spinner-ring"></div>
                <div class="spinner-ring"></div>
                <div class="spinner-ring"></div>
            </div>
            <p class="loader-text">Loading<span class="loader-dots"></span></p>
        </div>
    `;
    
    document.body.appendChild(loader);
    
    // Prevent scrolling while loading
    document.body.style.overflow = 'hidden';
}

/**
 * Hide page loader with smooth fade out
 */
function hidePageLoader() {
    const loader = document.getElementById('page-loader');
    if (loader) {
        loader.classList.add('loaded');
        
        // Remove loader after animation completes
        setTimeout(() => {
            loader.remove();
            // Restore scrolling
            document.body.style.overflow = '';
        }, 600);
    }
}

/**
 * Show content loader inside a specific element
 * @param {string|HTMLElement} target - CSS selector or DOM element to show loader in
 * @param {string} message - Optional loading message
 */
function showContentLoader(target, message = 'Loading...') {
    const container = typeof target === 'string' ? document.querySelector(target) : target;
    if (!container) return;
    
    const loaderId = 'content-loader-' + Math.random().toString(36).substr(2, 9);
    const loader = document.createElement('div');
    loader.id = loaderId;
    loader.className = 'content-loader';
    
    loader.innerHTML = `
        <div class="content-loader-overlay">
            <div class="content-loader-spinner">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="content-loader-text">${message}</p>
            </div>
        </div>
    `;
    
    container.style.position = 'relative';
    container.appendChild(loader);
    
    return loaderId;
}

/**
 * Hide content loader from a specific element
 * @param {string|HTMLElement} target - CSS selector, DOM element, or loader ID
 */
function hideContentLoader(target) {
    let loader;
    
    if (typeof target === 'string') {
        // Try as loader ID first
        loader = document.getElementById(target);
        
        // If not found, try as container selector
        if (!loader) {
            const container = document.querySelector(target);
            if (container) {
                loader = container.querySelector('.content-loader');
            }
        }
    } else if (target instanceof HTMLElement) {
        loader = target.querySelector('.content-loader');
    }
    
    if (loader) {
        loader.classList.add('hiding');
        setTimeout(() => loader.remove(), 300);
    }
}

/**
 * Fetch data with automatic loading indicator
 * @param {string} url - API endpoint URL
 * @param {object} options - Fetch options
 * @param {string|HTMLElement} loaderTarget - Where to show loader (optional)
 * @param {string} loaderMessage - Loading message (optional)
 * @returns {Promise} Fetch promise
 */
async function fetchWithLoader(url, options = {}, loaderTarget = null, loaderMessage = 'Loading...') {
    let loaderId = null;
    
    try {
        // Show loader if target specified
        if (loaderTarget) {
            loaderId = showContentLoader(loaderTarget, loaderMessage);
        }
        
        // Perform fetch
        const response = await fetch(url, options);
        
        // Hide loader
        if (loaderId) {
            hideContentLoader(loaderId);
        }
        
        return response;
    } catch (error) {
        // Hide loader on error
        if (loaderId) {
            hideContentLoader(loaderId);
        }
        throw error;
    }
}

/**
 * Show mini inline spinner (for buttons, small areas)
 * @param {string|HTMLElement} target - Element to show spinner in
 * @param {string} size - Size: 'sm', 'md', 'lg' (default: 'sm')
 */
function showMiniLoader(target, size = 'sm') {
    const element = typeof target === 'string' ? document.querySelector(target) : target;
    if (!element) return;
    
    const originalContent = element.innerHTML;
    element.setAttribute('data-original-content', originalContent);
    element.disabled = true;
    
    const sizeClass = size === 'lg' ? 'spinner-border' : size === 'md' ? 'spinner-border spinner-border-sm' : 'spinner-border spinner-border-sm';
    
    element.innerHTML = `
        <span class="${sizeClass}" role="status" aria-hidden="true"></span>
        <span class="ms-2">Loading...</span>
    `;
}

/**
 * Hide mini inline spinner and restore original content
 * @param {string|HTMLElement} target - Element to restore
 */
function hideMiniLoader(target) {
    const element = typeof target === 'string' ? document.querySelector(target) : target;
    if (!element) return;
    
    const originalContent = element.getAttribute('data-original-content');
    if (originalContent) {
        element.innerHTML = originalContent;
        element.removeAttribute('data-original-content');
    }
    element.disabled = false;
}

// Export functions to global scope for easy access
window.showContentLoader = showContentLoader;
window.hideContentLoader = hideContentLoader;
window.fetchWithLoader = fetchWithLoader;
window.showMiniLoader = showMiniLoader;
window.hideMiniLoader = hideMiniLoader;

/**
 * Inject loader styles
 */
(function injectLoaderStyles() {
    const style = document.createElement('style');
    style.textContent = `
        /* Page Loader Styles */
        .page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 99999;
            opacity: 1;
            visibility: visible;
            transition: opacity 0.6s ease, visibility 0.6s ease;
        }
        
        .page-loader.loaded {
            opacity: 0;
            visibility: hidden;
        }
        
        .loader-content {
            text-align: center;
            animation: loader-fade-in 0.6s ease;
        }
        
        /* Logo Animation */
        .loader-logo {
            margin-bottom: 30px;
            animation: logo-bounce 1.5s ease-in-out infinite;
        }
        
        .loader-logo-img {
            width: 120px;
            height: auto;
            filter: brightness(0) invert(1);
            opacity: 0.95;
        }
        
        /* Spinner Animation */
        .loader-spinner {
            position: relative;
            width: 80px;
            height: 80px;
            margin: 0 auto 25px;
        }
        
        .spinner-ring {
            position: absolute;
            width: 100%;
            height: 100%;
            border: 3px solid transparent;
            border-top-color: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            animation: spinner-rotate 1.5s cubic-bezier(0.68, -0.55, 0.265, 1.55) infinite;
        }
        
        .spinner-ring:nth-child(2) {
            width: 70%;
            height: 70%;
            top: 15%;
            left: 15%;
            border-top-color: rgba(255, 255, 255, 0.6);
            animation-delay: -0.5s;
        }
        
        .spinner-ring:nth-child(3) {
            width: 40%;
            height: 40%;
            top: 30%;
            left: 30%;
            border-top-color: rgba(255, 255, 255, 0.4);
            animation-delay: -1s;
        }
        
        /* Loading Text */
        .loader-text {
            color: #ffffff;
            font-size: 18px;
            font-weight: 500;
            margin: 0;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        
        .loader-dots::after {
            content: '';
            animation: dots 1.5s steps(4, end) infinite;
        }
        
        /* Content Loader Styles */
        .content-loader {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1000;
            opacity: 1;
            transition: opacity 0.3s ease;
        }
        
        .content-loader.hiding {
            opacity: 0;
        }
        
        .content-loader-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(2px);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: inherit;
        }
        
        [data-bs-theme="dark"] .content-loader-overlay {
            background: rgba(0, 0, 0, 0.8);
        }
        
        .content-loader-spinner {
            text-align: center;
            animation: fade-in-up 0.3s ease;
        }
        
        .content-loader-spinner .spinner-border {
            width: 3rem;
            height: 3rem;
            border-width: 0.3em;
            color: #667eea;
        }
        
        .content-loader-text {
            margin-top: 15px;
            font-size: 14px;
            font-weight: 500;
            color: #666;
        }
        
        [data-bs-theme="dark"] .content-loader-text {
            color: #ccc;
        }
        
        /* Mini Loader for Buttons */
        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
            border-width: 0.15em;
        }
        
        /* Keyframe Animations */
        @keyframes loader-fade-in {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes logo-bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        
        @keyframes spinner-rotate {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        
        @keyframes dots {
            0%, 20% {
                content: '';
            }
            40% {
                content: '.';
            }
            60% {
                content: '..';
            }
            80%, 100% {
                content: '...';
            }
        }
        
        /* Dark mode support */
        @media (prefers-color-scheme: dark) {
            .page-loader {
                background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            }
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .loader-logo-img {
                width: 90px;
            }
            
            .loader-spinner {
                width: 60px;
                height: 60px;
            }
            
            .loader-text {
                font-size: 16px;
            }
            
            .content-loader-spinner .spinner-border {
                width: 2.5rem;
                height: 2.5rem;
            }
        }
        
        @media (max-width: 480px) {
            .loader-logo-img {
                width: 70px;
            }
            
            .loader-spinner {
                width: 50px;
                height: 50px;
                margin-bottom: 20px;
            }
            
            .loader-text {
                font-size: 14px;
            }
            
            .content-loader-spinner .spinner-border {
                width: 2rem;
                height: 2rem;
            }
            
            .content-loader-text {
                font-size: 13px;
            }
        }
    `;
    document.head.appendChild(style);
})();

/**
 * WhatsApp Widget Configuration
 * Customize these settings according to your needs
 */
const whatsAppConfig = {
    phoneNumber: '94771234567', // Replace with your WhatsApp number (country code + number, no + or spaces)
    message: 'Hello! I need help with...', // Default message
    position: 'right', // 'right' or 'left'
    bottomOffset: '20px', // Distance from bottom
    sideOffset: '20px', // Distance from side
    showPopup: true, // Show greeting popup
    popupMessage: 'Hi there! 👋<br>How can we help you?',
    popupDelay: 3000, // Show popup after 3 seconds
    popupDuration: 5000 // Hide popup after 5 seconds
};

/**
 * Initialize WhatsApp Widget
 * Creates a floating WhatsApp button with optional greeting popup
 */
function initWhatsAppWidget() {
    // Create WhatsApp button
    const whatsAppBtn = createWhatsAppButton();
    document.body.appendChild(whatsAppBtn);
    
    // Create and show popup if enabled
    if (whatsAppConfig.showPopup) {
        const popup = createWhatsAppPopup();
        document.body.appendChild(popup);
        
        // Show popup after delay
        setTimeout(() => {
            popup.classList.add('show');
            
            // Hide popup after duration
            setTimeout(() => {
                popup.classList.remove('show');
            }, whatsAppConfig.popupDuration);
        }, whatsAppConfig.popupDelay);
        
        // Close popup on click
        const closeBtn = popup.querySelector('.whatsapp-popup-close');
        if (closeBtn) {
            closeBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                popup.classList.remove('show');
            });
        }
    }
}

/**
 * Create WhatsApp floating button
 * @returns {HTMLElement} WhatsApp button element
 */
function createWhatsAppButton() {
    const button = document.createElement('a');
    button.href = `https://wa.me/${whatsAppConfig.phoneNumber}?text=${encodeURIComponent(whatsAppConfig.message)}`;
    button.target = '_blank';
    button.rel = 'noopener noreferrer';
    button.className = 'whatsapp-float';
    button.setAttribute('aria-label', 'Chat on WhatsApp');
    button.title = 'Chat with us on WhatsApp';
    
    button.innerHTML = `
        <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
            <path fill="currentColor" d="M16 0c-8.837 0-16 7.163-16 16 0 2.825 0.737 5.607 2.137 8.048l-2.137 7.952 7.933-2.127c2.42 1.37 5.173 2.127 8.067 2.127 8.837 0 16-7.163 16-16s-7.163-16-16-16zM16 29.467c-2.482 0-4.908-0.646-7.07-1.87l-0.507-0.292-4.713 1.262 1.262-4.669-0.292-0.508c-1.207-2.100-1.847-4.507-1.847-6.390 0-7.444 6.056-13.5 13.5-13.5s13.5 6.056 13.5 13.5c0 7.444-6.056 13.467-13.833 13.467zM21.967 18.433c-0.319-0.159-1.886-0.931-2.178-1.038s-0.505-0.159-0.718 0.159c-0.213 0.319-0.825 1.038-1.012 1.251s-0.372 0.239-0.691 0.080c-0.319-0.159-1.346-0.496-2.563-1.581-0.947-0.845-1.586-1.888-1.772-2.207s-0.019-0.491 0.139-0.65c0.143-0.143 0.319-0.372 0.479-0.558s0.213-0.319 0.319-0.532c0.107-0.213 0.053-0.399-0.027-0.558s-0.718-1.732-0.984-2.371c-0.259-0.622-0.522-0.537-0.718-0.547-0.186-0.009-0.399-0.011-0.611-0.011s-0.558 0.079-0.851 0.399c-0.292 0.319-1.117 1.091-1.117 2.662s1.144 3.089 1.303 3.302c0.159 0.213 2.246 3.430 5.443 4.809 0.761 0.328 1.355 0.524 1.818 0.671 0.764 0.243 1.459 0.208 2.009 0.126 0.613-0.092 1.886-0.771 2.152-1.516s0.266-1.383 0.186-1.516c-0.080-0.133-0.292-0.213-0.611-0.372z"/>
        </svg>
    `;
    
    // Apply position styles
    applyPositionStyles(button);
    
    return button;
}

/**
 * Create WhatsApp greeting popup
 * @returns {HTMLElement} Popup element
 */
function createWhatsAppPopup() {
    const popup = document.createElement('div');
    popup.className = 'whatsapp-popup';
    
    popup.innerHTML = `
        <div class="whatsapp-popup-content">
            <button class="whatsapp-popup-close" aria-label="Close">&times;</button>
            <div class="whatsapp-popup-message">${whatsAppConfig.popupMessage}</div>
        </div>
    `;
    
    // Apply position styles
    applyPositionStyles(popup, true);
    
    return popup;
}

/**
 * Apply position styles to elements based on configuration
 * @param {HTMLElement} element - Element to style
 * @param {boolean} isPopup - Whether element is a popup (needs offset adjustment)
 */
function applyPositionStyles(element, isPopup = false) {
    const position = whatsAppConfig.position;
    const bottomOffset = whatsAppConfig.bottomOffset;
    const sideOffset = whatsAppConfig.sideOffset;
    
    element.style.position = 'fixed';
    element.style.bottom = bottomOffset;
    element.style.zIndex = '9999';
    
    if (position === 'left') {
        element.style.left = sideOffset;
        element.style.right = 'auto';
    } else {
        element.style.right = sideOffset;
        element.style.left = 'auto';
    }
    
    // Adjust popup position to appear above button
    if (isPopup) {
        element.style.bottom = `calc(${bottomOffset} + 80px)`;
    }
}

/**
 * Add WhatsApp widget styles to the page
 * This is automatically called when the script loads
 */
(function injectWhatsAppStyles() {
    const style = document.createElement('style');
    style.textContent = `
        /* WhatsApp Float Button */
        .whatsapp-float {
            width: 60px;
            height: 60px;
            background: #25D366;
            color: #fff;
            border-radius: 50%;
            text-align: center;
            box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            animation: whatsapp-pulse 2s infinite;
        }
        
        .whatsapp-float:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 16px rgba(37, 211, 102, 0.6);
            background: #128C7E;
        }
        
        .whatsapp-float svg {
            width: 32px;
            height: 32px;
        }
        
        /* WhatsApp Popup */
        .whatsapp-popup {
            background: #fff;
            border-radius: 12px;
            padding: 16px 20px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            max-width: 280px;
            opacity: 0;
            transform: translateY(20px) scale(0.9);
            transition: all 0.3s ease;
            pointer-events: none;
        }
        
        .whatsapp-popup.show {
            opacity: 1;
            transform: translateY(0) scale(1);
            pointer-events: auto;
        }
        
        .whatsapp-popup-content {
            position: relative;
        }
        
        .whatsapp-popup-close {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #f1f1f1;
            border: none;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            font-size: 18px;
            line-height: 1;
            cursor: pointer;
            color: #666;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .whatsapp-popup-close:hover {
            background: #e0e0e0;
            color: #333;
        }
        
        .whatsapp-popup-message {
            color: #333;
            font-size: 14px;
            line-height: 1.5;
        }
        
        /* Pulse Animation */
        @keyframes whatsapp-pulse {
            0% {
                box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
            }
            50% {
                box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4), 0 0 0 10px rgba(37, 211, 102, 0.1);
            }
            100% {
                box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
            }
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .whatsapp-float {
                width: 50px;
                height: 50px;
            }
            
            .whatsapp-float svg {
                width: 26px;
                height: 26px;
            }
            
            .whatsapp-popup {
                max-width: 240px;
                padding: 12px 16px;
            }
        }
    `;
    document.head.appendChild(style);
})();