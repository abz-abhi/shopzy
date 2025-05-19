<?php
include('session.php');
include('common/header.php');

?>
<main class="main">
  <section class="section-box shop-template mt-60">
    <div class="container">
      <div class="row mb-100">
        <div class="col-lg-1"></div>
        <div class="col-lg-5">
          <h3>Login</h3>
          <p class="font-md color-gray-500">Welcome back!</p>
          <?php
          if (isset($_POST['login'])) {

            $select_query = " SELECT * FROM `users` WHERE `user_name` = '" . $_POST['logName'] . "' OR `phone_number` = '" . $_POST['logName'] . "' OR `email` = '" . $_POST['logName'] . "'  AND `password`='" . md5($_POST['logPass']) . "' ";
            $result = mysqli_query($con, $select_query);

            if (mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);

              $_SESSION['user_id'] = $row['id'];




              echo "<script>alert('Login sucess'); window.location.href='index.php'</script>";
            } else {
              echo "<script>alert('Entered wrong user name or password'); window.location.href='page-login.php'</script>";
            }
          }

          ?>






          <form action="" method="POST">
            <div class="form-register mt-30 mb-30">
              <div class="form-group">
                <label class="mb-5 font-sm color-gray-700">Email / Phone / Username *</label>
                <input name="logName" class="form-control" type="text" placeholder="@gmail.com" required>
              </div>
              <div class="form-group">
                <label class="mb-5 font-sm color-gray-700">Password *</label>
                <input name="logPass" class="form-control" type="password" placeholder="******************" required>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="color-gray-500 font-xs">
                      <input class="checkagree" type="checkbox">Remember me
                    </label>
                  </div>
                </div>
                <div class="col-lg-6 text-end">
                  <div class="form-group"><a class="font-xs color-gray-500" href="#">Forgot your password?</a></div>
                </div>
              </div>
              <div class="form-group">
                <input name="login" class="font-md-bold btn btn-buy" type="submit" value="Sign Up">
              </div>
              <div class="mt-20"><span class="font-xs color-gray-500 font-medium">Have not an account?</span><a class="font-xs color-brand-3 font-medium" href="page-register.php">Sign Up</a></div>
            </div>
          </form>
        </div>
        <div class="col-lg-5"></div>
      </div>
    </div>
  </section>
</main>
<?php include('common/footer.php'); ?>