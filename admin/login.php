<?php

include('../includes/connect.php');

$warning = 0;

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $select = "SELECT * FROM `admin` WHERE `email` = '$email' AND `password` = '$password'";

  $store = mysqli_query($con, $select);

  $row = mysqli_fetch_assoc($store);

  $num = mysqli_num_rows($store);

  if ($num > 0) {
      session_start();
      header('Location:index.php');
      $_SESSION['admin_name'] = $row;
  }else {
      $warning = 1;
  }
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
              <?php
                  if ($warning) {
                    echo '<div class="text-danger">email or password incorrect</div>';
                  }
                  ?>
                <div class="brand-logo mt-5">
                  <img src="assets/images/logo.svg">
                </div>
                <h4>Hello! Admin</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" method="post">
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter Ypur email">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Enter Your Password">
                  </div>
                  <div class="my-3">
                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" name="login">SIGN IN</button>
                  </div>

                  <div class="text-end">
                  <a href="../user/login.php" class="text-dark nav-link text-capitalize">are you employee??</a>
                </div>

                  
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>