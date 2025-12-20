document.addEventListener('DOMContentLoaded', () => {
    console.log('hhs');
    
    // Initialize WhatsApp popup
    initWhatsAppWidget();
});

//updated
window.SERVER_URL = 'http://127.0.0.1:8000/api';

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