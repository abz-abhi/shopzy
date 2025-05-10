<?php
include('session.php');
include('common/header.php'); ?>
<main class="main">
  <div class="section-box">
    <div class="breadcrumbs-div">
      <div class="container">
        <ul class="breadcrumb">
          <li><a class="font-xs color-gray-1000" href="index.php">Home</a></li>
          <li><a class="font-xs color-gray-500" href="shop-grid-2.php">Shop</a></li>
          <li><a class="font-xs color-gray-500" href="shop-cart.php">Checkout</a></li>
        </ul>
      </div>
    </div>
  </div>
  <section class="section-box shop-template">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="box-border">
            <div class="box-payment"><a class="btn btn-gpay"><img src="assets/imgs/page/checkout/gpay.svg" alt="Ecom"></a><a class="btn btn-paypal"><img src="assets/imgs/page/checkout/paypal.svg" alt="Ecom"></a><a class="btn btn-amazon"><img src="assets/imgs/page/checkout/amazon.svg" alt="Ecom"></a></div>
            <div class="border-bottom-4 text-center mb-20">
              <div class="text-or font-md color-gray-500">Or</div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-sm-6 mb-20">
                <h5 class="font-md-bold color-brand-3 text-sm-start text-center">Contact information</h5>
              </div>
              <div class="col-lg-6 col-sm-6 mb-20 text-sm-end text-center"><span class="font-sm color-brand-3">Already have an account?</span><a class="font-sm color-brand-1" href="page-login.php"> Login</a></div>
              <div class="col-lg-12">
                <div class="form-group">
                  <input class="form-control font-sm" type="text" placeholder="Email*">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="font-sm color-brand-3" for="checkboxOffers">
                    <input class="checkboxOffer" id="checkboxOffers" type="checkbox">Keep me up to date on news and exclusive offers
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
            </div>
          </div>
          <div class="row mt-20">
            <div class="col-lg-6 col-5 mb-20"><a class="btn font-sm-bold color-brand-1 arrow-back-1" href="shop-cart.php">Return to Cart</a></div>
            <div class="col-lg-6 col-7 mb-20 text-end"><a class="btn btn-buy w-auto arrow-next" href="shop-checkout.php">Place an Order</a></div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="box-border">
            <h5 class="font-md-bold mb-20">Your Order</h5>
            <div class="listCheckout">
              <div class="item-wishlist">
                <div class="wishlist-product">
                  <div class="product-wishlist">
                    <div class="product-image"><a href="single-product.php"><img src="assets/imgs/page/product/img-sub.png" alt="Ecom"></a></div>
                    <div class="product-info"><a href="single-product.php">
                        <h6 class="color-brand-3">Gateway 23.8&quot; All-in-one Desktop, Fully Adjustable Stand</h6>
                      </a>
                      <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                    </div>
                  </div>
                </div>
                <div class="wishlist-status">
                  <h5 class="color-gray-500">x1</h5>
                </div>
                <div class="wishlist-price">
                  <h4 class="color-brand-3 font-lg-bold">$2.51</h4>
                </div>
              </div>
              <div class="item-wishlist">
                <div class="wishlist-product">
                  <div class="product-wishlist">
                    <div class="product-image"><a href="single-product.php"><img src="assets/imgs/page/product/img-sub2.png" alt="Ecom"></a></div>
                    <div class="product-info"><a href="single-product.php">
                        <h6 class="color-brand-3">HP 24 All-in-One PC, Intel Core i3-1115G4, 4GB RAM</h6>
                      </a>
                      <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                    </div>
                  </div>
                </div>
                <div class="wishlist-status">
                  <h5 class="color-gray-500">x1</h5>
                </div>
                <div class="wishlist-price">
                  <h4 class="color-brand-3 font-lg-bold">$1.51</h4>
                </div>
              </div>
              <div class="item-wishlist">
                <div class="wishlist-product">
                  <div class="product-wishlist">
                    <div class="product-image"><a href="single-product.php"><img src="assets/imgs/page/product/img-sub3.png" alt="Ecom"></a></div>
                    <div class="product-info"><a href="single-product.php">
                        <h6 class="color-brand-3">Dell Optiplex 9020 Small Form Business Desktop Tower PC</h6>
                      </a>
                      <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                    </div>
                  </div>
                </div>
                <div class="wishlist-status">
                  <h5 class="color-gray-500">x1</h5>
                </div>
                <div class="wishlist-price">
                  <h4 class="color-brand-3 font-lg-bold">$3.51</h4>
                </div>
              </div>
            </div>
            <div class="form-group d-flex mt-15">
              <input class="form-control mr-15" placeholder="Enter Your Coupon">
              <button class="btn btn-buy w-auto">Apply</button>
            </div>
            <div class="form-group mb-0">
              <div class="row mb-10">
                <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Subtotal</span></div>
                <div class="col-lg-6 col-6 text-end"><span class="font-lg-bold color-brand-3">$6.51</span></div>
              </div>
              <div class="border-bottom mb-10 pb-5">
                <div class="row">
                  <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Shipping</span></div>
                  <div class="col-lg-6 col-6 text-end"><span class="font-lg-bold color-brand-3">-</span></div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Total</span></div>
                <div class="col-lg-6 col-6 text-end"><span class="font-lg-bold color-brand-3">$6.51</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-box mt-90 mb-50">
    <div class="container">
      <ul class="list-col-5">
        <li>
          <div class="item-list">
            <div class="icon-left"><img src="assets/imgs/template/delivery.svg" alt="Ecom"></div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Free Delivery</h5>
              <p class="font-sm color-gray-500">From all orders over $10</p>
            </div>
          </div>
        </li>
        <li>
          <div class="item-list">
            <div class="icon-left"><img src="assets/imgs/template/support.svg" alt="Ecom"></div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Support 24/7</h5>
              <p class="font-sm color-gray-500">Shop with an expert</p>
            </div>
          </div>
        </li>
        <li>
          <div class="item-list">
            <div class="icon-left"><img src="assets/imgs/template/voucher.svg" alt="Ecom"></div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Gift voucher</h5>
              <p class="font-sm color-gray-500">Refer a friend</p>
            </div>
          </div>
        </li>
        <li>
          <div class="item-list">
            <div class="icon-left"><img src="assets/imgs/template/return.svg" alt="Ecom"></div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Return &amp; Refund</h5>
              <p class="font-sm color-gray-500">Free return over $200</p>
            </div>
          </div>
        </li>
        <li>
          <div class="item-list">
            <div class="icon-left"><img src="assets/imgs/template/secure.svg" alt="Ecom"></div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Secure payment</h5>
              <p class="font-sm color-gray-500">100% Protected</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </section>
</main>
<?php include('common/footer.php'); ?>