<?php
include("session.php");
include('common/header.php') ?>
<section class="content-main">
  <div class="content-header">
    <div>
      <h2 class="content-title card-title">Dashboard</h2>
      <p>Whole data about your business here</p>
    </div>
    <div>
      <a class="btn btn-primary" href="#"><i class="text-muted material-icons md-post_add"></i>Create
        report</a>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3">
      <div class="card card-body mb-4">
        <article class="icontext">
          <span class="icon icon-sm rounded-circle bg-primary-light"><i class="text-primary material-icons md-monetization_on"></i></span>
          <div class="text">
            <h6 class="mb-1 card-title">Revenue</h6>
            <span>$13,456.5</span><span class="text-sm">Shipping fees are not included</span>
          </div>
        </article>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card card-body mb-4">
        <article class="icontext">
          <span class="icon icon-sm rounded-circle bg-success-light"><i class="text-success material-icons md-local_shipping"></i></span>
          <div class="text">
            <h6 class="mb-1 card-title">Orders</h6>
            <span>53.668</span><span class="text-sm">Excluding orders in transit</span>
          </div>
        </article>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card card-body mb-4">
        <article class="icontext">
          <span class="icon icon-sm rounded-circle bg-warning-light"><i class="text-warning material-icons md-qr_code"></i></span>
          <div class="text">
            <h6 class="mb-1 card-title">Products</h6>
            <span>9.856</span><span class="text-sm">In 19 Categories</span>
          </div>
        </article>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card card-body mb-4">
        <article class="icontext">
          <span class="icon icon-sm rounded-circle bg-info-light"><i class="text-info material-icons md-shopping_basket"></i></span>
          <div class="text">
            <h6 class="mb-1 card-title">Monthly Earning</h6>
            <span>$6,982</span><span class="text-sm">Based in your local time.</span>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>
<footer class="main-footer font-xs">
  <div class="row pb-30 pt-15">
    <div class="col-sm-6">
      <script>
        document.write(new Date().getFullYear());
      </script>
      &copy;, Ecom - HTML Ecommerce Template .
    </div>
    <div class="col-sm-6">
      <div class="text-sm-end">All rights reserved</div>
    </div>
  </div>
</footer>
</main>
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