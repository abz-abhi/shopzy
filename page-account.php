<?php
include('session.php');
include('common/header.php');

?>
<main class="main">
  <section class="section-box shop-template mt-30">
    <div class="container box-account-template">
      <h3>Hello Steven</h3>
      <p class="font-md color-gray-500">From your account dashboard. you can easily check & view your recent orders,
        <br class="d-none d-lg-block">manage your shipping and billing addresses and edit your password and account details.
      </p>
      <div class="box-tabs mb-100">
        <div class="border-bottom mt-20 mb-40"></div>
        <div>
          <div class="row">
            <div class="col-lg-6 mb-20">
              <form action="#" method="get">
                <div class="row">
                  <div class="col-lg-12 mb-20">
                    <h5 class="font-md-bold color-brand-3 text-sm-start text-center">Contact information</h5>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <input class="form-control font-sm" type="text" placeholder="Fullname *">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <input class="form-control font-sm" type="text" placeholder="Username *">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <input class="form-control font-sm" type="text" placeholder="Phone Number *">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <input class="form-control font-sm" type="text" placeholder="Email *">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="font-sm color-brand-3" for="checkboxOffers">
                        <input class="checkboxOffer" id="checkboxOffers" type="checkbox">
                        Keep me up to date on news and exclusive offers
                      </label>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <h5 class="font-md-bold color-brand-3 mt-15 mb-20">Shipping address</h5>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input class="form-control font-sm" type="text" placeholder="First name*">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input class="form-control font-sm" type="text" placeholder="Last name*">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <input class="form-control font-sm" type="text" placeholder="Address 1*">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <input class="form-control font-sm" type="text" placeholder="Address 2*">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <select class="form-control font-sm select-style1 color-gray-700">
                        <option value="">Select an option...</option>
                        <option value="1">Option 1</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input class="form-control font-sm" type="text" placeholder="City*">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <input class="form-control font-sm" type="text" placeholder="PostCode / ZIP*">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input class="form-control font-sm" type="text" placeholder="Company name">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input class="form-control font-sm" type="text" placeholder="Phone*">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group mb-0">
                      <textarea class="form-control font-sm" placeholder="Additional Information" rows="5"></textarea>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group mt-20">
                      <input class="btn btn-buy w-auto h54 font-md-bold" value="Save change">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-lg-1 mb-20"></div>
            <div class="col-lg-5 mb-20">
              <div class="mt-40">
                <h4 class="mb-10">Steven Job</h4>
                <div class="mb-10">
                  <p class="font-sm color-brand-3 font-medium">Home Address:</p><span class="font-sm color-gray-500 font-medium">205 North Michigan Avenue, Suite 810 Chicago, 60601, USA</span>
                </div>
                <div class="mb-10">
                  <p class="font-sm color-brand-3 font-medium">Delivery address:</p><span class="font-sm color-gray-500 font-medium">205 North Michigan Avenue, Suite 810 Chicago, 60601, USA</span>
                </div>
                <div class="mb-10">
                  <p class="font-sm color-brand-3 font-medium">Phone Number:</p><span class="font-sm color-gray-500 font-medium">(+01) 234 567 89 - (+01) 688 866 99</span>
                </div>
                <div class="mb-10 mt-15"><a class="btn btn-cart w-auto">Set as Default</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php include('common/footer.php') ?>