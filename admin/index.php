<?php
ob_start();
session_start();
include("include/db_config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta property="og:title" content="" />
  <meta property="og:type" content="" />
  <meta property="og:url" content="" />
  <meta property="og:image" content="" />
  <link
    rel="shortcut icon"
    type="image/x-icon"
    href="assets/imgs/theme/favicon.svg" />
  <link href="assets/css/style.css?v=1.0.0" rel="stylesheet" />
  <title>Ecom - Marketplace Dashboard Template</title>
</head>

<body>
  <main class="main-wrap">
    <section class="content-main" style="margin-right: 310px; margin-top: 70px;">
      <div class="card mx-auto card-login">
        <div class="card-body">
          <h4 class="card-title mb-4">Sign in</h4>

          <?php
          if (isset($_POST['login'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];
            $encpass = md5($password);


            $select = "SELECT * FROM `users` WHERE `user_name` = '$username' AND `password` = '$encpass'";
            $result = mysqli_query($con, $select);

            if (mysqli_num_rows($result) > 0) {

              $row = mysqli_fetch_assoc($result);
              $_SESSION['user_id'] = $row['id'];
              echo "<script>alert('Registration successful!'); window.location.href='dashboard.php';</script>";
             
            } else {
              echo "<script>alert('Your enter a wrong email and password')</script>";
            }

          }


          ?>

          <form method="POST">
            <div class="mb-3">
              <input
                class="form-control"
                placeholder="Username"
                type="text"
                name="username"
                required />
            </div>
            <div class="mb-3">
              <input
                class="form-control"
                placeholder="Password"
                type="password"
                name="password"
                required />
            </div>
            <div class="mb-3">
              <a class="float-end font-sm text-muted" href="#">Forgot password?</a>
              <label class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  checked="" /><span class="form-check-label">Remember</span>
              </label>
            </div>
            <div class="mb-4">
              <button name="login" class="btn btn-primary w-100" type="submit">Login</button>
            </div>
          </form>
          <p class="text-center small text-muted mb-15">or sign up with</p>
          <div class="d-grid gap-3 mb-4">
            <a class="btn w-100 btn-light font-sm" href="#">
              <svg
                class="icon-svg"
                aria-hidden="true"
                width="20"
                height="20"
                viewbox="0 0 20 20">
                <path
                  d="M16.51 8H8.98v3h4.3c-.18 1-.74 1.48-1.6 2.04v2.01h2.6a7.8 7.8 0 002.38-5.88c0-.57-.05-.66-.15-1.18z"
                  fill="#4285F4"></path>
                <path
                  d="M8.98 17c2.16 0 3.97-.72 5.3-1.94l-2.6-2a4.8 4.8 0 01-7.18-2.54H1.83v2.07A8 8 0 008.98 17z"
                  fill="#34A853"></path>
                <path
                  d="M4.5 10.52a4.8 4.8 0 010-3.04V5.41H1.83a8 8 0 000 7.18l2.67-2.07z"
                  fill="#FBBC05"></path>
                <path
                  d="M8.98 4.18c1.17 0 2.23.4 3.06 1.2l2.3-2.3A8 8 0 001.83 5.4L4.5 7.49a4.77 4.77 0 014.48-3.3z"
                  fill="#EA4335"></path>
              </svg>
              Sign in using Google</a>
          </div>
        </div>
      </div>
    </section>
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