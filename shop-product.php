<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-pwa="true">

<head>
  <meta charset="utf-8">

  <!-- Viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">

  <!-- SEO Meta Tags -->
  <title>Atsmore | Product Details - Shop Electronics, Fashion &amp; More</title>
  <meta name="description" content="Atsmore the premium online shopping site in Sri Lanka. Shop for trendy Clothes, Mobiles, Electronics &amp; many more with great prices all across Sri Lanka. COD">
  <meta name="keywords" content="Buy &amp; sell electronics, cars, clothes, collectibles &amp; more on eBay, the world&apos;s online marketplace. Top brands, low prices &amp; free shipping on many items.">
  <meta name="author" content="GIGANTOO (PVT) LTD">

  <!-- Webmanifest + Favicon / App icons -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <link rel="manifest" href="/manifest.json">
  <link rel="icon" type="image/png" href="assets/app-icons/icon-32x32.png" sizes="32x32">
  <link rel="apple-touch-icon" href="assets/app-icons/icon-180x180.png">

  <!-- Preloaded local web font (Inter) -->
  <link rel="preload" href="assets/fonts/inter-variable-latin.woff2" as="font" type="font/woff2" crossorigin>

  <!-- Font icons -->
  <link rel="preload" href="assets/icons/cartzilla-icons.woff2" as="font" type="font/woff2" crossorigin>

  <!-- Bootstrap + Theme styles (Critical) -->
  <link rel="stylesheet" href="assets/css/theme.min.css" id="theme-styles">

  <!-- Non-critical CSS (Deferred) -->
  <link rel="stylesheet" href="assets/icons/cartzilla-icons.min.css" media="print" onload="this.media='all'">
  <link rel="stylesheet" href="assets/vendor/swiper/swiper-bundle.min.css" media="print" onload="this.media='all'">
  <link rel="stylesheet" href="assets/vendor/drift-zoom/dist/drift-basic.min.css" media="print" onload="this.media='all'">
  <link rel="stylesheet" href="assets/vendor/simplebar/dist/simplebar.min.css" media="print" onload="this.media='all'">
  <link rel="stylesheet" href="assets/vendor/choices.js/public/assets/styles/choices.min.css" media="print" onload="this.media='all'">
  <noscript>
    <link rel="stylesheet" href="assets/icons/cartzilla-icons.min.css">
    <link rel="stylesheet" href="assets/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/vendor/drift-zoom/dist/drift-basic.min.css">
    <link rel="stylesheet" href="assets/vendor/simplebar/dist/simplebar.min.css">
    <link rel="stylesheet" href="assets/vendor/choices.js/public/assets/styles/choices.min.css">
  </noscript>

  <!-- Theme switcher (color modes) - Deferred -->
  <script defer src="assets/js/theme-switcher.js"></script>
</head>


<!-- Body -->

