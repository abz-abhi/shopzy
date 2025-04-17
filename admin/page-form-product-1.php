<?php
include("session.php");
include('common/header.php') ?>
<section class="content-main">
  <div class="row">
    <div class="col-9">
      <div class="content-header">
        <h2 class="content-title">Add New Product</h2>
      </div>
    </div>
    <div class="col-lg-6">
      <!-- Basic -->
      <div class="card mb-4">
        <div class="card-header">
          <h4>Basic</h4>
        </div>
        <div class="card-body">
          <form method="POST">
            <div class="mb-4">
              <label class="form-label" for="product_name">Product title</label>
              <input
                class="form-control"
                id="product_name"
                type="text"
                placeholder="Type here" />
            </div>
            <div class="mb-4">
              <label class="form-label">Full description</label>
              <textarea
                class="form-control"
                placeholder="Type here"
                rows="4"></textarea>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="mb-4">
                  <label class="form-label">Regular price</label>
                  <div class="row gx-2"></div>
                  <input
                    class="form-control"
                    placeholder="$"
                    type="text" />
                </div>
              </div>
              <div class="col-lg-4">
                <div class="mb-4">
                  <label class="form-label">Promotional price</label>
                  <input
                    class="form-control"
                    placeholder="$"
                    type="text" />
                </div>
              </div>
              <div class="col-lg-4">
                <label class="form-label">Currency</label>
                <select class="form-select">
                  <option>USD</option>
                  <option>EUR</option>
                  <option>RUBL</option>
                </select>
              </div>
            </div>
        </div>
      </div>
      <!-- Shipping -->
      <div class="card mb-4">
        <div class="card-header">
          <h4>Shipping</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="mb-4">
                <label class="form-label" for="product_name">Width</label>
                <input
                  class="form-control"
                  id="product_name"
                  type="text"
                  placeholder="inch" />
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-4">
                <label class="form-label" for="product_name">Height</label>
                <input
                  class="form-control"
                  id="product_name"
                  type="text"
                  placeholder="inch" />
              </div>
            </div>
            <div class="mb-4">
              <label class="form-label" for="product_name">Weight</label>
              <input
                class="form-control"
                id="product_name"
                type="text"
                placeholder="gam" />
            </div>
            <div class="mb-4">
              <label class="form-label" for="product_name">Shipping fees</label>
              <input
                class="form-control"
                id="product_name"
                type="text"
                placeholder="$" />
            </div>
          </div>
          <div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card mb-4">
        <div class="card-header">
          <h4>Media</h4>
        </div>
        <div class="card-body">
          <div class="input-upload">
            <img id="previewImage" src="assets/imgs/theme/upload.svg" alt="" />
            <input class="form-control" type="file" id="imageInput" accept="image/*" />
          </div>
        </div>
      </div>
      <div class="card mb-4">
        <div class="card-header">
          <h4>Organization</h4>
        </div>
        <div class="card-body">
          <div class="row gx-2">
            <div class="col-sm-6 mb-3">
              <label class="form-label">Category</label>
              <select class="form-select">
                <option>Automobiles</option>
                <option>Home items</option>
                <option>Electronics</option>
                <option>Smartphones</option>
                <option>Sport items</option>
                <option>Baby and Tous</option>
              </select>
            </div>
            <div class="col-sm-6 mb-3">
              <label class="form-label">Sub-category</label>
              <select class="form-select">
                <option>Nissan</option>
                <option>Honda</option>
                <option>Mercedes</option>
                <option>Chevrolet</option>
              </select>
            </div>
            <div class="mb-4">
              <label class="form-label" for="product_name">Tags</label>
              <input class="form-control" type="text" />
            </div>
          </div>
        </div>
      </div>
      <button
        class="btn btn-light rounded font-sm mr-5 text-body hover-up">
        Save to draft
      </button>
      <button class="btn btn-md rounded font-sm hover-up">
        Add product
      </button>
      </form>
    </div>
  </div>
</section>

<footer class="main-footer font-xs">
  </div>
</footer>
</main>
<script>
  const imageInput = document.getElementById('imageInput');
  const previewImage = document.getElementById('previewImage');

  imageInput.addEventListener('change', function() {
    const file = this.files[0];

    if (file) {
      const reader = new FileReader();

      reader.onload = function(event) {
        previewImage.setAttribute('src', event.target.result);
      }

      reader.readAsDataURL(file);
    }
  });
</script>

<script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
<script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
<script src="assets/js/vendors/select2.min.js"></script>
<script src="assets/js/vendors/perfect-scrollbar.js"></script>
<script src="assets/js/vendors/jquery.fullscreen.min.js"></script>
<script src="assets/js/vendors/chart.js"></script>
<script src="assets/js/main.js?v=1.0.0"></script>
<script src="assets/js/custom-chart.js" type="text/javascript"></script>
</body>

</html>