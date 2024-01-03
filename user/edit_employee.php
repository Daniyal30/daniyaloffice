<?php

session_start();

include('../includes/connect.php');
if (!isset($_SESSION['name'])) {
  header("Location: login.php");
}

  


  $id = $_SESSION['name']['id'];

$select = "SELECT * FROM `employees` WHERE id = '$id'";

$result = mysqli_query($con, $select);

$row = mysqli_fetch_array($result);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $city = $_POST['city'];

    $img_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    $folder = "../images/" . $img_name;

    
    if ($img_name != "") {
        move_uploaded_file($tmp_name, $folder);

        $update = "UPDATE `employees` SET `name` = '$name', `email`= '$email', `age` = '$age', `city`=  '$city', `image` = '$folder' WHERE id = '$id'";

        $store = mysqli_query($con, $update);

        header("Location:index.php");
        
    } else {
        $update = "UPDATE `employees` SET `name` = '$name', `email`= '$email', `age` = '$age', `city`=  '$city' WHERE id = '$id'";

        $store = mysqli_query($con, $update);

        header("Location:index.php");
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
    <link rel="shortcut icon" href="/assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-8 mx-auto">
              <div class="auth-form-light shadow text-left p-5">

                <div class="text-center text-capitalize mb-4">
                <h4>update profile</h4>
                </div>
                
                <form class="user" method="post"  enctype="multipart/form-data">
                  <div class="form-group">
              
                    <input type="text" name ="name"  Value="<?Php  echo $row['name']?>" class="form-control form-control-lg"  placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="email" name ="email" Value="<?Php  echo $row['email']?>" class="form-control form-control-lg"  placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="age" name ="age" Value="<?Php  echo $row['age']?>" class="form-control form-control-lg"  placeholder="Email">
                  </div>

                  <div class="form-group">
                    <input type="city" name ="city" Value="<?Php  echo $row['city']?>" class="form-control form-control-lg"  placeholder="Email">
                  </div>

                  <div class="col-sm-12 mb-3 mb-sm-4">
                   <input type="file" name="image" class="form-control">
                  <img src="../images/<?php echo $row['image']?>" alt="image not found" width="100px" height="100px">                                 
                  </div>

                  <div class="mt-3">
                  <button class=" btn-gradient-primary btn-lg font-weight-bold text-capitalize" name ="update">update </button>
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