<body>

  <!-- Review form modal -->
  <div class="modal fade" id="reviewForm" data-bs-backdrop="static" tabindex="-1" aria-labelledby="reviewFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <form class="modal-content needs-validation" novalidate id="add-review-form">
        <div class="modal-header border-0">
          <h5 class="modal-title" id="reviewFormLabel">Leave a review</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body pb-3 pt-0">
          <div class="mb-3">
            <label for="review-name" class="form-label">Your name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="review-name" required>
            <div class="invalid-feedback">Please enter your name!</div>
            <small class="form-text">Will be displayed on the comment.</small>
          </div>
          <div class="mb-3">
            <label for="review-email" class="form-label">Your email <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="review-email" required>
            <div class="invalid-feedback">Please provide a valid email address!</div>
            <small class="form-text">Authentication only - we won't spam you.</small>
          </div>
          <div class="mb-3">
            <label class="form-label">Rating <span class="text-danger">*</span></label>
            <select class="form-select" data-select='{
                "placeholderValue": "Choose rating",
                "choices": [
                  {
                    "value": "",
                    "label": "Choose rating",
                    "placeholder": true
                  },
                  {
                    "value": "1",
                    "label": "<span class=\"visually-hidden\">1 star</span>",
                    "customProperties": {
                      "icon": "<span class=\"d-flex gap-1 py-1\"><i class=\"ci-star-filled text-warning\"></i></span>",
                      "selected": "1 star"
                    }
                  },
                  {
                    "value": "2",
                    "label": "<span class=\"visually-hidden\">2 stars</span>",
                    "customProperties": {
                      "icon": "<span class=\"d-flex gap-1 py-1\"><i class=\"ci-star-filled text-warning\"></i><i class=\"ci-star-filled text-warning\"></i></span>",
                      "selected": "2 stars"
                    }
                  },
                  {
                    "value": "3",
                    "label": "<span class=\"visually-hidden\">3 stars</span>",
                    "customProperties": {
                      "icon": "<span class=\"d-flex gap-1 py-1\"><i class=\"ci-star-filled text-warning\"></i><i class=\"ci-star-filled text-warning\"></i><i class=\"ci-star-filled text-warning\"></i></span>",
                      "selected": "3 stars"
                    }
                  },
                  {
                    "value": "4",
                    "label": "<span class=\"visually-hidden\">4 stars</span>",
                    "customProperties": {
                      "icon": "<span class=\"d-flex gap-1 py-1\"><i class=\"ci-star-filled text-warning\"></i><i class=\"ci-star-filled text-warning\"></i><i class=\"ci-star-filled text-warning\"></i><i class=\"ci-star-filled text-warning\"></i></span>",
                      "selected": "4 stars"
                    }
                  },
                  {
                    "value": "5",
                    "label": "<span class=\"visually-hidden\">5 stars</span>",
                    "customProperties": {
                      "icon": "<span class=\"d-flex gap-1 py-1\"><i class=\"ci-star-filled text-warning\"></i><i class=\"ci-star-filled text-warning\"></i><i class=\"ci-star-filled text-warning\"></i><i class=\"ci-star-filled text-warning\"></i><i class=\"ci-star-filled text-warning\"></i></span>",
                      "selected": "5 stars"
                    }
                  }
                ]
              }' data-select-template="true" required></select>
            <div class="invalid-feedback">Please choose your rating!</div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="review-text">Review <span class="text-danger">*</span></label>
            <textarea class="form-control" rows="4" id="review-text" required></textarea>
            <div class="invalid-feedback">Please write a review!</div>
            <small class="form-text">Your review must be at least 50 characters.</small>
          </div>
          <div class="mb-3">
            <label class="form-label">Pros</label>
            <input type="text" class="form-select" data-select='{"placeholderValue": "Type and hit \"Enter\""}'>
          </div>
          <div>
            <label class="form-label">Cons</label>
            <input type="text" class="form-select" data-select='{"placeholderValue": "Type and hit \"Enter\""}'>
          </div>
        </div>
        <div class="modal-footer flex-nowrap gap-3 border-0 px-4">
          <button type="reset" class="btn btn-secondary w-100 m-0" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary w-100 m-0">Submit review</button>
        </div>
      </form>
    </div>
  </div>


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

    <!-- Items -->
    <div class="offcanvas-body d-flex flex-column gap-4 pt-2">

      <!-- Item -->
      <div class="d-flex align-items-center">
        <a class="flex-shrink-0" href="#!">
          <img src="assets/img/shop/electronics/thumbs/08.png" width="110" alt="iPhone 14">
        </a>
        <div class="w-100 min-w-0 ps-2 ps-sm-3">
          <h5 class="d-flex animate-underline mb-2">
            <a class="d-block fs-sm fw-medium text-truncate animate-target" href="#!">Apple iPhone 14 128GB White</a>
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
        <a class="position-relative flex-shrink-0" href="#!">
          <span class="badge text-bg-danger position-absolute top-0 start-0">-10%</span>
          <img src="assets/img/shop/electronics/thumbs/09.png" width="110" alt="iPad Pro">
        </a>
        <div class="w-100 min-w-0 ps-2 ps-sm-3">
          <h5 class="d-flex animate-underline mb-2">
            <a class="d-block fs-sm fw-medium text-truncate animate-target" href="#!">Tablet Apple iPad Pro M2</a>
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
        <a class="flex-shrink-0" href="#!">
          <img src="assets/img/shop/electronics/thumbs/01.png" width="110" alt="Smart Watch">
        </a>
        <div class="w-100 min-w-0 ps-2 ps-sm-3">
          <h5 class="d-flex animate-underline mb-2">
            <a class="d-block fs-sm fw-medium text-truncate animate-target" href="#!">Smart Watch Series 7, White</a>
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
        <span class="h6 mb-0">LKR2,317.00</span>
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

    <!-- Breadcrumb -->
    <nav class="container pt-3 my-3 my-md-4" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="shop-catalog.php">Shop</a></li>
        <li class="breadcrumb-item active" aria-current="page">Product page</li>
      </ol>
    </nav>


    <!-- Page title -->
    <!-- Page title -->
    <div id="product-general-info" style="scroll-margin-top: 100px;"></div>
    <h1 class="h3 container mb-4" id="product-title">Loading...</h1>


    <!-- Nav links + Reviews -->
    <section class="container pb-2 pb-lg-4">
      <div class="d-flex align-items-center border-bottom">
        <ul class="nav nav-underline flex-nowrap gap-4">
          <li class="nav-item me-sm-2">
            <a class="nav-link" href="#product-general-info">General info</a>
          </li>
          <li class="nav-item me-sm-2">
            <a class="nav-link" href="#product-description">Product details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#reviews">Reviews</a>
          </li>
        </ul>
        <a class="d-none d-md-flex align-items-center gap-2 text-decoration-none ms-auto mb-1" href="#reviews">
          <div class="d-flex gap-1 fs-sm">
            <i class="ci-star-filled text-warning"></i>
            <i class="ci-star-filled text-warning"></i>
            <i class="ci-star-filled text-warning"></i>
            <i class="ci-star-filled text-warning"></i>
            <i class="ci-star text-body-tertiary opacity-75"></i>
          </div>
          <span class="text-body-tertiary fs-xs" id="review-count">Loading...</span>
        </a>
      </div>
    </section>


    <!-- Gallery + Product options -->
    <section class="container pb-5 mb-1 mb-sm-2 mb-md-3 mb-lg-4 mb-xl-5">
      <div class="row">

        <!-- Product gallery -->
        <div class="col-md-6">

          <!-- Preview (Large image) -->
          <div class="swiper" data-swiper='{
              "loop": true,
              "navigation": {
                "prevEl": ".btn-prev",
                "nextEl": ".btn-next"
              },
              "thumbs": {
                "swiper": "#thumbs"
              }
            }'>
            <div class="swiper-wrapper" id="product-gallery-wrapper">
              <!-- Dynamic Slides -->
            </div>

            <!-- Prev button -->
            <div class="position-absolute top-50 start-0 z-2 translate-middle-y ms-sm-2 ms-lg-3">
              <button type="button" class="btn btn-prev btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-start" aria-label="Prev">
                <i class="ci-chevron-left fs-lg animate-target"></i>
              </button>
            </div>

            <!-- Next button -->
            <div class="position-absolute top-50 end-0 z-2 translate-middle-y me-sm-2 me-lg-3">
              <button type="button" class="btn btn-next btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-end" aria-label="Next">
                <i class="ci-chevron-right fs-lg animate-target"></i>
              </button>
            </div>
          </div>

          <!-- Thumbnails -->
          <div class="swiper swiper-load swiper-thumbs pt-2 mt-1" id="thumbs" data-swiper='{
              "loop": true,
              "spaceBetween": 12,
              "slidesPerView": 3,
              "watchSlidesProgress": true,
              "breakpoints": {
                "340": {
                  "slidesPerView": 4
                },
                "500": {
                  "slidesPerView": 5
                },
                "600": {
                  "slidesPerView": 6
                },
                "768": {
                  "slidesPerView": 4
                },
                "992": {
                  "slidesPerView": 5
                },
                "1200": {
                  "slidesPerView": 6
                }
              }
            }'>
            <div class="swiper-wrapper" id="product-thumbnails-wrapper">
              <!-- Dynamic Thumbs -->
            </div>
          </div>
        </div>


        <!-- Product options -->
        <div class="col-md-6 col-xl-5 offset-xl-1 pt-4">
          <div class="ps-md-4 ps-xl-0">
            <div class="position-relative" id="zoomPane">

              <!-- Dynamic Options -->
              <div id="product-options"></div>

              <!-- Price -->
              <div class="d-flex flex-wrap align-items-center mb-3">
                <div class="h4 mb-0 me-3" id="product-price"></div>
                <div class="d-flex mt-md-0 mt-3 align-items-center text-success fs-sm ms-auto">
                  <i class="ci-check-circle fs-base me-2"></i>
                  Available to order
                </div>
              </div>

              <!-- Count + Buttons -->
              <div class="d-flex flex-wrap flex-sm-nowrap flex-md-wrap flex-lg-nowrap gap-3 gap-lg-2 gap-xl-3 mb-4">
                <div class="count-input flex-shrink-0 order-sm-1">
                  <button type="button" class="btn btn-icon btn-lg" data-decrement aria-label="Decrement quantity">
                    <i class="ci-minus"></i>
                  </button>
                  <input type="number" class="form-control form-control-lg" value="1" min="1" max="5" id="quantity-input" readonly>
                  <button type="button" class="btn btn-icon btn-lg" data-increment aria-label="Increment quantity">
                    <i class="ci-plus"></i>
                  </button>
                </div>
                <!-- <button type="button" class="btn btn-icon btn-lg btn-secondary animate-pulse order-sm-3 order-md-2 order-lg-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-sm" data-bs-title="Add to Wishlist" aria-label="Add to Wishlist">
                  <i class="ci-heart fs-lg animate-target"></i>
                </button> -->
                <!-- <button type="button" class="btn btn-icon btn-lg btn-secondary animate-rotate order-sm-4 order-md-3 order-lg-4" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-sm" data-bs-title="Compare" aria-label="Compare">
                  <i class="ci-refresh-cw fs-lg animate-target"></i>
                </button> -->
                <button type="button" class="btn btn-lg btn-primary w-100 animate-slide-end order-sm-2 order-md-4 order-lg-2" id="add-to-cart-btn" disabled>
                  <i class="ci-shopping-cart fs-lg animate-target ms-n1 me-2"></i>
                  Add to cart
                </button>
              </div>

              <!-- Selection Note -->
              <div id="selection-note" class="alert alert-warning d-none mb-3" role="alert">
              
                <span id="selection-note-text"></span>
              </div>

              <!-- Features -->
             
            </div>

            <!-- Shipping options -->
            <div class="d-flex align-items-center pb-2">
              <h3 class="h6 mb-0">Shipping options</h3>
              <a class="btn btn-sm btn-secondary ms-auto" href="https://share.google/CPkh64yczWxSSkLwE">
                <i class="ci-map-pin fs-sm ms-n1 me-1"></i>
                Find local store
              </a>
            </div>
            <table class="table table-borderless fs-sm mb-2">
              <tbody>
               
                <tr>
                  <td class="py-2 ps-0">Pickup from postal offices</td>
                  <td class="py-2">Tomorrow</td>
                  <td class="text-body-emphasis fw-semibold text-end py-2 pe-0">LKR 25.00</td>
                </tr>
                <tr>
                  <td class="py-2 ps-0">Delivery by courier</td>
                  <td class="py-2">2-3 days</td>
                  <td class="text-body-emphasis fw-semibold text-end py-2 pe-0">LKR 35.00 - 350.00</td>
                </tr>
              </tbody>
            </table>

            <!-- Warranty + Payment info accordion -->
           
          </div>
        </div>
      </div>
    </section>


    <!-- Sticky product preview + Add to cart CTA -->
    <!-- <section class="sticky-product-banner sticky-top d-md-none" data-sticky-element>
      <div class="sticky-product-banner-inner pt-5">
        <div class="bg-body border-bottom border-light border-opacity-10 shadow pt-4 pb-2">
          <div class="container d-flex align-items-center">
            <div class="d-flex align-items-center min-w-0 ms-n2 me-3">
              <div class="ratio ratio-1x1 flex-shrink-0" style="width: 50px">
                <img src="assets/img/shop/electronics/thumbs/10.png" alt="iPhone 14">
              </div>
              <div class="w-100 min-w-0 ps-2">
                <h4 class="fs-sm fw-medium text-truncate mb-1">Apple iPhone 14 Plus 128GB Blue</h4>
                <div class="h6 mb-0">$940.00</div>
              </div>
            </div>
            <div class="d-flex gap-2 ms-auto">
              <button type="button" class="btn btn-icon btn-secondary animate-pulse" aria-label="Add to Wishlist">
                <i class="ci-heart fs-base animate-target"></i>
              </button>
              <button type="button" class="btn btn-primary animate-slide-end d-none d-sm-inline-flex">
                <i class="ci-shopping-cart fs-base animate-target ms-n1 me-2"></i>
                Add to cart
              </button>
              <button type="button" class="btn btn-icon btn-primary animate-slide-end d-sm-none" aria-label="Add to Cart">
                <i class="ci-shopping-cart fs-lg animate-target"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section> -->





    

    <!-- Product details and Reviews shared container -->
    <section class="container pb-5 mb-2 mb-md-3 mb-lg-4 mb-xl-5">
      <div class="row">
        <div class="col-md-7">

          <!-- Product details -->
          <div id="product-description" style="scroll-margin-top: 100px;"></div>
          <h2 class="h3 pb-2 pb-md-3">Product details</h2>
          <div id="product-description-text" class="fs-sm mb-4">
            <!-- Dynamic Description will load here -->
            Loading description...
          </div>
          <!-- Reviews Section -->
          <div id="reviews" class="pt-5 mb-4 mt-2 mt-md-3 mt-lg-4" style="scroll-margin-top: 80px">
            <div class="d-flex align-items-center mb-3">
              <h2 class="h3 mb-0">Reviews</h2>
              <button type="button" class="btn btn-secondary ms-auto" data-bs-toggle="modal" data-bs-target="#reviewForm">
                <i class="ci-edit-3 fs-base ms-n1 me-2"></i>
                Leave a review
              </button>
            </div>
            <div id="reviews-list">
              <!-- Dynamic Reviews will load here -->
              <p class="text-body-secondary">Loading reviews...</p>
            </div>
          </div>
        </div>


        <!-- Sticky product preview visible on screens > 991px wide (lg breakpoint) -->
        <!-- <aside class="col-md-5 col-xl-4 offset-xl-1 d-none d-md-block" style="margin-top: -100px">
          <div class="position-sticky top-0 ps-3 ps-lg-4 ps-xl-0" style="padding-top: 100px">
            <div class="border rounded p-3 p-lg-4">
              <div class="d-flex align-items-center mb-3">
                <div class="ratio ratio-1x1 flex-shrink-0" style="width: 110px">
                  <img src="assets/img/shop/electronics/thumbs/10.png" width="110" alt="iPhone 14">
                </div>
                <div class="w-100 min-w-0 ps-2 ps-sm-3">
                  <div class="d-flex align-items-center gap-2 mb-2">
                    <div class="d-flex gap-1 fs-xs">
                      <i class="ci-star-filled text-warning"></i>
                      <i class="ci-star-filled text-warning"></i>
                      <i class="ci-star-filled text-warning"></i>
                      <i class="ci-star-filled text-warning"></i>
                      <i class="ci-star text-body-tertiary opacity-75"></i>
                    </div>
                    <span class="text-body-tertiary fs-xs">68</span>
                  </div>
                  <h4 class="fs-sm fw-medium mb-2">Apple iPhone 14 Plus 128GB Blue</h4>
                  <div class="h5 mb-0">$940.00</div>
                </div>
              </div>
              <div class="d-flex gap-2 gap-lg-3">
                <button type="button" class="btn btn-primary w-100 animate-slide-end">
                  <i class="ci-shopping-cart fs-base animate-target ms-n1 me-2"></i>
                  Add to cart
                </button>
                <button type="button" class="btn btn-icon btn-secondary animate-pulse" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-sm" data-bs-title="Add to Wishlist" aria-label="Add to Wishlist">
                  <i class="ci-heart fs-base animate-target"></i>
                </button>
                <button type="button" class="btn btn-icon btn-secondary animate-rotate" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-sm" data-bs-title="Compare" aria-label="Compare">
                  <i class="ci-refresh-cw fs-base animate-target"></i>
                </button>
              </div>
            </div>
          </div>
        </aside> -->
      </div>
    </section>
    <!-- Trending products (Carousel) -->
    <?php include './components/TrendingProduct.php'; ?>


    <!-- Viewed products (Carousel) -->
     <div class=" pb-5 mb-2 mb-md-3 mb-lg-4 mb-xl-5">
       <?php
    include './components/NewArrival.php'
    ?>
     </div>
   


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
                  <a class="nav-link fs-sm hover-effect-underline stretched-link p-0" href="#!">5 New Cool Gadgets You Must See on GIGANTOO - Cheap Budget</a>
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
                  <a class="nav-link fs-sm hover-effect-underline stretched-link p-0" href="#!">Top 5 New Amazing Gadgets on Cartzilla You Must See</a>
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
 <?php include 'components/Footer.php'; ?>


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
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/drift-zoom/dist/Drift.min.js"></script>
  <script src="assets/vendor/simplebar/dist/simplebar.min.js"></script>
  <script src="assets/vendor/choices.js/public/assets/scripts/choices.min.js"></script>

  <!-- Bootstrap + Theme scripts -->
  <script src="assets/js/theme.min.js"></script>
  <!-- Custom Script -->
  <script src="src/js/custom/main.js"></script>
  <script src="src/js/custom/single-product.js"></script>
</body>

</html>