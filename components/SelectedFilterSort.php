  <section class="container mb-4">
    <div class="row">
      <div class="col-lg-9">
        <div class="d-md-flex align-items-start">
          <div class="h6 fs-sm fw-normal text-nowrap translate-middle-y mt-3 mb-0 me-4">Found <span class="fw-semibold" id="product-count">0</span> items</div>
          <div class="d-flex flex-wrap gap-2" id="selected-filters-container">
            <!-- Selected filters will be loaded here -->
            <button type="button" class="btn btn-sm btn-secondary bg-transparent border-0 text-decoration-underline px-0 ms-2 d-none" id="clear-all-filters">
              Clear all
            </button>
          </div>
        </div>
      </div>
      <div class="col-lg-3 mt-3 mt-lg-0">
        <div class="d-flex align-items-center justify-content-lg-end text-nowrap">
          <label class="form-label fw-semibold mb-0 me-2">Sort by:</label>
          <div style="width: 250px; position: relative; z-index: 1035;">
            <select class="form-select border-0 rounded-0 px-1" id="sort-select" data-select='{
                  "removeItemButton": false,
                  "classNames": {
                    "containerInner": ["form-select", "border-0", "rounded-0", "px-1"]
                  }
                }'>
              <option value="name_a_z">Name: A to Z</option>
              <option value="name_z_a" selected>Name: Z to A</option>
              <option value="web_price_low_high">Price: Low to High</option>
              <option value="web_price_high_low">Price: High to Low</option>
              <option value="web_discount_high_low">Discount: High to Low</option>
              <option value="web_discount_low_high">Discount: Low to High</option>
              <option value="added_date_new_old">Newest First</option>
              <option value="added_date_old_new">Oldest First</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <hr class="d-lg-none my-3">
  </section>