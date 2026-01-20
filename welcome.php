<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-pwa="true">
    <head>
        <meta charset="utf-8">

        <!-- Viewport -->
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">

        <!-- SEO Meta Tags -->
        <title>Welcome to Atsmore | Premium Online Shopping in Sri Lanka</title>
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
            
            <!-- Breadcrumb -->
            <nav class="container py-4 my-lg-3" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Welcome</li>
                </ol>
            </nav>

            <!-- Page title -->
            <section class="container pb-3 pb-lg-4">
                <h1 class="h2 mb-0">Elevate Your Shopping Experience with atsmore</h1>
            </section>

            <!-- Page content -->
            <section class="container pb-5 mb-2 mb-md-3 mb-lg-4 mb-xl-5">
                <hr class="mb-4">

                        <p class="fs-base">Welcome to atsmore, the future of online shopping! Designed with a seamless user experience in mind, our app delivers an unparalleled blend of convenience, variety, and affordability right at your fingertips. Say goodbye to the hassle of browsing multiple sites for the best deals. With atsmore, we bring the best to you!</p>

                        <h2 class="h4 pt-3 pt-lg-4">Why Choose atsmore?</h2>
                        
                        <h3 class="h6 pt-2">Effortless Navigation</h3>
                        <p>Our intuitive interface makes it simple for you to find exactly what you're looking for. With easy-to-use search filters and a smart recommendation engine, your perfect product is just a tap away.</p>

                        <h3 class="h6 pt-2">Exclusive Deals and Discounts</h3>
                        <p>As an atsmore user, you gain access to special offers and promotions that can't be found anywhere else. Maximize your savings with our tailored discounts.</p>

                        <h3 class="h6 pt-2">Secure and Speedy Checkouts</h3>
                        <p>Your safety is our priority. Experience quick and secure transactions with our state-of-the-art payment processing system. Shopping has never been safer or more efficient.</p>

                        <h3 class="h6 pt-2">24/7 Customer Support</h3>
                        <p>Our dedicated customer service team is always available to ensure your queries and concerns are addressed promptly. We're here to help, anytime, anywhere.</p>

                        <h2 class="h4 pt-3 pt-lg-4">How We Use Your Information</h2>
                        <p>We use users' personal information to provide secure transactions, personalized recommendations, improve our services, and deliver exceptional customer support tailored to your needs.</p>

                        <h2 class="h4 pt-3 pt-lg-4">Join Our Community</h2>
                        <p>Be part of a growing community of savvy shoppers. Download atsmore today and step into a world where shopping is smarter, faster, and more enjoyable.</p>

                        <div class="d-flex gap-3 flex-wrap pt-2">
                            <a class="btn btn-primary" href="#!">
                                <i class="ci-apple fs-base me-2"></i>
                                Download on the App Store
                            </a>
                            <a class="btn btn-primary" href="#!">
                                <i class="ci-android fs-base me-2"></i>
                                Get it on Google Play
                            </a>
                        </div>

                        <p class="pt-4">Ready to transform your shopping experience? Get atsmore now and discover a new era of eCommerce convenience!</p>

                        <hr class="my-3 my-lg-4">

                        <h2 class="h4 pt-3 pt-lg-4">Contact Us</h2>
                        <p>Have questions or need assistance? We'd love to hear from you!</p>
                        <ul class="list-unstyled pb-1">
                            <li class="nav pt-1">
                                <a class="nav-link align-items-start fs-base p-0" href="mailto:contact@atsmore.com">
                                    <i class="ci-mail fs-xl mt-1 me-2"></i>
                                    contact@atsmore.com
                                </a>
                            </li>
                        </ul>

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
            </section>
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
  <script src="src/js/custom/main.js"></script>

    </body>
</html>