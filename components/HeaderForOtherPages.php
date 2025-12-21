<script defer src="src/js/custom/header-for-other-pages.js"></script>
<!-- Navigation bar (Page header) -->
<header class="navbar navbar-expand-lg navbar-dark bg-dark d-block z-fixed p-0" data-sticky-navbar='{"offset": 500}'>
  <div class="container d-block py-1 py-lg-3" data-bs-theme="dark">
    <div class="navbar-stuck-hide pt-1"></div>
    <div class="row flex-nowrap align-items-center g-0">
      <div class="col col-lg-3 d-flex align-items-center">

        <!-- Mobile offcanvas menu toggler (Hamburger) -->
        <button type="button" class="navbar-toggler me-4 me-lg-0" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar brand (Logo) -->
        <a href="index.php" class="navbar-brand me-0">
          <span class="d-none d-sm-flex flex-shrink-0 text-primary me-2">
           <img src="assets/logo.png" width="117" alt="Cartzilla">
          </span>
        
        </a>
      </div>
      <div class="col col-lg-9 d-flex align-items-center justify-content-end">

        <!-- Search visible on screens > 991px wide (lg breakpoint) -->
        <div class="position-relative flex-fill d-none d-lg-block pe-4 pe-xl-5">
          <i class="ci-search position-absolute top-50 translate-middle-y d-flex fs-lg text-white ms-3"></i>
          <input type="search" class="form-control form-control-lg form-icon-start border-white rounded-pill" placeholder="Search the products" data-search-input>
          <!-- Search Results Dropdown -->
          <div class="dropdown-menu w-100 position-absolute top-100 start-0 z-3 mt-1 p-0 shadow rounded-4 overflow-hidden" data-search-results style="display:none; left: 0; right: 2rem;"></div>
        </div>

        <!-- Sale link visible on screens > 1200px wide (xl breakpoint) -->
         <a class="d-none d-xl-flex align-items-center text-decoration-none animate-shake navbar-stuck-hide me-3 me-xl-4 me-xxl-5" href="shop-catalog-electronics.php?has_web_discount=1">
          <div class="btn btn-icon btn-lg fs-lg text-primary bg-body-secondary bg-opacity-75 pe-none rounded-circle">
            <i class="ci-percent animate-target"></i>
          </div>
          <div class="ps-2 text-nowrap">
            <div class="fs-xs text-body">Discount Items</div>
            <div class="fw-medium text-white">Super Sale</div>
          </div>
