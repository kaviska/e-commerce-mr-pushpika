<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-pwa="true">
  <head>
    <meta charset="utf-8">

    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">

    <!-- SEO Meta Tags -->
    <title>Cartzilla | Terms and Conditions</title>
    <meta name="description" content="Cartzilla - Multipurpose Bootstrap E-Commerce HTML Template">
    <meta name="keywords" content="online shop, e-commerce, online store, market, multipurpose, product landing, cart, checkout, ui kit, light and dark mode, bootstrap, html5, css3, javascript, gallery, slider, mobile, pwa">
    <meta name="author" content="Createx Studio">

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
        <p class="fs-sm">Buy <span class="text-dark-emphasis fw-semibold">$183</span> more to get <span class="text-dark-emphasis fw-semibold">Free Shipping</span></p>
        <div class="progress w-100" role="progressbar" aria-label="Free shipping progress" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
          <div class="progress-bar bg-warning rounded-pill" style="width: 75%"></div>
        </div>
      </div>

      <!-- Items -->
      <div class="offcanvas-body d-flex flex-column gap-4 pt-2">

        <!-- Item -->
        <div class="d-flex align-items-center">
          <a class="flex-shrink-0" href="shop-product-general-electronics.html">
            <img src="assets/img/shop/electronics/thumbs/08.png" width="110" alt="iPhone 14">
          </a>
          <div class="w-100 min-w-0 ps-2 ps-sm-3">
            <h5 class="d-flex animate-underline mb-2">
              <a class="d-block fs-sm fw-medium text-truncate animate-target" href="shop-product-general-electronics.html">Apple iPhone 14 128GB White</a>
            </h5>
            <div class="h6 pb-1 mb-2">$899.00</div>
            <div class="d-flex align-items-center justify-content-between">
              <div class="count-input rounded-2">
                <button type="button" class="btn btn-icon btn-sm" data-decrement aria-label="Decrement quantity">
                  <i class="ci-minus"></i>
                </button>
                <input type="number" class="form-control form-control-sm" value="1" readonly>
                <button type="button" class="btn btn-icon btn-sm" data-increment aria-label="Increment quantity">
                  <i class="ci-plus"></i>
                </button>
              </div>
              <button type="button" class="btn-close fs-sm" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" data-bs-title="Remove" aria-label="Remove from cart"></button>
            </div>
          </div>
        </div>

        <!-- Item -->
        <div class="d-flex align-items-center">
          <a class="position-relative flex-shrink-0" href="shop-product-general-electronics.html">
            <span class="badge text-bg-danger position-absolute top-0 start-0">-10%</span>
            <img src="assets/img/shop/electronics/thumbs/09.png" width="110" alt="iPad Pro">
          </a>
          <div class="w-100 min-w-0 ps-2 ps-sm-3">
            <h5 class="d-flex animate-underline mb-2">
              <a class="d-block fs-sm fw-medium text-truncate animate-target" href="shop-product-general-electronics.html">Tablet Apple iPad Pro M2</a>
            </h5>
            <div class="h6 pb-1 mb-2">$989.00 <del class="text-body-tertiary fs-xs fw-normal">$1,099.00</del></div>
            <div class="d-flex align-items-center justify-content-between">
              <div class="count-input rounded-2">
                <button type="button" class="btn btn-icon btn-sm" data-decrement aria-label="Decrement quantity">
                  <i class="ci-minus"></i>
                </button>
                <input type="number" class="form-control form-control-sm" value="1" readonly>
                <button type="button" class="btn btn-icon btn-sm" data-increment aria-label="Increment quantity">
                  <i class="ci-plus"></i>
                </button>
              </div>
              <button type="button" class="btn-close fs-sm" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" data-bs-title="Remove" aria-label="Remove from cart"></button>
            </div>
          </div>
        </div>

        <!-- Item -->
        <div class="d-flex align-items-center">
          <a class="flex-shrink-0" href="shop-product-general-electronics.html">
            <img src="assets/img/shop/electronics/thumbs/01.png" width="110" alt="Smart Watch">
          </a>
          <div class="w-100 min-w-0 ps-2 ps-sm-3">
            <h5 class="d-flex animate-underline mb-2">
              <a class="d-block fs-sm fw-medium text-truncate animate-target" href="shop-product-general-electronics.html">Smart Watch Series 7, White</a>
            </h5>
            <div class="h6 pb-1 mb-2">$429.00</div>
            <div class="d-flex align-items-center justify-content-between">
              <div class="count-input rounded-2">
                <button type="button" class="btn btn-icon btn-sm" data-decrement aria-label="Decrement quantity">
                  <i class="ci-minus"></i>
                </button>
                <input type="number" class="form-control form-control-sm" value="1" readonly>
                <button type="button" class="btn btn-icon btn-sm" data-increment aria-label="Increment quantity">
                  <i class="ci-plus"></i>
                </button>
              </div>
              <button type="button" class="btn-close fs-sm" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" data-bs-title="Remove" aria-label="Remove from cart"></button>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <div class="offcanvas-header flex-column align-items-start">
        <div class="d-flex align-items-center justify-content-between w-100 mb-3 mb-md-4">
          <span class="text-light-emphasis">Subtotal:</span>
          <span class="h6 mb-0">$2,317.00</span>
        </div>
        <div class="d-flex w-100 gap-3">
          <a class="btn btn-lg btn-secondary w-100" href="checkout-v1-cart.html">View cart</a>
          <a class="btn btn-lg btn-primary w-100" href="checkout-v1-delivery-1.html">Checkout</a>
        </div>
      </div>
    </div>


    <!-- Navigation bar (Page header) -->
   <?php include 'components/HeaderForOtherPages.php'; ?>

    <!-- Page content -->
    <main class="content-wrapper">
      <div class="container py-5 mb-2 mt-n2 mt-sm-1 my-md-3 my-lg-4 mb-xl-5">
        <div class="row justify-content-center">
          <div class="col-lg-11 col-xl-10 col-xxl-9">
            <h1 class="h2 pb-2 pb-sm-3 pb-lg-4">Terms and conditions</h1>
            <hr class="mt-0">

            <div class="h6 pt-2 pt-lg-3"><span class="text-body-secondary fw-medium">Last updated:</span> June 26, 2024</div>
            <p>Welcome to Cartzilla! These Terms and Conditions ("Terms") govern your access to and use of the Cartzilla website and mobile application (collectively referred to as the "Platform"). Please read these Terms carefully before using the Platform. By accessing or using the Platform, you agree to be bound by these Terms.</p>

            <h2 class="h4 pt-3 pt-lg-4">1. Overview</h2>
            <p>Cartzilla provides an online platform that enables users to purchase groceries and other products from local stores and have them delivered to their designated location. By using the Platform, you acknowledge and agree that Cartzilla is not a store or retailer but merely acts as an intermediary to facilitate transactions between users and participating stores.</p>
            <p>Welcome to the family of websites and applications provided by Cartzilla. These Terms of Use govern your access to and use of all Cartzilla Sites, among other things. By using the Cartzilla Sites, you affirm that you are of legal age to enter into these Terms of Use, or, if you are not, that you have obtained parental or guardian consent to enter into these Terms of Use and your parent or guardian consents to these Terms of Use on your behalf. If you violate or do not agree to these Terms of Use, then your access to and use of the Cartzilla Sites is unauthorized. Additional terms and conditions apply to some services offered on the Cartzilla Sites (e.g., Cartzilla Pharmacy, Cartzilla +, and Gift Cards) or through other channels. Those terms and conditions can be found where the relevant service is offered on the Cartzilla Sites or otherwise and are incorporated into these Terms of Use by reference.</p>

            <h2 class="h4 pt-3 pt-lg-4">2. Your use of the Cartzilla Sites</h2>
            <p>You certify that the Content you provide on or through the Cartzilla Sites is accurate and that the information you provide on or through the Cartzilla Sites is complete. You are solely responsible for maintaining the confidentiality and security of your account including username, password, and PIN. Cartzilla is not responsible for any losses arising out of the unauthorized use of your account. You agree that Cartzilla does not have any responsibility if you lose or share access to your device. Any agreement between you and the issuer of your credit card, debit card, or other form of payment will continue to govern your use of such payment method on the Cartzilla Sites. You agree that Cartzilla is not a party to any such agreement, nor is Cartzilla responsible for the content, accuracy, or unavailability of any method used for payment. Your account may be restricted or terminated for any reason, at our sole discretion. Except as otherwise provided by law, at any time without notice to you, we may (1) change, restrict access to, suspend, or discontinue the Cartzilla Sites or any portion of the Cartzilla Sites, and (2) charge, modify, or waive any fees required to use any services, functionality, or other content available through the Cartzilla Sites or any portion of the Cartzilla Sites.</p>
            <h3 class="h6">In connection with the Cartzilla Sites, you will not:</h3>
            <ul class="gap-3">
              <li>Make available any Content through or in connection with the Cartzilla Sites that is or may be in violation of the content guidelines set forth in Section 3.C (Prohibited Content) below.</li>
              <li>Make available through or in connection with the Cartzilla Sites any virus, worm, Trojan horse, Easter egg, time bomb, spyware, or other computer code, file, or program that is or is potentially harmful or invasive or intended to damage or hijack the operation of, or to monitor the use of, any hardware, software, or equipment.</li>
              <li>Use the Cartzilla Sites for any commercial purpose, or for any purpose that is fraudulent or otherwise tortious or unlawful.</li>
              <li>Harvest or collect information about users of the Cartzilla Sites.</li>
              <li>Interfere with or disrupt the operation of the Cartzilla Sites or the systems, servers, or networks used to make the Cartzilla Sites available, including by hacking or defacing any portion of the Cartzilla Sites; or violate any requirement, procedure, or policy of such servers or networks.</li>
              <li>Reproduce, modify, adapt, translate, create derivative works of, sell, rent, lease, loan, timeshare, distribute, or otherwise exploit any portion of (or any use of) the Cartzilla Sites except as expressly authorized in these Terms of Use, without Cartzilla's express prior written consent.</li>
              <li>Reverse engineer, decompile, or disassemble any portion of the Cartzilla Sites, except where such restriction is expressly prohibited by applicable law.</li>
              <li>Remove any copyright, trademark, or other proprietary rights notice from the Cartzilla Sites.</li>
              <li>You will not attempt to do anything, or permit, encourage, assist, or allow any third party to do anything, prohibited in this Section, or attempt, permit, encourage, assist, or allow any other violation of these Terms of Use.</li>
            </ul>

            <h2 class="h4 pt-3 pt-lg-4">3. Ordering and delivery</h2>
            <p>When placing an order through Cartzilla, you are responsible for ensuring the accuracy of the items, quantities, and delivery details. Cartzilla does not guarantee the availability of any specific product and reserves the right to substitute products based on availability. Delivery times provided are estimates and may vary due to various factors.</p>
            <ul class="gap-3">
              <li>Reverse engineer, decompile, or disassemble any portion of the Cartzilla Sites, except where such restriction is expressly prohibited by applicable law.</li>
              <li>Reproduce, modify, adapt, translate, create derivative works of, sell, rent, lease, loan, timeshare, distribute, or otherwise exploit any portion of (or any use of) the Cartzilla Sites except as expressly authorized in these Terms of Use, without Cartzilla's express prior written consent.</li>
              <li>You will not attempt to do anything, or permit, encourage, assist, or allow any third party to do anything, prohibited in this Section, or attempt, permit, encourage, assist, or allow any other violation of these Terms of Use.</li>
              <li>Remove any copyright, trademark, or other proprietary rights notice from the Cartzilla Sites.</li>
            </ul>

            <h2 class="h4 pt-3 pt-lg-4">4. Payments</h2>
            <p>Cartzilla facilitates payments for orders made through the Platform. By using Cartzilla's payment services, you agree to provide accurate payment information and authorize Cartzilla to charge the applicable amount for your order. Cartzilla may use third-party payment processors to process transactions and may store your payment information in accordance with its Privacy Policy.</p>

            <h2 class="h4 pt-3 pt-lg-4">5. User conduct</h2>
            <p>You agree to use the Platform in compliance with all applicable laws and regulations. You shall not engage in any unlawful, harmful, or abusive behavior while using the Platform. Cartzilla reserves the right to suspend or terminate your account if you violate these Terms or engage in any prohibited activities.</p>
            <h3 class="h6 pt-2">Intellectual property</h3>
            <p>All content on the Cartzilla Platform, including but not limited to text, graphics, logos, and software, is the property of Cartzilla or its licensors and is protected by intellectual property laws. You may not use, reproduce, modify, or distribute any content from the Platform without prior written consent from Cartzilla.</p>
            <h3 class="h6 pt-2">Third-party links and content</h3>
            <p>The Platform may contain links to third-party websites or resources. Cartzilla does not endorse, control, or assume responsibility for any third-party content or websites. You acknowledge and agree that Cartzilla is not liable for any loss or damage caused by your reliance on such content or websites.</p>
            <h3 class="h6 pt-2">Disclaimer of warranties</h3>
            <p>The Platform is provided on an "as is" and "as available" basis, without warranties of any kind, either express or implied. Cartzilla does not guarantee the accuracy, reliability, or availability of the Platform and disclaims all warranties to the fullest extent permitted by law.</p>
            <h3 class="h6 pt-2">Limitation of liability</h3>
            <p>To the maximum extent permitted by law, Cartzilla and its affiliates shall not be liable for any indirect, incidental, consequential, or punitive damages arising out of or in connection with the use of the Platform, even if advised of the possibility of such damages.</p>

            <h2 class="h4 pt-3 pt-lg-4">6. Entire agreement and severability</h2>
            <p>These Terms, subject to any amendments, modifications, or additional agreements you enter into with Cartzilla, shall constitute the entire agreement between you and Cartzilla with respect to the Services and any use of the Services. If any provision of these Terms is found to be invalid by a court of competent jurisdiction, that provision only will be limited to the minimum extent necessary, and the remaining provisions will remain in full force and effect.</p>
            <p>Cartzilla reserves the right to modify or update these Terms at any time without prior notice. Your continued use of the Platform after any changes to the Terms constitutes acceptance of those changes.</p>

            <h2 class="h4 pt-3 pt-lg-4">7. Contact information</h2>
            <p>If you have any questions, or comments about these Terms please contact Cartzilla at:</p>
            <ul class="list-unstyled pb-1">
              <li class="nav pt-1">
                <a class="nav-link align-items-start fs-base p-0" href="tel:+15053753082">
                  <i class="ci-phone fs-xl mt-1 me-2"></i>
                  +1&nbsp;50&nbsp;537&nbsp;53&nbsp;082
                </a>
              </li>
              <li class="nav pt-1">
                <a class="nav-link align-items-start fs-base p-0" href="mailto:contact@catzillastore.com">
                  <i class="ci-mail fs-xl mt-1 me-2"></i>
                  contact@catzillastore.com
                </a>
              </li>
              <li class="nav pt-1">
                <a class="nav-link align-items-start fs-base p-0" href="#!">
                  <i class="ci-map-pin fs-xl mt-1 me-2"></i>
                  12 Beale St. Suite 600 San Francisco, California 94105
                </a>
              </li>
            </ul>
            <p class="pb-3 mb-0">For customer service inquiries, please review Your Account Settings, visit Cartzilla's <a class="fw-medium" href="help-topics-v1.html">Help Center.</a></p>

            <hr class="my-3 my-lg-4">

            <h2 class="h5 pt-3 mb-lg-4">Was this information helpful?</h2>
            <div class="d-flex gap-3">
              <button type="button" class="btn btn-outline-secondary">
                <i class="ci-thumbs-up fs-base me-2 ms-n1"></i>
                Yes
              </button>
              <button type="button" class="btn btn-outline-secondary">
                <i class="ci-thumbs-down fs-base me-2 ms-n1"></i>
                No
              </button>
            </div>
          </div>
        </div>
      </div>
    </main>


    <!-- Page footer -->
   <?php include 'components/Footer.php'; ?>


    <!-- Back to top button -->
    <div class="floating-buttons position-fixed top-50 end-0 z-sticky me-3 me-xl-4 pb-4">
      <a class="btn-scroll-top btn btn-sm bg-body border-0 rounded-pill shadow animate-slide-end" href="#top">
        Top
        <i class="ci-arrow-right fs-base ms-1 me-n1 animate-target"></i>
        <span class="position-absolute top-0 start-0 w-100 h-100 border rounded-pill z-0"></span>
        <svg class="position-absolute top-0 start-0 w-100 h-100 z-1" viewBox="0 0 62 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect x=".75" y=".75" width="60.5" height="30.5" rx="15.25" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"/>
        </svg>
      </a>
    </div>


    <!-- Bootstrap + Theme scripts -->
    <script src="assets/js/theme.min.js"></script>
  </body>
</html>
