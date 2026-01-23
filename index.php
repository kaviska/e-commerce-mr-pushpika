<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-pwa="true">
  <head>
    <meta charset="utf-8">

    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">

    <!-- SEO Meta Tags -->
    <title>Atsmore | Shopping Cart, Electronics, Cars, Fashion, Collectibles &amp; More</title>
    <meta name="description" content="Atsmore the premium online shopping site in Sri Lanka. Shop for trendy Clothes, Mobiles, Electronics &amp; many more with great prices all across Sri Lanka. COD">
    <meta name="keywords" content="Buy &amp; sell electronics, cars, clothes, collectibles &amp; more on eBay, the world&apos;s online marketplace. Top brands, low prices &amp; free shipping on many items.">
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

    <!-- Vendor styles -->
    <link rel="stylesheet" href="assets/vendor/swiper/swiper-bundle.min.css">

    <!-- Bootstrap + Theme styles -->
    <!-- <link rel="preload" href="assets/css/theme.min.css" as="style"> -->
    <link rel="preload" href="assets/css/theme.rtl.min.css" as="style">
    <link rel="stylesheet" href="assets/css/theme.min.css" id="theme-styles">

    <!-- custome script -->
    <script defer src="src/js/custom/main.js"></script>
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


   <!-- navigation bar -->
    <?php
    include('./components/header.php');
    ?>

    <!-- Page content -->
    <main class="content-wrapper">

      <!-- Hero slider -->
       <?php
     include('./components/HeroSlider.php');
     ?>


      <!-- Features -->
      <section class="container pt-5 mt-1 mt-sm-3 mt-lg-4">
        <div class="row row-cols-2 row-cols-md-4 g-4">

          <!-- Item -->
          <div class="col">
            <div class="d-flex flex-column flex-xxl-row align-items-center">
              <div class="d-flex text-dark-emphasis bg-body-tertiary rounded-circle p-4 mb-3 mb-xxl-0">
                <i class="ci-delivery fs-2 m-xxl-1"></i>
              </div>
              <div class="text-center text-xxl-start ps-xxl-3">
                <h3 class="h6 mb-1">Free Shipping &amp; Returns</h3>
                <p class="fs-sm mb-0">For all orders over LKR 199.00</p>
              </div>
            </div>
          </div>

          <!-- Item -->
          <div class="col">
            <div class="d-flex flex-column flex-xxl-row align-items-center">
              <div class="d-flex text-dark-emphasis bg-body-tertiary rounded-circle p-4 mb-3 mb-xxl-0">
                <i class="ci-credit-card fs-2 m-xxl-1"></i>
              </div>
              <div class="text-center text-xxl-start ps-xxl-3">
                <h3 class="h6 mb-1">Secure Payment</h3>
                <p class="fs-sm mb-0">We ensure secure payment</p>
              </div>
            </div>
          </div>

          <!-- Item -->
          <div class="col">
            <div class="d-flex flex-column flex-xxl-row align-items-center">
              <div class="d-flex text-dark-emphasis bg-body-tertiary rounded-circle p-4 mb-3 mb-xxl-0">
                <i class="ci-refresh-cw fs-2 m-xxl-1"></i>
              </div>
              <div class="text-center text-xxl-start ps-xxl-3">
                <h3 class="h6 mb-1">Money Back Guarantee</h3>
                <p class="fs-sm mb-0">Returning money 30 days</p>
              </div>
            </div>
          </div>

          <!-- Item -->
          <div class="col">
            <div class="d-flex flex-column flex-xxl-row align-items-center">
              <div class="d-flex text-dark-emphasis bg-body-tertiary rounded-circle p-4 mb-3 mb-xxl-0">
                <i class="ci-chat fs-2 m-xxl-1"></i>
              </div>
              <div class="text-center text-xxl-start ps-xxl-3">
                <h3 class="h6 mb-1">24/7 Customer Support</h3>
                <p class="fs-sm mb-0">Friendly customer support</p>
              </div>
            </div>
          </div>
        </div>
      </section>


      <!-- New arrivals (List) -->
       <?php
      include('./components/NewArrival.php');
      ?>


      <!-- Trending products (Grid) -->
     <?php
      include('./components/TrendingProduct.php');
      ?>


      <!-- Sale Banner (CTA) -->
      <section class="container pt-5 mt-sm-2 mt-md-3 mt-lg-4">
        <div class="row g-0">
          <div class="col-md-3 mb-n4 mb-md-0">
            <div class="position-relative d-flex flex-column align-items-center justify-content-center h-100 py-5">
              <div class="position-absolute top-0 start-0 w-100 h-100 d-none d-md-block">
                <span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none-dark" style="background-color: #accbee"></span>
                <span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none d-block-dark" style="background-color: #1b273a"></span>
              </div>
              <div class="position-absolute top-0 start-0 w-100 h-100 d-md-none">
                <span class="position-absolute top-0 start-0 w-100 h-100 rounded-top-5 d-none-dark" style="background: linear-gradient(90deg, #accbee 0%, #e7f0fd 100%)"></span>
                <span class="position-absolute top-0 start-0 w-100 h-100 rounded-top-5 d-none d-block-dark" style="background: linear-gradient(90deg, #1b273a 0%, #1f2632 100%)"></span>
              </div>
              <div class="position-relative z-1 display-1 text-dark-emphasis text-nowrap mb-0">
                20
                <span class="d-inline-block ms-n2">
                  <span class="d-block fs-1">%</span>
                  <span class="d-block fs-5">OFF</span>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-9 position-relative">
            <div class="position-absolute top-0 start-0 h-100 overflow-hidden rounded-pill z-2 d-none d-md-block" style="color: var(--cz-body-bg); margin-left: -2px">
              <svg width="4" height="436" viewBox="0 0 4 436" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 0L1.99998 436" stroke="currentColor" stroke-width="3" stroke-dasharray="8 12" stroke-linecap="round"/>
              </svg>
            </div>
            <div class="position-relative">
              <span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none-dark rtl-flip" style="background: linear-gradient(90deg, #accbee 0%, #e7f0fd 100%)"></span>
              <span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none d-block-dark rtl-flip" style="background: linear-gradient(90deg, #1b273a 0%, #1f2632 100%)"></span>
              <div class="row align-items-center position-relative z-2">
                <div class="col-md-6 mb-3 mb-md-0">
                  <div class="text-center text-md-start py-md-5 px-4 ps-md-5 pe-md-0 me-md-n5">
                    <h3 class="text-uppercase fw-bold ps-xxl-3 pb-2 mb-1">Seasonal weekly sale 2024</h3>
                    <p class="text-body-emphasis ps-xxl-3 mb-0">Use code <span class="d-inline-block fw-semibold bg-white text-dark rounded-pill py-1 px-2">Sale 2024</span> to get best offer</p>
                  </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center justify-content-md-end pb-5 pb-md-0">
                  <div class="me-xxl-4">
                    <img src="assets/img/home/electronics/banner/camera.png" class="d-block rtl-flip" width="420" alt="Camera">
                    <div class="d-none d-lg-block" style="margin-bottom: -9%"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="d-none d-lg-block" style="padding-bottom: 3%"></div>
      </section>


      <!-- Special offers (Carousel) -->
      <?php
      include('./components/SpecialOffer.php');
      ?>


      <!-- Brands -->
      <?php
      include('./components/Brands.php');
      ?>


      <!-- Subscription form + Vlog -->
      <!-- <section class="bg-body-tertiary py-5">
        <div class="container pt-sm-2 pt-md-3 pt-lg-4 pt-xl-5">
          <div class="row">
            <div class="col-md-6 col-lg-5 mb-5 mb-md-0">
              <h2 class="h4 mb-2">Sign up to our newsletter</h2>
              <p class="text-body pb-2 pb-ms-3">Receive our latest updates about our products &amp; promotions</p>
              <form class="d-flex needs-validation pb-1 pb-sm-2 pb-md-3 pb-lg-0 mb-4 mb-lg-5" novalidate>
                <div class="position-relative w-100 me-2">
                  <input type="email" class="form-control form-control-lg" placeholder="Your email" required>
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Subscribe</button>
              </form>
              <div class="d-flex gap-3">
                <a class="btn btn-icon btn-secondary rounded-circle" href="#!" aria-label="Instagram">
                  <i class="ci-instagram fs-base"></i>
                </a>
                <a class="btn btn-icon btn-secondary rounded-circle" href="#!" aria-label="Facebook">
                  <i class="ci-facebook fs-base"></i>
                </a>
                <a class="btn btn-icon btn-secondary rounded-circle" href="#!" aria-label="YouTube">
                  <i class="ci-youtube fs-base"></i>
                </a>
                <a class="btn btn-icon btn-secondary rounded-circle" href="#!" aria-label="Telegram">
                  <i class="ci-telegram fs-base"></i>
                </a>
              </div>
            </div>
            <div class="col-md-6 col-lg-5 col-xl-4 offset-lg-1 offset-xl-2">
              <ul class="list-unstyled d-flex flex-column gap-4 ps-md-4 ps-lg-0 mb-3">
                <li class="nav flex-nowrap align-items-center position-relative">
                  <img src="assets/img/home/electronics/vlog/01.jpg" class="rounded" width="140" alt="Video cover">
                  <div class="ps-3">
                    <div class="fs-xs text-body-secondary lh-sm mb-2">6:16</div>
                    <a class="nav-link fs-sm hover-effect-underline stretched-link p-0" href="#!">5 New Cool Gadgets You Must See on Atsmore - Cheap Budget</a>
                  </div>
                </li>
                <li class="nav flex-nowrap align-items-center position-relative">
                  <img src="assets/img/home/electronics/vlog/02.jpg" class="rounded" width="140" alt="Video cover">
                  <div class="ps-3">
                    <div class="fs-xs text-body-secondary lh-sm mb-2">10:20</div>
                    <a class="nav-link fs-sm hover-effect-underline stretched-link p-0" href="#!">5 Super Useful Gadgets on Atsmore You Must Have in 2023</a>
                  </div>
                </li>
                <li class="nav flex-nowrap align-items-center position-relative">
                  <img src="assets/img/home/electronics/vlog/03.jpg" class="rounded" width="140" alt="Video cover">
                  <div class="ps-3">
                    <div class="fs-xs text-body-secondary lh-sm mb-2">8:40</div>
                    <a class="nav-link fs-sm hover-effect-underline stretched-link p-0" href="#!">Top 5 New Amazing Gadgets on Atsmore You Must See</a>
                  </div>
                </li>
              </ul>
              <div class="nav ps-md-4 ps-lg-0">
                <a class="btn nav-link animate-underline text-decoration-none px-0" href="#!">
                  <span class="animate-target">View all</span>
                  <i class="ci-chevron-right fs-base ms-1"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section> -->
    </main>


    <!-- Page footer -->
    <?php include('./components/Footer.php'); ?>

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


    <!-- Vendor scripts -->
    <!-- <script src="assets/vendor/swiper/swiper-bundle.min.js"></script> -->

    <!-- Bootstrap + Theme scripts -->
    <!-- <script src="assets/js/theme.min.js"></script> -->
  </body>
</html>
