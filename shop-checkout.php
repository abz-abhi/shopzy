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


          <?php
          if (isset($_POST['saveAddressOrder'])) {
            $logEmail = trim($_POST['logEmail']);

            $user_id = $_SESSION['user_id'];
            $firstname = trim($_POST['firstname']);
            $lastname = trim($_POST['lastname']);
            $address = trim($_POST['address']);
            $city = trim($_POST['city']);
            $postcode = trim($_POST['postcode']);
            $companyName = trim($_POST['companyName']);
            $phoneNumber = trim($_POST['phoneNumber']);
            $dateTime = date('Y-m-d H:i:s');

            // Update email in users table
            $selectedLogUser = mysqli_query($con, "SELECT * FROM `users` WHERE `id` = '$user_id'") or die(mysqli_error($con));
            if (mysqli_num_rows($selectedLogUser) > 0) {
              $updateLogData = mysqli_query($con, "UPDATE `users` SET `email` = '$logEmail' WHERE `id` = '$user_id'") or die(mysqli_error($con));
            }

            // Update or insert into shipping table
            $selectUser = mysqli_query($con, "SELECT * FROM `shipping` WHERE `user_id`= '$user_id'") or die(mysqli_error($con));
            if (mysqli_fetch_assoc($selectUser)) {
              $updateAddress = mysqli_query($con, "UPDATE `shipping` SET 
                                                                        `first_name` = '$firstname',
                                                                        `last_name` = '$lastname',
                                                                        `adress` = '$address',
                                                                        `city` = '$city',
                                                                        `pincode` = '$postcode',
                                                                        `company` = '$companyName',
                                                                        `phone_number` = '$phoneNumber',
                                                                        `updated_on` = '$dateTime'
                                                                         WHERE `user_id` = '$user_id'");
            } else {
              $insertqurey = mysqli_query(
                $con,
                "INSERT INTO `shipping` (`user_id`, `first_name`, `last_name`, `adress`, `city`, `pincode`, `company`, `phone_number`, `created_on`, `updated_on`) 
                                        VALUES ('$user_id', '$firstname', '$lastname', '$address', '$city', '$postcode', '$companyName', '$phoneNumber', '$dateTime', '$dateTime')"
              );
            }
          }


          if (isset($_POST["placeOrder"]) && $_POST['esr_tocken'] == $_SESSION['esr_tocken']) {

            $payMeathod = $_POST['payment_option'];

            $selectShippingId = mysqli_query($con, "SELECT * FROM `shipping` WHERE `user_id` = '$user_id' ");


            if (mysqli_num_rows($selectShippingId) > 0) {

              $resultId = mysqli_fetch_assoc($selectShippingId);
              $user_id = $_SESSION['user_id'];
              $shippingId = $resultId["id"];
              $dateTime = date('Y-m-d H:i:s');
              $uniqid = uniqid();






              $selectCart = mysqli_query($con, "SELECT * FROM `cart` WHERE `user_id` = '$user_id' ") or die(mysqli_error($con));
              $total = 0;

              while ($rowCart = mysqli_fetch_array($selectCart)) {
                $singleTotal = $rowCart['qty'] * $rowCart['price'];
                $total += $singleTotal;

                $item_id = $rowCart['pro_id'];
                $item_qty = $rowCart['qty'];
                $item_price = $rowCart['price'];
                $item_quantity = $rowCart['quantity'];

                $insertItem = mysqli_query($con, "INSERT INTO `order_items`(`user_id`, `order_id`, `item_id`, `qty`, `price`, `total`, `created_on`, `updated_on`) 
                                                                              VALUES ('$user_id','$uniqid','$item_id','$item_qty','$item_price','$singleTotal','$dateTime','$dateTime') ");
              }

              $insertQurey = mysqli_query($con, "INSERT INTO `orders`(`uniqe_id`, `user_id`, `shipping_id`, `sub_total`,`pay_method`,`status`, `created_on`, `updated_on`)
                                                               VALUES ('$uniqid','$user_id','$shippingId','$total','$payMeathod','1','$dateTime','$dateTime')");


              if (isset($insertQurey)) {
                $deleteCart = mysqli_query($con, "DELETE FROM `cart` WHERE `user_id` = '$user_id' ");
                if ($deleteCart) {
                  echo "<script> alert('order placed'); window.location.href = 'index.php';</script>";
                  exit();
                }
              }
            } else {
              echo "<script> alert('save shipping address'); window.location.href = 'shop-checkout.php';</script>";
              exit();
            }
          }
          ?>

          <form action="" method="POST">


            <?php

            $esr_tocken = uniqid(12);

            $_SESSION['esr_tocken'] = $esr_tocken;

            ?>
            <input type="hidden" name="esr_tocken" value="<?php echo $esr_tocken; ?>">

            <div class="box-border">

              <div class="row">
                <div class="col-lg-6 col-sm-6 mb-20">
                  <h5 class="font-md-bold color-brand-3 text-sm-start text-center">Contact information</h5>
                </div>

                <?php
                $selectUser = mysqli_query($con, "SELECT * FROM `users` WHERE `id` = '$user_id'");
                $userRow = mysqli_fetch_array($selectUser);
                ?>

                <div class="col-lg-12">
                  <div class="form-group">
                    <input class="form-control font-sm" name="logEmail" type="text" value="<?php echo $userRow['email']; ?>" placeholder="Email*" required>
                  </div>
                </div>

                <div class="col-lg-12">
                  <h5 class="font-md-bold color-brand-3 mt-15 mb-20">Shipping address</h5>
                </div>

                <?php
                $select_User = mysqli_query($con, "SELECT * FROM `shipping` WHERE `user_id` = '$user_id'") or die(mysqli_error($con));
                $detailsUser = mysqli_fetch_array($select_User);
                ?>

                <div class="col-lg-6">
                  <div class="form-group">
                    <input class="form-control font-sm" name="firstname" type="text" value="<?php echo $detailsUser['first_name'] ?? ''; ?>" placeholder="First name*" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <input class="form-control font-sm" name="lastname" type="text" value="<?php echo $detailsUser['last_name'] ?? ''; ?>" placeholder="Last name">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <input class="form-control font-sm" name="address" type="text" value="<?php echo $detailsUser['adress'] ?? ''; ?>" placeholder="Address*" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <input class="form-control font-sm" name="city" type="text" value="<?php echo $detailsUser['city'] ?? ''; ?>" placeholder="City*" required>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <input class="form-control font-sm" name="postcode" type="text" value="<?php echo $detailsUser['pincode'] ?? ''; ?>" placeholder="PostCode / ZIP*" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <input class="form-control font-sm" name="companyName" type="text" value="<?php echo $detailsUser['company'] ?? ''; ?>" placeholder="Company name">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <input class="form-control font-sm" name="phoneNumber" type="text" value="<?php echo $detailsUser['phone_number'] ?? ''; ?>" placeholder="Phone*" required>
                  </div>
                </div>
                <div class="col-lg-12">
                  <input class="btn btn-buy w-auto" name="saveAddressOrder" type="submit" value="Save change">

                  <div class="box-payment" style="margin-top: 20px; display: flex; gap: 20px;">
                    <!-- COD -->
                    <label class="btn btn-amazon" style="display: flex; flex-direction: column; align-items: center; padding: 10px;">
                      <input type="checkbox" name="payment_option" value="COD" style="margin-bottom: 10px;" required>
                      <img src="assets/imgs/page/checkout/cod.png" alt="Ecom" style="min-width: 50px; min-height: 50px;">
                      <p style="color: green; margin-top: 10px;">Available</p>
                    </label>

                    <!-- GPay -->
                    <label class="btn btn-gpay" style="display: flex; flex-direction: column; align-items: center; padding: 10px;">
                      <input type="checkbox" name="payment_option" value="gpay" style="margin-bottom: 10px;" disabled>
                      <img src="assets/imgs/page/checkout/gpay.svg" alt="Ecom" style="min-width: 50px; min-height: 50px;">
                      <p style="color: red; margin-top: 10px;">Unavailable</p>
                    </label>

                    <!-- PayPal -->
                    <label class="btn btn-paypal" style="display: flex; flex-direction: column; align-items: center; padding: 10px;">
                      <input type="checkbox" name="payment_option" value="paypal" style="margin-bottom: 10px;" disabled>
                      <img src="assets/imgs/page/checkout/paypal.svg" alt="Ecom" style="min-width: 50px; min-height: 50px;">
                      <p style="color: red; margin-top: 10px;">Unavailable</p>
                    </label>
                  </div>



                </div>
              </div>
            </div>
            <div class="row mt-20">
              <div class="col-lg-6 col-5 mb-20"><a class="btn font-sm-bold color-brand-1 arrow-back-1" href="shop-cart.php">Return to Cart</a></div>
              <div class="col-lg-6 col-7 mb-20 text-end"><button type="submit" class="btn btn-primary" name="placeOrder" value="1">Place Order</button>
              </div>
            </div>
        </div>
        </form>

        <div class="col-lg-6">
          <div class="box-border">
            <h5 class="font-md-bold mb-20">Your Order</h5>
            <div class="listCheckout">

              <?php
              $selectCart = mysqli_query($con, "SELECT * FROM `cart` WHERE `user_id` = '$user_id' ") or die(mysqli_error($con));
              while ($rowCart = mysqli_fetch_array($selectCart)) {

                $selectProd = mysqli_query($con, "SELECT * FROM `product` WHERE `id` = '" . $rowCart['pro_id'] . "'   ")  or die(mysqli_error($con));
                while ($cartProd = mysqli_fetch_array($selectProd)) {

                  $singleTotal = $rowCart['qty'] * $rowCart['price'];
                  $total += $singleTotal;

              ?>

                  <div class="item-wishlist">
                    <div class="wishlist-product">
                      <div class="product-wishlist">
                        <div class="product-image"><img src="admin/<?php echo $cartProd['image'] ?>" alt="Ecom"></div>
                        <div class="product-info">
                          <h6 class="color-brand-3 description-clamp"><?php echo $cartProd['discription'] ?></h6>

                          <div class="rating">
                            <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                            <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                            <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                            <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                            <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                            <span class="font-xs color-gray-500"> (65)</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="wishlist-status">
                      <h5 class="color-gray-500">x<?php echo $rowCart['qty'] ?></h5>
                    </div>
                    <div class="wishlist-price">
                      <h4 class="color-brand-3 font-lg-bold"><?php echo $rowCart['qty'] * $rowCart['price']; ?></h4>
                    </div>
                  </div>
              <?php }
              } ?>
            </div>
            <div class="form-group d-flex mt-15">
              <input class="form-control mr-15" placeholder="Enter Your Coupon">
              <button class="btn btn-buy w-auto">Apply</button>
            </div>
            <div class="form-group mb-0">
              <div class="row mb-10">
                <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Subtotal</span></div>
                <div class="col-lg-6 col-6 text-end"><span class="font-lg-bold color-brand-3"><?php echo $total ?></span></div>
              </div>
              <div class="border-bottom mb-10 pb-5">
                <div class="row">
                  <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Shipping</span></div>
                  <div class="col-lg-6 col-6 text-end"><span class="font-lg-bold color-brand-3">-</span></div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Total</span></div>
                <div class="col-lg-6 col-6 text-end"><span class="font-lg-bold color-brand-3"><?php echo $total ?></span></div>
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