<?php

include('../includes/connect.php');

$message = 0;

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $city = $_POST['city'];
    $password = md5($_POST['password']);

    $img_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    $folder = "../images/" . $img_name;

    move_uploaded_file($tmp_name, $folder);


    $select = "SELECT * FROM `employees` WHERE `email` = '$email'";

    $result = mysqli_query($con, $select);

        if ($result) {
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                // echo 'email is present';
                $message = 1;
            }else {
                $insert = "INSERT INTO `employees` (`name`, `email`, `age`, `city`, `image`, `password`)
                VALUES('$name', '$email', '$age', '$city', '$folder', '$password')";
    
                $store = mysqli_query($con, $insert);
    
                if ($store) {
                    echo 'insert';
                } else {
                    die(mysqli_error($con));
                }
            }
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
                      <?php
                        if ($message) {
                          echo "<div class='alert alert-danger' role='alert'>
                            <span class='text-capitalize'>this email has already taken please try antother one</span>
                          </div>";
                          }
                        ?>
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="assets/images/logo.svg">
                </div>
                <div class="text-center text-capitalize ">
                  <h4> create an account</h4>
                </div>
                
                <form class="user" method="post" enctype="multipart/form-data">

                  <div class="form-group">
                    <input type="text" name="name" class="form-control form-control-lg" id="exampleInputname1" placeholder="Name">
                  </div>

                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                  </div>
                  
                  <div class="form-group">
                    <input type="text" name="age" class="form-control form-control-lg" id="exampleInputage" placeholder="Age">
                 </div>

                 <div class="form-group">
                    <input type="text" name="city" class="form-control form-control-lg" placeholder="Enter city">
                  </div>

                  <div class="form-group">
                    <input type="file" name="image" class="form-control">
                  </div>

                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  
                  <div class="my-3">
                    <button class="btn btn-gradient-primary font-weight-medium" name="submit" >register</button>
                  </div>
                  
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="login.php" class="text-primary">Login</a>
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
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>