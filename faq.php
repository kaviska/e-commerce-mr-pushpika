<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-pwa="true">
  <head>
    <meta charset="utf-8">

    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">

    <!-- SEO Meta Tags -->
    <title>FAQ - Frequently Asked Questions | Atsmore Sri Lanka</title>
    <meta name="description" content="Find answers to frequently asked questions about Atsmore online shopping in Sri Lanka. Learn about delivery, payments, returns, and more.">
    <meta name="keywords" content="atsmore faq, frequently asked questions, online shopping help sri lanka, delivery information, return policy, payment methods">
    <meta name="author" content="GIGANTOO (PVT) LTD">

    <!-- Webmanifest + Favicon / App icons -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="manifest" href="/manifest.json">
    <link rel="icon" type="image/png" href="assets/app-icons/icon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon" href="assets/app-icons/icon-180x180.png">

    <!-- Theme switcher (color modes) -->
    <script src="assets/js/theme-switcher.js"></script>

    <!-- Preloaded local web font (Inter) -->
    <link rel="preload" href="assets/fonts/inter-variable-latin.woff2" as="font" type="font/woff2" crossorigin>

    <!-- Font icons -->
    <link rel="preload" href="assets/icons/cartzilla-icons.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="assets/icons/cartzilla-icons.min.css">

    <!-- Bootstrap + Theme styles -->
    <link rel="preload" href="assets/css/theme.min.css" as="style">
    <link rel="preload" href="assets/css/theme.rtl.min.css" as="style">
    <link rel="stylesheet" href="assets/css/theme.min.css" id="theme-styles">

    <!-- Custom script -->
    <script defer src="src/js/custom/main.js"></script>
    
    <!-- Custom styles for FAQ -->
    <style>
      .accordion-button {
        padding: 1.25rem 1.5rem !important;
      }
      .accordion-body {
        padding: 1.25rem 1.5rem !important;
      }
    </style>
  </head>

  <!-- Body -->
  <body>

    <!-- Shopping cart offcanvas -->
    <div class="offcanvas offcanvas-end pb-sm-2 px-sm-2" id="shoppingCart" tabindex="-1" aria-labelledby="shoppingCartLabel" style="width: 500px">
      <!-- Header -->
      <div class="offcanvas-header flex-column align-items-start py-3 pt-lg-4">
        <div class="d-flex align-items-center justify-content-between w-100 mb-3 mb-lg-4">
          <h4 class="offcanvas-title" id="shoppingCartLabel">Shopping cart</h4>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <p class="fs-sm">Buy <span class="text-dark-emphasis fw-semibold">LKR 183</span> more to get <span class="text-dark-emphasis fw-semibold">Free Shipping</span></p>
        <div class="progress w-100" role="progressbar" aria-label="Free shipping progress" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
          <div class="progress-bar bg-warning rounded-pill" style="width: 75%"></div>
        </div>
      </div>
    </div>

    <?php include 'components/HeaderForOtherPages.php'; ?>

    <!-- Page content -->
    <main class="content-wrapper">
      
      <!-- Breadcrumb -->
      <nav class="container py-4 my-lg-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item">
            <a href="index.php">Home</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">FAQ</li>
        </ol>
      </nav>

      <!-- Page title -->
      <section class="container pb-3 pb-lg-4">
        <h1 class="h2 mb-3">Frequently Asked Questions</h1>
        <p class="fs-lg text-body-secondary">Find answers to common questions about shopping at Atsmore</p>
      </section>

      <!-- FAQ Accordion -->
      <section class="container pb-5 mb-2 mb-md-3 mb-lg-4 mb-xl-5">
        <div class="row">
          <div class="col-lg-10 col-xl-9 mx-auto">
            
            <!-- General Questions -->
            <div class="mb-5">
              <h2 class="h3 mb-4">General Questions</h2>
              <div class="accordion" id="generalQuestions">
                
                <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
                  <h3 class="accordion-header" id="generalQ1">
                    <button class="accordion-button shadow-none rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#generalA1" aria-expanded="true" aria-controls="generalA1">
                      What is Atsmore?
                    </button>
                  </h3>
                  <div class="accordion-collapse collapse show" id="generalA1" aria-labelledby="generalQ1" data-bs-parent="#generalQuestions">
                    <div class="accordion-body fs-sm pt-0">
                      Atsmore is Sri Lanka's premium online shopping destination offering a wide range of products including electronics, fashion, home goods, and more. We provide great prices, quality products, and convenient Cash on Delivery (COD) service across Sri Lanka.
                    </div>
                  </div>
                </div>

                <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
                  <h3 class="accordion-header" id="generalQ2">
                    <button class="accordion-button shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#generalA2" aria-expanded="false" aria-controls="generalA2">
                      How do I place an order?
                    </button>
                  </h3>
                  <div class="accordion-collapse collapse" id="generalA2" aria-labelledby="generalQ2" data-bs-parent="#generalQuestions">
                    <div class="accordion-body fs-sm pt-0">
                      Simply browse our catalog, select the products you want, choose your preferred variations (size, color, etc.), and click "Buy on WhatsApp". This will open a WhatsApp chat with our team where you can complete your order with personalized assistance.
                    </div>
                  </div>
                </div>

                <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
                  <h3 class="accordion-header" id="generalQ3">
                    <button class="accordion-button shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#generalA3" aria-expanded="false" aria-controls="generalA3">
                      Do I need to create an account to shop?
                    </button>
                  </h3>
                  <div class="accordion-collapse collapse" id="generalA3" aria-labelledby="generalQ3" data-bs-parent="#generalQuestions">
                    <div class="accordion-body fs-sm pt-0">
                      No account is required! You can browse and purchase through WhatsApp directly. However, creating an account allows you to track orders, save favorites, and leave product reviews.
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- Shipping & Delivery -->
            <div class="mb-5">
              <h2 class="h3 mb-4">Shipping & Delivery</h2>
              <div class="accordion" id="shippingQuestions">
                
                <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
                  <h3 class="accordion-header" id="shippingQ1">
                    <button class="accordion-button shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#shippingA1" aria-expanded="false" aria-controls="shippingA1">
                      What are the delivery options?
                    </button>
                  </h3>
                  <div class="accordion-collapse collapse" id="shippingA1" aria-labelledby="shippingQ1" data-bs-parent="#shippingQuestions">
                    <div class="accordion-body fs-sm pt-0">
                      <p class="mb-2">We offer island-wide delivery across Sri Lanka. Delivery times vary by location:</p>
                      <ul class="mb-0">
                        <li>Colombo & suburbs: 1-2 business days</li>
                        <li>Other major cities: 2-3 business days</li>
                        <li>Remote areas: 3-5 business days</li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
                  <h3 class="accordion-header" id="shippingQ2">
                    <button class="accordion-button shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#shippingA2" aria-expanded="false" aria-controls="shippingA2">
                      How much does shipping cost?
                    </button>
                  </h3>
                  <div class="accordion-collapse collapse" id="shippingA2" aria-labelledby="shippingQ2" data-bs-parent="#shippingQuestions">
                    <div class="accordion-body fs-sm pt-0">
                      Shipping costs vary based on your location and order value. We offer FREE shipping on orders above LKR 5,000. For orders below this amount, shipping fees typically range from LKR 250-500 depending on your location.
                    </div>
                  </div>
                </div>

                <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
                  <h3 class="accordion-header" id="shippingQ3">
                    <button class="accordion-button shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#shippingA3" aria-expanded="false" aria-controls="shippingA3">
                      Can I track my order?
                    </button>
                  </h3>
                  <div class="accordion-collapse collapse" id="shippingA3" aria-labelledby="shippingQ3" data-bs-parent="#shippingQuestions">
                    <div class="accordion-body fs-sm pt-0">
                      Yes! Once your order is dispatched, you'll receive a tracking number via WhatsApp or SMS. You can use this to track your order's delivery status.
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- Payment & Pricing -->
            <div class="mb-5">
              <h2 class="h3 mb-4">Payment & Pricing</h2>
              <div class="accordion" id="paymentQuestions">
                
                <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
                  <h3 class="accordion-header" id="paymentQ1">
                    <button class="accordion-button shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#paymentA1" aria-expanded="false" aria-controls="paymentA1">
                      What payment methods do you accept?
                    </button>
                  </h3>
                  <div class="accordion-collapse collapse" id="paymentA1" aria-labelledby="paymentQ1" data-bs-parent="#paymentQuestions">
                    <div class="accordion-body fs-sm pt-0">
                      <p class="mb-2">We accept multiple payment methods:</p>
                      <ul class="mb-0">
                        <li><strong>Cash on Delivery (COD)</strong> - Pay when you receive your order</li>
                        <li><strong>Bank Transfer</strong> - Direct bank deposit</li>
                        <li><strong>Credit/Debit Cards</strong> - Visa, Mastercard</li>
                        <li><strong>Digital Wallets</strong> - Apple Pay, Google Pay, PayPal</li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
                  <h3 class="accordion-header" id="paymentQ2">
                    <button class="accordion-button shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#paymentA2" aria-expanded="false" aria-controls="paymentA2">
                      Is Cash on Delivery (COD) available?
                    </button>
                  </h3>
                  <div class="accordion-collapse collapse" id="paymentA2" aria-labelledby="paymentQ2" data-bs-parent="#paymentQuestions">
                    <div class="accordion-body fs-sm pt-0">
                      Yes! Cash on Delivery is available across Sri Lanka. Simply pay cash when your order is delivered to your doorstep. COD is our most popular payment method.
                    </div>
                  </div>
                </div>

                <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
                  <h3 class="accordion-header" id="paymentQ3">
                    <button class="accordion-button shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#paymentA3" aria-expanded="false" aria-controls="paymentA3">
                      Are prices inclusive of taxes?
                    </button>
                  </h3>
                  <div class="accordion-collapse collapse" id="paymentA3" aria-labelledby="paymentQ3" data-bs-parent="#paymentQuestions">
                    <div class="accordion-body fs-sm pt-0">
                      Yes, all prices displayed on our website are inclusive of applicable taxes. The price you see is the price you pay (excluding delivery charges if applicable).
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- Returns & Refunds -->
            <div class="mb-5">
              <h2 class="h3 mb-4">Returns & Refunds</h2>
              <div class="accordion" id="returnsQuestions">
                
                <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
                  <h3 class="accordion-header" id="returnsQ1">
                    <button class="accordion-button shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#returnsA1" aria-expanded="false" aria-controls="returnsA1">
                      What is your return policy?
                    </button>
                  </h3>
                  <div class="accordion-collapse collapse" id="returnsA1" aria-labelledby="returnsQ1" data-bs-parent="#returnsQuestions">
                    <div class="accordion-body fs-sm pt-0">
                      We offer a 7-day return policy for most products. Items must be unused, in original packaging, and with all tags attached. Electronics and certain products may have different return policies - please check product details or contact us.
                    </div>
                  </div>
                </div>

                <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
                  <h3 class="accordion-header" id="returnsQ2">
                    <button class="accordion-button shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#returnsA2" aria-expanded="false" aria-controls="returnsA2">
                      How do I return an item?
                    </button>
                  </h3>
                  <div class="accordion-collapse collapse" id="returnsA2" aria-labelledby="returnsQ2" data-bs-parent="#returnsQuestions">
                    <div class="accordion-body fs-sm pt-0">
                      Contact our support team via WhatsApp or call center within 7 days of receiving your order. Our team will guide you through the return process and arrange pickup if necessary.
                    </div>
                  </div>
                </div>

                <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
                  <h3 class="accordion-header" id="returnsQ3">
                    <button class="accordion-button shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#returnsA3" aria-expanded="false" aria-controls="returnsA3">
                      When will I receive my refund?
                    </button>
                  </h3>
                  <div class="accordion-collapse collapse" id="returnsA3" aria-labelledby="returnsQ3" data-bs-parent="#returnsQuestions">
                    <div class="accordion-body fs-sm pt-0">
                      Once we receive and inspect your returned item, refunds are processed within 5-7 business days. The refund will be issued to your original payment method. For COD orders, refunds are processed via bank transfer.
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- Still have questions? -->
            <div class="card border-0 bg-body-tertiary rounded-4 p-4 text-center">
              <div class="card-body">
                <h3 class="h4 mb-3">Still have questions?</h3>
                <p class="fs-sm text-body-secondary mb-4">Can't find the answer you're looking for? Our customer support team is here to help!</p>
                <div class="d-flex flex-wrap gap-3 justify-content-center">
                  <a href="whatsapp-support.php" class="btn btn-primary">
                    <i class="ci-message-circle fs-lg me-2"></i>
                    Chat on WhatsApp
                  </a>
                  <a href="contact-us.php" class="btn btn-outline-secondary">
                    <i class="ci-mail fs-lg me-2"></i>
                    Contact Us
                  </a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>

    </main>

    <?php include 'components/Footer.php'; ?>

    <!-- Back to top button -->
    <div class="floating-buttons position-fixed top-50 end-0 z-sticky me-3 me-xl-4 pb-4">
      <a class="btn-scroll-top btn btn-sm bg-body border-0 rounded-pill shadow animate-slide-end" href="#top">
        Top
        <i class="ci-arrow-right fs-base ms-1 me-n1 animate-target"></i>
        <span class="position-absolute top-0 start-0 w-100 h-100 border rounded-pill z-0"></span>
        <svg class="position-absolute top-0 start-0 w-100 h-100 z-1" viewBox="0 0 62 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect x=".75" y=".75" width="60.5" height="30.5" rx="15.25" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"></rect>
        </svg>
      </a>
    </div>

    <!-- Bootstrap + Theme scripts -->
    <script src="assets/js/theme.min.js"></script>

  </body>
</html>
