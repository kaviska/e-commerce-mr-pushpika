<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-pwa="true">

<head>
  <meta charset="utf-8">

  <!-- Viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">

  <!-- SEO Meta Tags -->
  <title>Atsmore | Shop Electronics - Mobiles, Laptops, Gadgets &amp; More</title>
  <meta name="description" content="Atsmore the premium online shopping site in Sri Lanka. Shop for trendy Clothes, Mobiles, Electronics &amp; many more with great prices all across Sri Lanka. COD">
  <meta name="keywords" content="Buy &amp; sell electronics, cars, clothes, collectibles &amp; more on eBay, the world&apos;s online marketplace. Top brands, low prices &amp; free shipping on many items.">
  <meta name="author" content="GIGANTOO (PVT) LTD">

  <script defer src='./src/js/custom/main.js'></script>
  <script defer src='./src/js/custom/shop.js'></script>

  <!-- Webmanifest + Favicon / App icons -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <link rel="manifest" href="/manifest.json">
  <link rel="icon" type="image/png" href="assets/app-icons/icon-32x32.png" sizes="32x32">
  <link rel="apple-touch-icon" href="assets/app-icons/icon-180x180.png">

  <!-- Theme switcher (color modes) -->
  <script src="assets/js/theme-switcher.js?v=3"></script>

  <!-- Preloaded local web font (Inter) -->
  <link rel="preload" href="assets/fonts/inter-variable-latin.woff2" as="font" type="font/woff2" crossorigin>

  <!-- Font icons -->
  <link rel="preload" href="assets/icons/cartzilla-icons.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="stylesheet" href="assets/icons/cartzilla-icons.min.css?v=3">

  <!-- Vendor styles -->
  <link rel="stylesheet" href="assets/vendor/choices.js/public/assets/styles/choices.min.css?v=3">
  <link rel="stylesheet" href="assets/vendor/nouislider/dist/nouislider.min.css?v=3">

  <!-- Bootstrap + Theme styles -->
  <link rel="preload" href="assets/css/theme.min.css?v=3" as="style">
  <link rel="preload" href="assets/css/theme.rtl.min.css?v=3" as="style">
  <link rel="stylesheet" href="assets/css/theme.min.css?v=3" id="theme-styles">

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
  <?php
  include('./components/HeaderForOtherPages.php');
  ?>


  <!-- Page content -->
  <main class="content-wrapper">

    <!-- Breadcrumb -->
    <nav class="container pt-3 my-3 my-md-4" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Catalog with sidebar filters</li>
      </ol>
    </nav>


    <!-- Page title -->
    <h1 class="h3 container mb-4">Shop catalog</h1>


    <!-- Banners that are turned into collaspse on screens < 768px wide (sm breakpoint) -->
    <?php
    include('./components/ShopBanner.php');
    ?>


    <!-- Selected filters + Sorting -->
    <?php
    include('./components/SelectedFilterSort.php');
    ?>


    <!-- Products grid + Sidebar with filters -->
    <?php
    include('./components/ShopProduct.php');
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
                  <a class="nav-link fs-sm hover-effect-underline stretched-link p-0" href="#!">5 New Cool Gadgets You Must See on Cartzilla - Cheap Budget</a>
                </div>
              </li>
              <li class="nav flex-nowrap align-items-center position-relative">
                <img src="assets/img/home/electronics/vlog/02.jpg" class="rounded" width="140" alt="Video cover">
                <div class="ps-3">
                  <div class="fs-xs text-body-secondary lh-sm mb-2">10:20</div>
                  <a class="nav-link fs-sm hover-effect-underline stretched-link p-0" href="#!">5 Super Useful Gadgets on GIGANTOO You Must Have in 2023</a>
                </div>
              </li>
              <li class="nav flex-nowrap align-items-center position-relative">
                <img src="assets/img/home/electronics/vlog/03.jpg" class="rounded" width="140" alt="Video cover">
                <div class="ps-3">
                  <div class="fs-xs text-body-secondary lh-sm mb-2">8:40</div>
                  <a class="nav-link fs-sm hover-effect-underline stretched-link p-0" href="#!">Top 5 New Amazing Gadgets on GIGANTOO You Must See</a>
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
  <?php
  include('./components/Footer.php');
  ?>


  <!-- Filter offcanvas toggle that is visible on screens < 992px wide (lg breakpoint) -->
  <button type="button" class="fixed-bottom z-sticky w-100 btn btn-lg btn-dark border-0 border-top border-light border-opacity-10 rounded-0 pb-4 d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#filterSidebar" aria-controls="filterSidebar" data-bs-theme="light">
    <i class="ci-filter fs-base me-2"></i>
    Filters
  </button>


  <!-- Back to top button -->
  <div class="floating-buttons position-fixed top-50 end-0 z-sticky me-3 me-xl-4 pb-4">
    <a class="btn-scroll-top btn btn-sm bg-body border-0 rounded-pill shadow animate-slide-end" href="#top">
      Top
      <i class="ci-arrow-right fs-base ms-1 me-n1 animate-target"></i>
      <span class="position-absolute top-0 start-0 w-100 h-100 border rounded-pill z-0"></span>
      <svg class="position-absolute top-0 start-0 w-100 h-100 z-1" viewBox="0 0 62 32" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x=".75" y=".75" width="60.5" height="30.5" rx="15.25" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" />
      </svg>
    </a>
  </div>


  <!-- Vendor scripts -->
  <script src="assets/vendor/choices.js/public/assets/scripts/choices.min.js?v=3"></script>
  <script src="assets/vendor/nouislider/dist/nouislider.min.js?v=3"></script>

  <!-- Bootstrap + Theme scripts -->
  <script src="assets/js/theme.min.js?v=3"></script>
</body>

</html>