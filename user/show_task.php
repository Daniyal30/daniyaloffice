
<?php

$success = 0;

session_start();

include('../includes/connect.php');

if (!isset($_SESSION['name'])) {
  header("Location: login.php");
}

$id = $_GET['id'];

$select = "SELECT * FROM `task` WHERE `id` = '$id'";

$store = mysqli_query($con, $select);

$row = mysqli_fetch_assoc($store);

if (isset($_POST['submit'])) {
    $status = $_POST['status'];

    $update = "UPDATE `task` SET `status` = '$status' WHERE  `id` = '$id'";
    $result = mysqli_query($con, $update);

    if ($result) {
        header("Location: task.php");
        // $success = 1;
        // echo "task done";
    } else {
        die(mysqli_errno($con));
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
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="#"><img src="assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="#"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
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
                <img src="assets/images/faces/profile.jpeg" alt="profile">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black text-capitalize"><?php echo $_SESSION['name']['name']?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
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
        <!-- partial:../../partials/_sidebar.html -->
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
    
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-8 mx-auto">
              <div class="auth-form-light text-left p-5">
              <h4>Update task</h4>
                
                <form class="user" method="post">
                  <div class="form-group">
                    <input type="text" name="task_tittle" value="<?php echo $row['task_title']?>" class="form-control form-control-lg" disabled id="exampleInputname1" placeholder="task tittle">
                </div>
                <div class="form-group">
                    
                    <input type="text" name="task_description" value="<?php echo $row['task_descripttion']?>" disabled class="form-control form-control-lg" id="exampleInputname1" placeholder="task tittle">
                    
                  </div>
                  <div class="form-group">
                  <input type="date" name="posted_date" value="<?php echo $row['start_date']?>" disabled class="form-control form-control-lg"  
                  placeholder="posted_date">
                 </div>
                  
                 <div class="form-group">
                  <input type="date" name="deadline" value="<?php echo $row['end_date']?>" disabled class="form-control form-control-lg"  
                  placeholder="deadline">
                 </div>

                 <div class="col-sm-7">
			            <select class="form-control" name="status" id="status">
                                    <option value="Incomplete" <?php if($row['status'] == 'Incomplete'){ ?>selected <?php } ?>>Incomplete</option>
			                      	<option value="In Progress" <?php if($row['status'] == 'In Progress'){ ?>selected <?php } ?>>In Progress</option>
			                      	<option value="Completed" <?php if($row['status'] == 'Completed'){ ?>selected <?php } ?>>Completed</option>
			                      </select>
			            </div>

                   
                 
                  <div class="my-3">
                    <button class="btn btn-gradient-primary font-weight-medium" name="submit" >submit</button>
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
        <!-- main-panel ends -->
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
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>