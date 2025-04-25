<?php
include('common\header.php');
include('../admin/include/db_config.php');
?>
<main class="main">
  <section class="section-box shop-template mt-60">
    <div class="container">
      <div class="row mb-100">
        <div class="col-lg-1"></div>
        <div class="col-lg-5">
          <h3>Create an account</h3>
          <?php
          if (isset($_POST['createAcco'])) {

            $userName = $_POST['userName'];
            $email = $_POST['email'];
            $phone = $_POST['phoneNum'];
            $dateTime = date("Y-m-d H:i:s");

            if ($_POST['password'] == $_POST['confPass']) {
              $encPass = md5($_POST['password']);

              $user_query = " INSERT INTO `users`(`user_level`,`user_name`,`phone_number`,`email`,`password`,`status`,`created_on`,`updated_on`)
                                          VALUES ('3','$userName','$phone','$email','$encPass','1','$dateTime','$dateTime' ) ";

              if (mysqli_query($con, $user_query)) {
                echo "<script>alert('Registration succes'); window.location.href='page-login.php'</script>";
              }
            }
          }

          ?>



          <form action="" method="POST">
            <div class="form-register mt-5 mb-10">
              <div class="form-group">
                <label class="mb-5 font-sm color-gray-700">Username *</label>
                <input name="userName" class="form-control" type="text" placeholder="Username" required>
              </div>
              <div class="form-group">
                <label class="mb-5 font-sm color-gray-700">Phone *</label>
                <input name="phoneNum" class="form-control" type="text" placeholder="Phone number" required>
              </div>
              <div class="form-group">
                <label class="mb-5 font-sm color-gray-700">Email *</label>
                <input name="email" class="form-control" type="mail" placeholder="@gmail.com" required>
              </div>
              <div class="form-group">
                <label class="mb-5 font-sm color-gray-700">Password *</label>
                <input name="password" class="form-control" type="password" placeholder="******************" required>
              </div>
              <div class="form-group">
                <label class="mb-5 font-sm color-gray-700">Re-Password *</label>
                <input name="confPass" class="form-control" type="password" placeholder="******************" required>
              </div>
              <div class="form-group">
                <input name="createAcco" class="font-md-bold btn btn-buy" type="submit" value="Sign Up">
              </div>
              <div class="mt-10">
                <span class="font-xs color-gray-500 font-medium">Already have an account?</span>
                <a class="font-xs color-brand-3 font-medium" href="page-login.php"> Sign In</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>