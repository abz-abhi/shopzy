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
          <li><a class="font-xs color-gray-500" href="shop-wishlist.php">Wishlist</a></li>
        </ul>
      </div>
    </div>
  </div>
  <section class="section-box shop-template">
    <div class="container">
      <div class="box-wishlist">
        <div class="head-wishlist">
          <div class="item-wishlist">
            <div class="wishlist-product"><span class="font-md-bold color-brand-3">Product</span></div>
            <div class="wishlist-price"><span class="font-md-bold color-brand-3">Price</span></div>
            <div class="wishlist-status"><span class="font-md-bold color-brand-3">Stock status</span></div>
            <div class="wishlist-action"><span class="font-md-bold color-brand-3">Action</span></div>
            <div class="wishlist-remove"><span class="font-md-bold color-brand-3">Remove</span></div>
          </div>
        </div>
        <div class="content-wishlist" id="wishlistBox">

          <?php if (isset($_SESSION['user_id'])) {

            $user_id = $_SESSION['user_id'];

            $Select_wishlist = mysqli_query($con, "SELECT * FROM `wishlist` WHERE `user_id` = '$user_id' ");

            while ($result_wishlist = mysqli_fetch_assoc($Select_wishlist)) {

              $select_Prod = mysqli_query($con, "SELECT * FROM `product` WHERE `id` = '" . $result_wishlist['prod_id'] . "' ");

              while ($result_prod = mysqli_fetch_assoc($select_Prod)) {

          ?>





                <div class="item-wishlist">
                  <div class="wishlist-product">
                    <div class="product-wishlist">
                      <div class="product-image"><a href="single-product.php"><img src="admin/<?php echo $result_prod['image'] ?>" alt="Ecom"></a></div>
                      <div class="product-info"><a href="single-product.php">
                          <h6 class="color-brand-3"><?php echo $result_prod['name'] ?></h6>
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
                    <h4 class="color-brand-3"><?php echo $result_prod['selling_price'] ?></h4>
                  </div>
                  <div class="wishlist-status">

                    <?php if ($result_prod['status'] == 0) { ?>
                      <span class="btn btn-gray font-md-bold color-brand-3" style="background-color: red; color:black !important ;">No Stock</span>
                      <?php } else {
                      if ($result_prod['status'] == 1) { ?>
                        <span class="btn btn-gray font-md-bold color-brand-3" style="background-color: green; color:white !important;">In Stock</span>
                    <?php }
                    } ?>

                  </div>
                  <div class="wishlist-action">



                    <?php if (isset($_SESSION['user_id'])) { ?>

                      <button class="btn btn-cart" onclick="addCartfrom_cart(<?php echo $result_prod['id']; ?>, <?php echo $result_prod['selling_price']; ?>)">Add To Cart</button>
                    <?php } ?>


                  </div>
                  <div class="wishlist-remove">
                    <a class="btn btn-delete" onclick="user_deleteWishlist(<?php echo $result_wishlist['id'] ?>)"></a>
                  </div>
                </div>

                <?php }
            }
          } else {
            if (isset($_SESSION['wishlist'])) {

              $session_wishlist = $_SESSION['wishlist'];


              foreach ($session_wishlist as $key => $value) {

                $select_Prod = mysqli_query($con, "SELECT * FROM `product` WHERE `id` = '" . $value['id'] . "' ");

                while ($result_prod = mysqli_fetch_assoc($select_Prod)) {



                ?>





                  <div class="item-wishlist">
                    <div class="wishlist-product">
                      <div class="product-wishlist">
                        <div class="product-image"><a href="single-product.php"><img src="admin/<?php echo $result_prod['image'] ?>" alt="Ecom"></a></div>
                        <div class="product-info"><a href="single-product.php">
                            <h6 class="color-brand-3"><?php echo $result_prod['name'] ?></h6>
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
                      <h4 class="color-brand-3"><?php echo $result_prod['selling_price'] ?></h4>
                    </div>
                    <div class="wishlist-status">

                      <?php if ($result_prod['status'] == 0) { ?>
                        <span class="btn btn-gray font-md-bold color-brand-3" style="background-color: red; color:black !important ;">No Stock</span>
                        <?php } else {
                        if ($result_prod['status'] == 1) { ?>
                          <span class="btn btn-gray font-md-bold color-brand-3" style="background-color: green; color:white !important;">In Stock</span>
                      <?php }
                      } ?>

                    </div>
                    <div class="wishlist-action">
                      <button class="btn btn-cart" onclick="addCartfrom_session(<?php echo $result_prod['id']; ?>, <?php echo $result_prod['selling_price']; ?>)">Add To Cart</button>
                    </div>
                    <div class="wishlist-remove">
                      <a class="btn btn-delete" onclick="session_deleteWishlist(<?php echo $value['id'] ?>)"></a>
                    </div>
                  </div>







          <?php }
              }
            }
          } ?>

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
<?php include('common/footer.php') ?>