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
          <div style="width: 190px">
            <select class="form-select border-0 rounded-0 px-1" data-select='{
                  "removeItemButton": false,
                  "classNames": {
                    "containerInner": ["form-select", "border-0", "rounded-0", "px-1"]
                  }
                }'>
              <option value="Relevance">Relevance</option>
              <option value="Popularity">Popularity</option>
              <option value="Price: Low to High">Price: Low to High</option>
              <option value="Price: High to Low">Price: High to Low</option>
              <option value="Newest Arrivals">Newest Arrivals</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <hr class="d-lg-none my-3">
  </section>