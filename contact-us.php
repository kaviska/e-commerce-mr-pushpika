<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-pwa="true">
  <head>
    <meta charset="utf-8">

    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">

    <!-- SEO Meta Tags -->
    <title>Contact Us | Atsmore  Store</title>
    <meta name="description" content="Get in touch with Cartzilla. Visit our store, call us, or send us an email.">
    <meta name="keywords" content="contact, customer service, support, store location">
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

    <!-- Custom script -->
    <script defer src="src/js/custom/main.js"></script>
  </head>

  <!-- Body -->
  <body>

    <?php include 'components/HeaderForOtherPages.php'; ?>

    <!-- Page content -->
    <main class="content-wrapper">
      
      <!-- Breadcrumb -->
      <nav class="container py-4 my-lg-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item">
            <a href="index.php"><i class="ci-home fs-lg opacity-50 me-1"></i>Home</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
        </ol>
      </nav>

      <!-- Page title -->
      <section class="container pb-3 pb-lg-4">
        <h1 class="h2 mb-0">Contact Us</h1>
      </section>

      <!-- Contact info cards -->
      <section class="container pb-5 mb-2 mb-md-3 mb-lg-4 mb-xl-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4 pb-2 pb-sm-3 pb-md-4">
          
          <!-- Store address -->
          <div class="col">
            <div class="card h-100 border-0 rounded-4 shadow-sm">
              <div class="card-body">
                <div class="d-flex align-items-center pb-1 mb-2">
                  <div class="btn btn-icon btn-lg btn-outline-primary pe-none rounded-circle me-3">
                    <i class="ci-map-pin fs-xl"></i>
                  </div>
                  <h3 class="h6 mb-0">Main Store Address</h3>
                </div>
                <p class="fs-sm mb-0">Gigantoo (PVT) LTD, No 40, Upstairs, SuperMarket, Anguruwatota Road, Horana, 12400, Sri Lanka.</p>
              </div>
            </div>
          </div>

          <!-- Working hours -->
          <div class="col">
            <div class="card h-100 border-0 rounded-4 shadow-sm">
              <div class="card-body">
                <div class="d-flex align-items-center pb-1 mb-2">
                  <div class="btn btn-icon btn-lg btn-outline-primary pe-none rounded-circle me-3">
                    <i class="ci-clock fs-xl"></i>
                  </div>
                  <h3 class="h6 mb-0">Working Hours</h3>
                </div>
                <ul class="list-unstyled fs-sm mb-0">
                  <li class="d-flex justify-content-between mb-1">
                    <span class="text-body-secondary">Mon - Fri:</span>
                    <span class="text-dark-emphasis fw-medium">9AM - 7PM</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <span class="text-body-secondary">Sun:</span>
                    <span class="text-dark-emphasis fw-medium">11AM - 5PM</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Phone numbers -->
          <div class="col">
            <div class="card h-100 border-0 rounded-4 shadow-sm">
              <div class="card-body">
                <div class="d-flex align-items-center pb-1 mb-2">
                  <div class="btn btn-icon btn-lg btn-outline-primary pe-none rounded-circle me-3">
                    <i class="ci-phone fs-xl"></i>
                  </div>
                  <h3 class="h6 mb-0">Phone Numbers</h3>
                </div>
                <ul class="list-unstyled fs-sm mb-0">
                  <li class="mb-2">
                    <span class="text-body-secondary d-block mb-1">For customers:</span>
                    <a class="nav-link animate-underline p-0" href="tel:+94770744863">
                      <span class="animate-target">+94 770 744 863</span>
                    </a>
                  </li>
                  <li>
                    <span class="text-body-secondary d-block mb-1">Tech support:</span>
                    <a class="nav-link animate-underline p-0" href="tel:+94770744863">
                      <span class="animate-target">+94 770 744 863</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Email addresses -->
          <div class="col">
            <div class="card h-100 border-0 rounded-4 shadow-sm">
              <div class="card-body">
                <div class="d-flex align-items-center pb-1 mb-2">
                  <div class="btn btn-icon btn-lg btn-outline-primary pe-none rounded-circle me-3">
                    <i class="ci-mail fs-xl"></i>
                  </div>
                  <h3 class="h6 mb-0">Email Addresses</h3>
                </div>
                <ul class="list-unstyled fs-sm mb-0">
                  <li class="mb-2">
                    <span class="text-body-secondary d-block mb-1">For customers:</span>
                    <a class="nav-link animate-underline p-0" href="mailto:contact@atsmore.com">
                      <span class="animate-target">contact@atsmore.com</span>
                    </a>
                  </li>
                  <li>
                    <span class="text-body-secondary d-block mb-1">Tech support:</span>
                    <a class="nav-link animate-underline p-0" href="mailto:contact@atsmore.com">
                      <span class="animate-target">contact@atsmore.com</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

        </div>
      </section>

      <!-- Contact form -->
      <section class="container pb-5 mb-2 mb-md-3 mb-lg-4 mb-xl-5">
        <div class="row">
          <div class="col-lg-8 col-xl-7 mx-auto">
            <div class="card border-0 rounded-4 shadow-sm p-sm-2 p-md-3 p-lg-4">
              <div class="card-body">
                <h2 class="h3 pb-2 pb-md-3">Send Us a Message</h2>
                <form id="contactForm" class="needs-validation" novalidate>
                  <div class="row g-4">
                    <div class="col-sm-6">
                      <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control form-control-lg" id="name" required>
                      <div class="invalid-feedback">Please enter your name</div>
                    </div>
                    <div class="col-sm-6">
                      <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                      <input type="email" class="form-control form-control-lg" id="email" required>
                      <div class="invalid-feedback">Please enter a valid email</div>
                    </div>
                    <div class="col-sm-6">
                      <label for="phone" class="form-label">Phone Number</label>
                      <input type="tel" class="form-control form-control-lg" id="phone">
                    </div>
                    <div class="col-sm-6">
                      <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                      <input type="text" class="form-control form-control-lg" id="subject" required>
                      <div class="invalid-feedback">Please enter a subject</div>
                    </div>
                    <div class="col-12">
                      <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                      <textarea class="form-control form-control-lg" id="message" rows="5" required></textarea>
                      <div class="invalid-feedback">Please enter your message</div>
                    </div>
                    <div class="col-12 pt-2">
                      <button type="submit" class="btn btn-lg btn-primary w-100 w-sm-auto">
                        <i class="ci-send fs-base ms-n1 me-2"></i>
                        Send Message
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Google Map -->
      <section class="container pb-5 mb-2 mb-md-3 mb-lg-4 mb-xl-5">
        <div class="rounded-4 overflow-hidden">
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.7654!2d80.0621!3d6.7167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwNDMnMDAuMSJOIDgwwrAwMycxOS42IkU!5e0!3m2!1sen!2slk!4v1234567890123" 
            width="100%" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
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

    <!-- Vendor scripts -->
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Main theme script -->
    <script src="assets/js/theme.min.js"></script>

    <!-- Form validation -->
    <script>
      // Form validation
      (function() {
        'use strict';
        const form = document.getElementById('contactForm');
        
        form.addEventListener('submit', function(event) {
          event.preventDefault();
          event.stopPropagation();

          if (form.checkValidity()) {
            // Here you can add AJAX submission logic
            alert('Thank you for your message! We will get back to you soon.');
            form.reset();
            form.classList.remove('was-validated');
          } else {
            form.classList.add('was-validated');
          }
        }, false);
      })();
    </script>

  </body>
</html>