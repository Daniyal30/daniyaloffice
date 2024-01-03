<?php

session_start();

include('../includes/connect.php');

if (!isset($_SESSION['name'])) {
  header("location:login.php");
}

$id = $_GET['id'];

$select = "SELECT * FROM `notice_board` WHERE `id` = '$id'";

$result = mysqli_query($con, $select);

$row = mysqli_fetch_assoc($result);


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
                  <p class="mb-1 text-black text-capitalize"><?php echo $_SESSION['name']['name']?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
               
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
            <!-- <li class="nav-item dropdown"> -->
            
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                <img src="assets/images/faces/profile.jpeg" alt="image">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2 text-capitalize"><?php echo $_SESSION['name']['name']?></span>
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
              <a class="nav-link" href="employee.php">
                <span class="menu-title">Employee </span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="attendance.php">
                    <span>Employee Attendance</span>
                    <i class="mdi mdi-human-greeting menu-icon"></i></a>
            </li>


            <!-- Nav Item - progress -->
         


            <!-- Nav Item - Task -->
            <li class="nav-item">
                <a class="nav-link" href="task.php">
                  <span>Employee Task</span>
                    <i class="mdi mdi-buffer menu-icon"></i></a>
            </li>
    

            <li class="nav-item">
                <a class="nav-link" href="view_task.php">
                  <span>view Task</span>
                    <i class="mdi mdi-view-grid menu-icon"></i></a>
            </li>


            <!-- Nav Item - leave application -->
            <li class="nav-item">
                <a class="nav-link" href="leave_application.php">
                   
                    <span>Leave Application</span>
                    <i class="mdi mdi-sleep menu-icon"></i></a>
            </li>


            <!-- Nav Item - notice board  -->
            <li class="nav-item">
                <a class="nav-link" href="notice_board.php">  
                    <span>Notice board</span>
                    <i class="mdi mdi-email menu-icon"></i></a>
                  </li>

        </ul>
        <!-- End of Sidebar -->

           
           
      
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
           <div class="card">
            <div class="card-body shadow">
              <div class="d-flex justify-content-between">
              <div class="title_1">
                <span class="fw-bold text-capitalize"><?php echo $row['title']?></span>
              </div>
              <div class="posted_1">
                <p class="fw-bold text-capitalize">posted date <?php echo $row['posted_date']?></p>
              </div>
              </div>
              <p><?php echo $row['message']?></p>
              <div class="text-end">
                <a href="index.php" class="btn btn-primary btn-sm">go back</a>
              </div>
            </div>
           </div>
          </div> 
          <!-- content-wrapper ends -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
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