</a>
        <!-- Button group -->
        <div class="d-flex align-items-center">

          <!-- Navbar stuck nav toggler -->
          <button type="button" class="navbar-toggler d-none navbar-stuck-show me-3" data-bs-toggle="collapse" data-bs-target="#stuckNav" aria-controls="stuckNav" aria-expanded="false" aria-label="Toggle navigation in navbar stuck state">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Theme switcher (light/dark/auto) -->
          <div class="dropdown">
            <button type="button" class="theme-switcher btn btn-icon btn-lg btn-outline-secondary fs-lg border-0 rounded-circle animate-scale" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Toggle theme (light)">
              <span class="theme-icon-active d-flex animate-target">
                <i class="ci-sun"></i>
              </span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end me-2" style="--cz-dropdown-min-width: 9rem">
              <li>
                <button type="button" class="dropdown-item active" data-bs-theme-value="light" aria-pressed="true">
                  <span class="theme-icon d-flex fs-base me-2">
                    <i class="ci-sun"></i>
                  </span>
                  <span class="theme-label">Light</span>
                  <i class="item-active-indicator ci-check ms-auto"></i>
                </button>
              </li>
              <li>
                <button type="button" class="dropdown-item" data-bs-theme-value="dark" aria-pressed="false">
                  <span class="theme-icon d-flex fs-base me-2">
                    <i class="ci-moon"></i>
                  </span>
                  <span class="theme-label">Dark</span>
                  <i class="item-active-indicator ci-check ms-auto"></i>
                </button>
              </li>
              <li>
                <button type="button" class="dropdown-item" data-bs-theme-value="auto" aria-pressed="false">
                  <span class="theme-icon d-flex fs-base me-2">
                    <i class="ci-auto"></i>
                  </span>
                  <span class="theme-label">Auto</span>
                  <i class="item-active-indicator ci-check ms-auto"></i>
                </button>
              </li>
            </ul>
          </div>

          <!-- Search toggle button visible on screens < 992px wide (lg breakpoint) -->
          <button type="button" class="btn btn-icon btn-lg fs-xl btn-outline-secondary border-0 rounded-circle animate-shake d-lg-none" data-bs-toggle="collapse" data-bs-target="#searchBar" aria-expanded="false" aria-controls="searchBar" aria-label="Toggle search bar">
            <i class="ci-search animate-target"></i>
          </button>

          <!-- Account button visible on screens > 768px wide (md breakpoint) -->
          <!-- <a class="btn btn-icon btn-lg fs-lg btn-outline-secondary border-0 rounded-circle animate-shake d-none d-md-inline-flex" href="account-signin.html">
            <i class="ci-user animate-target"></i>
            <span class="visually-hidden">Account</span>
          </a> -->

          <!-- Wishlist button visible on screens > 768px wide (md breakpoint) -->
          <!-- <a class="btn btn-icon btn-lg fs-lg btn-outline-secondary border-0 rounded-circle animate-pulse d-none d-md-inline-flex" href="account-wishlist.html">
            <i class="ci-heart animate-target"></i>
            <span class="visually-hidden">Wishlist</span>
          </a> -->

          <!-- Cart button -->
          <!-- <button type="button" class="btn btn-icon btn-lg btn-secondary position-relative rounded-circle ms-2" data-bs-toggle="offcanvas" data-bs-target="#shoppingCart" aria-controls="shoppingCart" aria-label="Shopping cart">
            <span class="position-absolute top-0 start-100 mt-n1 ms-n3 badge text-bg-success border border-3 border-dark rounded-pill" style="--cz-badge-padding-y: .25em; --cz-badge-padding-x: .42em">3</span>
            <span class="position-absolute top-0 start-0 d-flex align-items-center justify-content-center w-100 h-100 rounded-circle animate-slide-end fs-lg">
              <i class="ci-shopping-cart animate-target ms-n1"></i>
            </span>
          </button> -->
        </div>
      </div>
    </div>
    <div class="navbar-stuck-hide pb-1"></div>
  </div>

  <!-- Search visible on screens < 992px wide (lg breakpoint). It is hidden inside collapse by default -->
  <div class="collapse position-absolute top-100 z-2 w-100 bg-dark d-lg-none" id="searchBar">
    <div class="container position-relative my-3" data-bs-theme="dark">
      <i class="ci-search position-absolute top-50 translate-middle-y d-flex fs-lg text-white ms-3"></i>
      <input type="search" class="form-control form-icon-start border-white rounded-pill" placeholder="Search the products" data-autofocus="collapse" data-search-input>
      <div class="dropdown-menu w-100 position-absolute top-100 start-0 z-3 mt-1 p-0 shadow rounded-4 overflow-hidden" data-search-results style="display:none;"></div>
    </div>
  </div>

  <!-- Main navigation that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
  <div class="collapse navbar-stuck-hide" id="stuckNav">
    <nav class="offcanvas offcanvas-start" id="navbarNav" tabindex="-1" aria-labelledby="navbarNavLabel">
      <div class="offcanvas-header py-3">
        <h5 class="offcanvas-title" id="navbarNavLabel">Browse Cartzilla</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body py-3 py-lg-0">
        <div class="container px-0 px-lg-3">
          <div class="row">

            <!-- Categories mega menu -->
            <div class="col-lg-3">
              <div class="navbar-nav">
                <div class="dropdown w-100">

                  <!-- Buttton visible on screens > 991px wide (lg breakpoint) -->
                  <div class="cursor-pointer d-none d-lg-block" data-bs-toggle="dropdown" data-bs-trigger="hover" data-bs-theme="dark">
                    <a class="position-absolute top-0 start-0 w-100 h-100" href="categories.php">
                      <span class="visually-hidden">Categories</span>
                    </a>
                    <button type="button" class="btn btn-lg btn-secondary dropdown-toggle w-100 rounded-bottom-0 justify-content-start pe-none">
                      <!-- <i class="ci-grid fs-lg"></i> -->
                      <span class="ms-2 me-auto">Categories</span>
                    </button>
                  </div>

                  <!-- Buttton visible on screens < 992px wide (lg breakpoint) -->
                  <button type="button" class="btn btn-lg btn-secondary dropdown-toggle w-100 justify-content-start d-lg-none mb-2" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <!-- <i class="ci-grid fs-lg"></i> -->
                    <span class="ms-2 me-auto">Categories</span>
                  </button>

                  <!-- Mega menu -->
                  <ul class="dropdown-menu dropdown-menu-static w-100 rounded-top-0 rounded-bottom-4 py-1 p-lg-1" id="mega-menu-container" style="--cz-dropdown-spacer: 0; --cz-dropdown-item-padding-y: .625rem; --cz-dropdown-item-spacer: 0">
                  </ul>
                </div>
              </div>
            </div>

            <!-- Navbar nav -->
            <div class="col-lg-9 d-lg-flex pt-3 pt-lg-0 ps-lg-0 align-items-center">
              <ul class="navbar-nav position-relative mx-auto">
                <li class="nav-item me-lg-n1 me-xl-0">
                  <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item me-lg-n1 me-xl-0">
                  <a class="nav-link" href="shop-catalog-electronics.php">Shop</a>
                </li>
                <li class="nav-item me-lg-n1 me-xl-0">
                  <a class="nav-link" href="about-us.php">About Us</a>
                </li>
                <li class="nav-item me-lg-n1 me-xl-0">
                  <a class="nav-link" href="contact-us.php">Contact Us</a>
                </li>
               
              </ul>
              <hr class="d-lg-none my-3">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown me-lg-n2 me-xl-n1">
                  <a class="nav-link dropdown-toggle fs-sm px-3" href="#!" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">Eng</a>
                  <ul class="dropdown-menu fs-sm" style="--cz-dropdown-min-width: 7.5rem; --cz-dropdown-spacer: .25rem">
                    <li><a class="dropdown-item" href="#!">Français</a></li>
                    <li><a class="dropdown-item" href="#!">Deutsch</a></li>
                    <li><a class="dropdown-item" href="#!">Italiano</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown me-lg-n1">
                  <a class="nav-link dropdown-toggle fs-sm px-3" href="#!" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">LKR</a>
                  <!-- <ul class="dropdown-menu dropdown-menu-end fs-sm" style="--cz-dropdown-min-width: 7rem; --cz-dropdown-spacer: .25rem">
                    <li><a class="dropdown-item" href="#!">€ EUR</a></li>
                    <li><a class="dropdown-item" href="#!">£ UKP</a></li>
                    <li><a class="dropdown-item" href="#!">¥ JPY</a></li>
                  </ul> -->
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="offcanvas-header border-top px-0 py-3 mt-3 d-md-none">
        <div class="nav nav-justified w-100">
          <!-- <a class="nav-link border-end" href="account-signin.html">
            <i class="ci-user fs-lg opacity-60 me-2"></i>
            Account
          </a>
          <a class="nav-link" href="account-wishlist.html">
            <i class="ci-heart fs-lg opacity-60 me-2"></i>
            Wishlist
          </a> -->
        </div>
      </div>
    </nav>
  </div>
</header>
