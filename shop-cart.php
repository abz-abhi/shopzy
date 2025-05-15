<?php
include('session.php');
include('common/header.php') ?>
<main class="main">
  <div class="section-box">
    <div class="breadcrumbs-div">
      <div class="container">
        <ul class="breadcrumb">
          <li><a class="font-xs color-gray-1000" href="index.php">Home</a></li>
          <li><a class="font-xs color-gray-500" href="shop-grid-2.php">Shop</a></li>
          <li><a class="font-xs color-gray-500" href="shop-cart.php">Cart</a></li>
        </ul>
      </div>
    </div>
  </div>
  <section class="section-box shop-template">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="box-carts" id="cartList">

            <div class="head-wishlist">
              <div class="item-wishlist">
                <div class="wishlist-product"><span class="font-md-bold color-brand-3">Product</span></div>
                <div class="wishlist-price"><span class="font-md-bold color-brand-3">Unit Price</span></div>
                <div class="wishlist-status"><span class="font-md-bold color-brand-3">Quantity</span></div>
                <div class="wishlist-action"><span class="font-md-bold color-brand-3">Subtotal</span></div>
                <div class="wishlist-remove"><span class="font-md-bold color-brand-3">Remove</span></div>
              </div>
            </div>

            <?php
            if (isset($_SESSION['user_id'])) {


              $select = mysqli_query($con, "SELECT * FROM `cart` WHERE `user_id` ='" . $_SESSION['user_id'] . "' ");
              while ($row_cart = mysqli_fetch_assoc($select)) {

                if ($row_cart > 0) {

                  $cart_pro_select = mysqli_query($con, "SELECT * FROM `product` WHERE `id`='" . $row_cart['pro_id'] . "' ");

                  $row_cart_pro = mysqli_fetch_assoc($cart_pro_select);


            ?>

                  <div class="content-wishlist mb-20">
                    <div class="item-wishlist">
                      <div class="wishlist-product">
                        <div class="product-wishlist">
                          <div class="product-image">
                            <a href="single-product.php">
                              <img src="admin/<?php echo $row_cart_pro['image']; ?>" alt="Ecom">
                            </a>
                          </div>
                          <div class="product-info"><a href="single-product.php">
                              <h6 class="color-brand-3"><?php echo  $row_cart_pro['name']; ?></h6>
                            </a>
                            <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                              <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                              <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                              <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                              <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                              <span class="font-xs color-gray-500"> (65)</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="wishlist-price">
                        <h4 class="color-brand-3"><?php echo $row_cart['price'] ?></h4>
                      </div>
                      <div class="wishlist-status">
                        <div class="box-quantity">
                          <div class="input-quantity">
                            <?php $cart_qty = $row_cart['qty']; ?>
                            <input class="font-xl color-brand-3" type="text" value="<?php echo $cart_qty ?>">

                            <button type="button" onclick="minusQty(<?php echo $row_cart['id']; ?>)" class="minus-cart reset-button"></button>
                            <button type="button" onclick="plusQty(<?php echo $row_cart['id']; ?>)" class="plus-cart reset-button"></button>
                          </div>

                        </div>
                      </div>
                      <div class="wishlist-action">
                        <h4 class="color-brand-3"><?php echo  $row_cart['qty'] * $row_cart['price'] ?></h4>
                      </div>
                      <div class="wishlist-remove"><button class="btn btn-delete" onclick="deleteCart_item(<?php echo $row_cart['id'] ?>)"></button></div>
                    </div>
                  </div>
              <?php  }
              }
            } else { ?>

              <?php

              if (isset($_SESSION['cart'])) {
                $session_cart = $_SESSION['cart'];
                foreach ($session_cart as $key => $value) {

                  $result_cartproduct = mysqli_query($con, "SELECT * FROM product WHERE id='" . $value['id'] . "'");
                  $row_cartproduct = mysqli_fetch_assoc($result_cartproduct);

              ?>




                  <div class="content-wishlist mb-20">
                    <div class="item-wishlist">
                      <div class="wishlist-product">
                        <div class="product-wishlist">
                          <div class="product-image">
                            <a href="single-product.php">
                              <img src="admin/<?php echo $row_cartproduct['image']; ?>" alt="Ecom">
                            </a>
                          </div>
                          <div class="product-info"><a href="single-product.php">
                              <h6 class="color-brand-3"><?php echo  $row_cartproduct['name']; ?></h6>
                            </a>
                            <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                              <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                              <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                              <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                              <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                              <span class="font-xs color-gray-500"> (65)</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="wishlist-price">

                        <h4 class="color-brand-3"><?php echo $row_cartproduct['selling_price']
                                                  ?></h4>
                      </div>
                      <div class="wishlist-status">
                        <div class="box-quantity">
                          <div class="input-quantity">
                            <?php // $cart_qty = $row_cartproduct['qty']; 
                            ?>
                            <input class="font-xl color-brand-3" type="text" value="<?php echo $value['qty'] ?>">

                            <button type="button" onclick="minusQty_session(<?php echo $value['id'];
                                                                            ?>)" class="minus-cart reset-button"></button>
                            <button type="button" onclick="plusQty_session(<?php echo $value['id'];
                                                                            ?>)" class="plus-cart reset-button"></button>
                          </div>

                        </div>
                      </div>
                      <div class="wishlist-action">
                        <h4 class="color-brand-3"><?php echo $value['qty'] * $value['price']
                                                  ?></h4>
                      </div>
                      <div class="wishlist-remove">
                        <button class="btn btn-delete" onclick="deleteSession_item(<?php echo $value['id'] ?>)"></button>
                      </div>
                    </div>
                  </div>



            <?php }
              }
            }  ?>
            <div class="row mb-40">
              <div class="col-lg-6 col-md-6 col-sm-6-col-6">
                <a class="btn btn-buy w-auto arrow-back mb-10" href="index.php">Continue shopping</a>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6-col-6 text-md-end"><a class="btn btn-buy w-auto update-cart mb-10" href="shop-cart.php">Update cart</a></div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="summary-cart">

            <?php
            if (isset($_SESSION['user_id'])) {


              $select = mysqli_query($con, "SELECT * FROM `cart` WHERE `user_id` ='" . $_SESSION['user_id'] . "' ");

              $total = 0;

              while ($row_cart = mysqli_fetch_assoc($select)) {

                $total += $row_cart['price'] * $row_cart['qty'];
              }
            ?>
              <div class="border-bottom mb-10">
                <div class="row">
                  <div class="col-6">
                    <span class="font-md-bold color-gray-500">Subtotal</span>
                  </div>
                  <div class="col-6 text-end">
                    <h4 id="subTotal"><?php echo $total ?></h4>
                  </div>
                </div>
              </div>
              <div class="border-bottom mb-10">
                <div class="row">
                  <div class="col-6"><span class="font-md-bold color-gray-500">Shipping</span></div>
                  <div class="col-6 text-end">
                    <h4> Free</h4>
                  </div>
                </div>
              </div>
              <div class="border-bottom mb-10">
                <div class="row">
                  <div class="col-6"><span class="font-md-bold color-gray-500">Estimate for</span></div>
                  <div class="col-6 text-end">
                    <h6>7 Days</h6>
                  </div>
                </div>
              </div>
              <div class="mb-10">
                <div class="row">
                  <div class="col-6"><span class="font-md-bold color-gray-500">Total</span></div>
                  <div class="col-6 text-end">
                    <h4 id="cartTotal"><?php echo $total ?></h4>
                  </div>
                </div>
              </div>
              <?php } else {
              if (isset($_SESSION['cart'])) {

                $session_cart = $_SESSION['cart'];
                $total = 0;

                foreach ($session_cart as $value) {

                  $total += $value['qty'] * $value['price'];
                }
              ?>
                <div class="border-bottom mb-10">
                  <div class="row">
                    <div class="col-6">
                      <span class="font-md-bold color-gray-500">Subtotal</span>
                    </div>
                    <div class="col-6 text-end">
                      <h4 id="subTotal"><?php echo $total ?></h4>
                    </div>
                  </div>
                </div>
                <div class="border-bottom mb-10">
                  <div class="row">
                    <div class="col-6"><span class="font-md-bold color-gray-500">Shipping</span></div>
                    <div class="col-6 text-end">
                      <h4> Free</h4>
                    </div>
                  </div>
                </div>
                <div class="border-bottom mb-10">
                  <div class="row">
                    <div class="col-6"><span class="font-md-bold color-gray-500">Estimate for</span></div>
                    <div class="col-6 text-end">
                      <h6>7 Days</h6>
                    </div>
                  </div>
                </div>
                <div class="mb-10">
                  <div class="row">
                    <div class="col-6"><span class="font-md-bold color-gray-500">Total</span></div>
                    <div class="col-6 text-end">
                      <h4 id="cartTotal"><?php echo $total ?></h4>
                    </div>
                  </div>
                </div>




              <?php
              }
            }
            if (isset($_SESSION['user_id'])) { ?>
              <div class="box-button"><a class="btn btn-buy" href="shop-checkout.php">Proceed To CheckOut</a></div>
            <?php } else { ?>
              <div class="box-button"><a class="btn btn-buy" href="page-login.php">Proceed To CheckOut</a></div>
            <?php } ?>
          </div>
        </div>

      </div>
      <h4 class="color-brand-3">You may also like</h4>

      <div class="list-products-5 mt-20 mb-40">
        <?php
        $select = mysqli_query($con, "SELECT * FROM `product` ORDER BY `id` ASC LIMIT 5");
        while ($rowLike = mysqli_fetch_assoc($select)) { ?>
          <div class="card-grid-style-3">
            <div class="card-grid-inner">
              <div class="tools">
                <a class="btn btn-wishlist btn-tooltip mb-10" href="shop-wishlist.php" aria-label="Add To Wishlist"></a>
                <a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.php" aria-label="Compare"></a>
              </div>
              <div class="image-box">
                <span class="label bg-brand-2">-17%</span>
                <a href="single-product.php">
                  <img src="admin/<?php echo $rowLike['image']; ?>" alt="Ecom">
                </a>
              </div>
              <div class="info-right">
                <a class="font-xs color-gray-500" href="shop-vendor-single.html"><?php echo $rowLike['name']; ?></a><br>
                <a class="color-brand-3 font-sm-bold description-clamp" href="single-product.php"><?php echo $rowLike['discription']; ?></a>
                <div class="rating">
                  <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                  <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                  <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                  <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                  <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                  <span class="font-xs color-gray-500">(65)</span>
                </div>
                <div class="price-info">
                  <strong class="font-lg-bold color-brand-3 price-main"><?php echo $rowLike['selling_price']; ?></strong>
                  <span class="color-gray-500 price-line"><?php echo $rowLike['mrp']; ?></span>
                </div>
                <div class="mt-20 box-btn-cart">
                  <?php if (isset($_SESSION['user_id'])) { ?>

                    <button class="btn btn-cart" onclick="addCartfrom_cart(<?php echo $rowLike['id']; ?>, <?php echo $rowLike['selling_price']; ?>)">Add To Cart</button>
                  <?php } else {
                  ?> 
                    <button class="btn btn-cart" onclick="addCartfrom_session(<?php echo $rowLike['id']; ?>,<?php echo $rowLike['selling_price']; ?>)">Add To Cart</button>
                  <?php
                  } ?>
                </div>
                <ul class="list-features">
                  <li>27-inch (diagonal) Retina 5K display</li>
                  <li>3.1GHz 6-core 10th-generation Intel Core i5</li>
                  <li>AMD Radeon Pro 5300 graphics</li>
                </ul>
              </div>
            </div>
          </div>
        <?php }  ?>
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
  <section class="section-box box-newsletter">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-7 col-sm-12">
          <h3 class="color-white">Subscrible &amp; Get <span class="color-warning">10%</span> Discount</h3>
          <p class="font-lg color-white">Get E-mail updates about our latest shop and <span class="font-lg-bold">special offers.</span></p>
        </div>
        <div class="col-lg-4 col-md-5 col-sm-12">
          <div class="box-form-newsletter mt-15">
            <form class="form-newsletter">
              <input class="input-newsletter font-xs" value="" placeholder="Your email Address">
              <button class="btn btn-brand-2">Sign Up</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php include('common/footer.php') ?>