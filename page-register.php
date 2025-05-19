<?php
include('session.php');
include('common/header.php');

if (isset($_POST['createAcco'])) {

  $userName = trim($_POST['userName']);
  $phone = trim($_POST['phoneNum']);
  $email = trim($_POST['email']);
  $dateTime = date("Y-m-d H:i:s");

  if ($_POST['password'] == $_POST['confPass']) {

    $encPass = md5($_POST['password']);

    $selectMail = mysqli_query($con, "SELECT `id` FROM `users` WHERE `email` ='" . $email . "' ");

    if (mysqli_num_rows($selectMail) > 0) {
      echo "❌ email alrder exists";
    } else {

      $selectNumber = mysqli_query($con, "SELECT `id` FROM `users` WHERE `phone_number` ='" . $phone . "'");

      if (mysqli_num_rows($selectNumber) > 0) {
        $message = "❌ Phone number alredy exists.";
      } else {
        $user_query = " INSERT INTO `users`(`user_level`,`user_name`,`phone_number`,`email`,`password`,`status`,`created_on`,`updated_on`)
                                          VALUES ('3','$userName','$phone','$email','$encPass','1','$dateTime','$dateTime' ) ";

        if (mysqli_query($con, $user_query)) {
           echo "<script>window.location.href='page-login.php'</script>";
        } 
      }
    }
  } else {
    $message = "❌ Passwords do not match.";
  }
}

?>
<main class="main">
  <section class="section-box shop-template mt-60">
    <div class="container">
      <div class="row mb-100">
        <div class="col-lg-1"></div>
        <div class="col-lg-5">
          <h3>Create an account</h3>
          <?php  if (!empty($message)){ 
          ?>
          <div class="alert alert-danger mt-3"><?php echo $message;?> </div>
          <?php   }  ?>
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
                <input name="email" class="form-control" type="email" placeholder="@gmail.com" required>
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
<?php include('common/footer.php') ?>