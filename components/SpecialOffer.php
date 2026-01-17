<script defer src='../src/js/custom/special-offer.js'></script>
<section class="container pt-5 mt-2 mt-sm-3 mt-lg-4">

    <!-- Heading + Countdown -->
    <div class="d-flex align-items-start align-items-md-center justify-content-between border-bottom pb-3 pb-md-4">
        <div class="d-md-flex align-items-center">
            <h2 class="h3 pe-3 me-3 mb-md-0">Special offers for you</h2>

            <!-- Replace "demoDate" inside data-countdown-date attribute with the real date, ex: "10/15/2025 12:00:00" -->
            <!-- Timer set to 2 days from now -->
            <!-- <div class="d-flex align-items-center" data-countdown-date="<?php echo date('m/d/Y H:i:s', strtotime('+2 days')); ?>">
                <div class="btn btn-primary pe-none px-2">
                    <span data-days></span>
                    <span>d</span>
                </div>
                <div class="animate-blinking text-body-tertiary fs-lg fw-medium mx-2">:</div>
                <div class="btn btn-primary pe-none px-2">
                    <span data-hours></span>
                    <span>h</span>
                </div>
                <div class="animate-blinking text-body-tertiary fs-lg fw-medium mx-2">:</div>
                <div class="btn btn-primary pe-none px-2">
                    <span data-minutes></span>
                    <span>m</span>
                </div>
            </div> -->
        </div>
        <div class="nav ms-3">
            <a class="nav-link animate-underline px-0 py-2" href="shop-catalog.php">
                <span class="animate-target text-nowrap">View all</span>
                <i class="ci-chevron-right fs-base ms-1"></i>
            </a>
        </div>
    </div>

    <!-- Product carousel -->
    <div class="position-relative mx-md-1">

        <!-- External slider prev/next buttons visible on screens > 500px wide (sm breakpoint) -->
        <button type="button" class="offers-prev btn btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-start position-absolute top-50 start-0 z-2 translate-middle-y ms-n1 d-none d-sm-inline-flex" aria-label="Prev">
            <i class="ci-chevron-left fs-lg animate-target"></i>
        </button>
        <button type="button" class="offers-next btn btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-end position-absolute top-50 end-0 z-2 translate-middle-y me-n1 d-none d-sm-inline-flex" aria-label="Next">
            <i class="ci-chevron-right fs-lg animate-target"></i>
        </button>

        <!-- Slider -->
        <div class="swiper py-4 px-sm-3" data-swiper='{
            "slidesPerView": 2,
            "spaceBetween": 24,
            "loop": true,
            "navigation": {
              "prevEl": ".offers-prev",
              "nextEl": ".offers-next"
            },
            "breakpoints": {
              "768": {
                "slidesPerView": 3
              },
              "992": {
                "slidesPerView": 4
              }
            }
          }'>
            <div class="swiper-wrapper" id="special-offer-wrapper">
                <!-- Dynamic Content will be loaded here -->
            </div>
        </div>

        <!-- External slider prev/next buttons visible on screens < 500px wide (sm breakpoint) -->
        <div class="d-flex justify-content-center gap-2 mt-n2 mb-3 pb-1 d-sm-none">
            <button type="button" class="offers-prev btn btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-start me-1" aria-label="Prev">
                <i class="ci-chevron-left fs-lg animate-target"></i>
            </button>
            <button type="button" class="offers-next btn btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-end" aria-label="Next">
                <i class="ci-chevron-right fs-lg animate-target"></i>
            </button>
        </div>
    </div>
</section>