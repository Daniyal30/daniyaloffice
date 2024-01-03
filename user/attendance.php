<?php
   

session_start();

$warning = 0;

$message = 0;

$already_marked = 0;

$marked = 0;

include('../includes/connect.php');

if (!isset($_SESSION['name'])) {
  header("Location: login.php");
}

if (isset($_POST['mark_attendance'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $city = $_POST['city'];
  $age = $_POST['age'];
  $attendence = "present";
  $date = date("Y-m-d");

  $select = "SELECT * FROM `attendance` WHERE `date` = '$date'  AND `name` = '" .$_SESSION['name']['name']. "'";
  
  $store = mysqli_query($con, $select);

  if ($store) {
      $num = mysqli_num_rows($store);

      if ($num > 0) {
        $warning = 1;
      //  echo "attents already mark"; 
      } else {
        $insert = "INSERT INTO `attendance` (`name`, `email`, `city`, `age`, `attendance`, `Date`)
        VALUES('$name', '$email', '$city', '$age', '$attendence', '$date')";

        $storing = mysqli_query($con, $insert);

        if ($storing) {
          // echo 'present';
          $message = 1;
        } else {
          die(mysqli_errno($conn));
        }
        
      }
      
  }
}

if (isset($_POST['mark_absent'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $city = $_POST['city'];
  $age = $_POST['age'];
  $attendence = "absent";
  $date = date("Y-m-d");

  $select = "SELECT * FROM `attendance` WHERE `date` = '$date' AND `name` = '" .$_SESSION['name']['name']. "'";
  
  $store = mysqli_query($con, $select);

  if ($store) {
      $num = mysqli_num_rows($store);

      if ($num > 0) {
        $warning = 1;
      //  echo "attents already mark"; 
      } else {
        $insert = "INSERT INTO `attendance` (`name`, `email`, `city`, `age`, `attendance`, `Date`)
        VALUES('$name', '$email', '$city', '$age', '$attendence', '$date')";

        $storing = mysqli_query($con, $insert);

        if ($storing) {
          // echo 'present';
          $message = 1;
        } else {
          die(mysqli_errno($conn));
        }
        
      }
      
  }
}

if (isset($_POST['mark_leave'])) {
  $employee_name = $_POST['employee_name'];
  $leave_title = $_POST['leave_title'];
  $emp_leave = $_POST['emp_leave'];
  $date = date("y-m-d");

  $insert = "INSERT INTO `office_leave` (`employees_name`, `leave_title`, `emp_leave`, `date`)
  VALUES('$employee_name', '$leave_title', '$emp_leave', '$date')";

  $excetue = mysqli_query($con, $insert);

  if ($excetue) {
    $marked = 1;
  } else {
    die(mysqli_error($con));
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
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.css"> -->
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>



    <div class="container-scroller">
    
      <!-- partial:partials/_navbar.html  -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.php"><img src="assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="assets/images/faces/profile.jpeg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?php echo $_SESSION['name']['name']?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="edit_employee.php">
                  <i class="mdi mdi-cached me-2 text-success"></i> profile </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
       
           </li>
         
           
           </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>

      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="assets/images/faces/profile.jpeg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php echo $_SESSION['name']['name']?></span>
                  <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="attendance.php">
                <span class="menu-title">attendance</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="task.php">
                <span class="menu-title">view task</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="view_atten.php">
                <span class="menu-title">view</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="leave_status.php">
                <span class="menu-title">leave_status</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          
          <div class="content-wrapper">
          <div class="header">
              <h3 class="page-title text-capitalize fs-1">attendence</h3>
              <p>From Here you can Mark attendance , View your attendance details or Mark leave.</p>
              <hr class="my-3">
            </div>
            <div class="text-center">
            <p>Feel Free to Mark attendance , View your attendance details or Mark leave</p>
            </div>            
            <?php
              $select = "SELECT * FROM `employees` WHERE `name` = '" .$_SESSION['name']['name']. "'";
              
              $result = mysqli_query($con, $select);

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <div class="d-flex justify-content-around justify-content-center mt-5">

                    <div class="class_1">
                      <form method="post">
                        <input type="text" name="name" value="<?php echo $row["name"] ?>" hidden>
                        <input type="email" name="email" value="<?php echo $row["email"] ?>" hidden>
                        <input type="text" name="city" value="<?php echo $row["city"] ?>" hidden>
                        <input type="text" name="age" value="<?php echo $row["age"] ?>" hidden>
                        <button type="submit" class="btn btn-outline-success" name="mark_attendance">Mark Attendance</button>
                      </form>
                    </div>

                    <div class="class_2">
                      <form method="post">
                        <input type="text" name="name" value="<?php echo $row["name"] ?>" hidden>
                        <input type="email" name="email" value="<?php echo $row["email"] ?>" hidden>
                        <input type="text" name="city" value="<?php echo $row["city"] ?>" hidden>
                        <input type="text" name="age" value="<?php echo $row["age"] ?>" hidden>
                        <button type="submit" class="btn btn-outline-danger" name="mark_absent">Mark Absent</button>
                      </form>
                    </div>

                    <div class="class_3">
                      <button type="submit" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal">Mark Leave</button>
                    </div>
                  </div>

                    
                    <?php
                    if ($warning) {
                          echo '<div class="d-flex justify-content-center">
                          <div class="alert alert-danger mt-4 w-50 text-center" role="alert">
                          <span>Attendence already marked.</span>
                        </div>
                          </div>';
                      }

                    if ($message) {
                      echo '<div class="d-flex justify-content-center">
                      <div class="alert alert-success mt-4 w-50 text-center" role="alert">
                      <span>Attendence marked successfully.</span>
                    </div>
                      </div>';
                      }

                      if ($already_marked) {
                        echo '<div class="d-flex justify-content-center">
                        <div class="alert alert-danger mt-4 w-50 text-center" role="alert">
                        <span>your leave already marked.</span>
                      </div>
                        </div>';
                        }

                        if ($marked) {
                          echo '<div class="d-flex justify-content-center">
                          <div class="alert alert-success mt-4 w-50 text-center" role="alert">
                          <span>leave marked successfully.</span>
                        </div>
                          </div>';
                          }
                    ?>
                    
                  </div>



                  <?php
                }


              }
                ?>            
              
    
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <!-- Button trigger modal -->

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-capitalize" id="exampleModalLabel">type your leave here</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="mb-3">
            <label for="" class="form-label">employee name</label>
            <input type="text" class="form-control" name="employee_name" value="<?php echo $_SESSION['name']['name']?>" placeholder="abc@mail.com"/>
          </div>

          <div class="mb-3">
            <label for="" class="form-label">leave title</label>
            <input type="text" class="form-control" name="leave_title"  placeholder="Enter Leave Title"/>
          </div>

          <div class="mb-3">
            <label for="" class="form-label">leave here</label>
            <textarea name="emp_leave" cols="30" class="form-control" rows="10"></textarea>
          </div>

          <div class="mb-3">
            <label for="" class="form-label">date</label>
            <input type="date" class="form-control" name="date"/>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" name="mark_leave">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>