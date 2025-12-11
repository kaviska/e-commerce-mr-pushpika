 <section class="container pb-5 mb-sm-2 mb-md-3 mb-lg-4 mb-xl-5">
     <div class="row">

         <!-- Filter sidebar that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
         <aside class="col-lg-3">
             <div class="offcanvas-lg offcanvas-start" id="filterSidebar">
                 <div class="offcanvas-header py-3">
                     <h5 class="offcanvas-title">Filter and sort</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#filterSidebar" aria-label="Close"></button>
                 </div>
                 <div class="offcanvas-body flex-column pt-2 py-lg-0">

                     <!-- Status -->
                     <!-- Status -->
                     <div class="w-100 border rounded p-3 p-xl-4 mb-3 mb-xl-4">
                         <h4 class="h6">Status</h4>
                         <div class="form-check">
                             <input type="checkbox" class="form-check-input" id="filter-in-stock">
                             <label for="filter-in-stock" class="form-check-label text-body-emphasis">In Stock</label>
                         </div>
                     </div>

                     <!-- Categories -->
                     <!-- Categories -->
                     <div class="w-100 border rounded p-3 p-xl-4 mb-3 mb-xl-4">
                         <h4 class="h6 mb-2">Categories</h4>
                         <ul class="list-unstyled d-block m-0" id="filter-categories">
                             <!-- Categories will be loaded here -->
                         </ul>
                     </div>

                     <!-- Price range -->
                     <div class="w-100 border rounded p-3 p-xl-4 mb-3 mb-xl-4">
                         <h4 class="h6 mb-2" id="slider-label">Price</h4>
                         <div class="range-slider" data-range-slider='{"startMin": 340, "startMax": 1250, "min": 0, "max": 1600, "step": 1, "tooltipPrefix": "$"}' aria-labelledby="slider-label">
                             <div class="range-slider-ui"></div>
                             <div class="d-flex align-items-center">
                                 <div class="position-relative w-50">
                                     <i class="ci-dollar-sign position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                     <input type="number" class="form-control form-icon-start" min="0" data-range-slider-min>
                                 </div>
                                 <i class="ci-minus text-body-emphasis mx-2"></i>
                                 <div class="position-relative w-50">
                                     <i class="ci-dollar-sign position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                     <input type="number" class="form-control form-icon-start" min="0" data-range-slider-max>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <!-- Brand (checkboxes) -->
                     <!-- Brand (checkboxes) -->
                     <div class="w-100 border rounded p-3 p-xl-4 mb-3 mb-xl-4">
                         <h4 class="h6">Brand</h4>
                         <div class="d-flex flex-column gap-1" id="filter-brands">
                             <!-- Brands will be loaded here -->
                         </div>
                     </div>

                     <!-- SSD size (checkboxes) -->
                     <!-- SSD Size removed -->

                     <!-- Color -->
                     <!-- Color removed -->
                 </div>
             </div>
         </aside>


         <!-- Product grid -->
         <div class="col-lg-9">
             <div class="row row-cols-2 row-cols-md-3 g-4 pb-3 mb-3" id="product-grid">
                 <!-- Products will be loaded here via JS -->
             </div>
         </div>
     </div>
 </section>