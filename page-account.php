<?php
include('session.php');
include('common/header.php');

?>
<main class="main">
  <?php



  if (isset($_POST['saveAddress'])) {
    $logUsername = trim($_POST['logUsername']);
    $logPhone_number = trim($_POST['logPhone_number']);
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

    // Check if user exists
    $selectedLogUser = mysqli_query($con, "SELECT * FROM `users` WHERE `id` = '$user_id'") or die(mysqli_error($con));

    if (mysqli_num_rows($selectedLogUser) > 0) {
      // Update user info
      $updateLogData = mysqli_query($con, "UPDATE `users` SET 
            `user_name` = '$logUsername',
            `phone_number` = '$logPhone_number',
            `email` = '$logEmail' 
            WHERE `id` = '$user_id'") or die(mysqli_error($con));
    }





    $selectUser = mysqli_query($con, "SELECT * FROM `shipping` WHERE `user_id`= '$user_id'") or die(mysqli_error($con));
    if (mysqli_fetch_assoc($selectUser) > 0) {
      $updateAddress = mysqli_query($con, "UPDATE `shipping` SET 
                                                                            `first_name` = '$firstname',
                                                                            `last_name` = '$lastname',
                                                                            `adress` = '$address',
                                                                            `city` = '$city',
                                                                            `pincode` = '$postcode',
                                                                            `company` = '$companyName',
                                                                            `phone_number` = '$phoneNumber',
                                                                            `updated_on` = '$dateTime' ")
        or die(mysqli_error($con));
    } else {

      $insertqurey = mysqli_query(
        $con,
        "INSERT INTO `shipping` (`user_id`, `first_name`, `last_name`, `adress`, `city`, `pincode`, `company`, `phone_number`, `created_on`, `updated_on`) 
                                          VALUES ('$user_id', '$firstname', '$lastname', '$address', '$city', '$postcode', '$companyName', '$phoneNumber', '$dateTime', '$dateTime')"
      );
    }
  }


  ?>
  <section class="section-box shop-template mt-30">
    <?php $user_id = $_SESSION['user_id'];
    $selectUser = mysqli_query($con, "SELECT * FROM `users` WHERE `id` = '$user_id' ");
    $userRow = mysqli_fetch_array($selectUser); ?>
    <div class="container box-account-template">
      <h3><?php echo $userRow['user_name']; ?></h3>
      <p class="font-md color-gray-500">From your account dashboard. you can easily check & view your recent orders,
        <br class="d-none d-lg-block">manage your shipping and billing addresses and edit your password and account details.
      </p>
      <div class="box-tabs mb-100">
        <div class="border-bottom mt-20 mb-40"></div>
        <div>
          <div class="row">
            <div class="col-lg-6 mb-20">

              <form action="" method="POST">
                <div class="row">
                  <div class="col-lg-12 mb-20">
                    <h5 class="font-md-bold color-brand-3 text-sm-start text-center">Contact information</h5>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <input class="form-control font-sm" name="logUsername" type="text" value="<?php echo $userRow['user_name'] ?>" placeholder="Username">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <input class="form-control font-sm" name="logPhone_number" type="text" value="<?php echo $userRow['phone_number']  ?>" placeholder="Phone number">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <input class="form-control font-sm" name="logEmail" type="text" value="<?php echo $userRow['email']  ?>" placeholder="Email">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <h5 class="font-md-bold color-brand-3 mt-15 mb-20">Shipping address</h5>
                  </div>
                  <?php

                  $select_User = mysqli_query($con, "SELECT * FROM `shipping` WHERE `user_id` = '$user_id' ") or die(mysqli_error($con));
                  $detailsUser = mysqli_fetch_array($select_User);
                  ?>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input class="form-control font-sm" name="firstname" type="text" value="<?php echo $detailsUser['first_name'] ?>" placeholder="First name*" required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input class="form-control font-sm" name="lastname" type="text" value="<?php echo $detailsUser['last_name'] ?>" placeholder="Last name">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <input class="form-control font-sm" name="address" type="text" value="<?php echo $detailsUser['adress'] ?>" placeholder="Address*" required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input class="form-control font-sm" name="city" type="text" value="<?php echo $detailsUser['city'] ?>" placeholder="City*" required>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <input class="form-control font-sm" name="postcode" type="text" value="<?php echo $detailsUser['pincode'] ?>" placeholder="PostCode / ZIP*" required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input class="form-control font-sm" name="companyName" type="text" value="<?php echo $detailsUser['company'] ?>" placeholder="Company name">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input class="form-control font-sm" name="phoneNumber" type="text" value="<?php echo $detailsUser['phone_number'] ?>" placeholder="Phone*" required>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group mt-20">
                      <input class="btn btn-buy w-auto h54 font-md-bold" name="saveAddress" type="submit" value="Save change">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-lg-1 mb-20"></div>
            <div class="col-lg-5 mb-20">
              <div class="mt-40">
                <h4 class="mb-10"><?php echo $detailsUser['first_name'] ?></h4>
                <div class="mb-10">
                  <p class="font-sm color-brand-3 font-medium">Delivery address:</p><span class="font-sm color-gray-500 font-medium"><?php echo $detailsUser['adress'] ?></span>
                </div>
                <div class="mb-10">
                  <p class="font-sm color-brand-3 font-medium">Phone Number:</p><span class="font-sm color-gray-500 font-medium"><?php echo $detailsUser['phone_number'] ?></span>
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