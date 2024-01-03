<?php
   

   session_start();

   include('../includes/connect.php');

if (!isset($_SESSION['name'])) {
  header("Location: login.php");
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
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">leave status</h4>
                                <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>employees_name</th>
                                        <th>leave_title</th>
                                        <th>emp_leave</th>
                                        <th>date</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                      <tbody>
                        <?php
                        
                        $select = "SELECT * FROM `office_leave` WHERE `status` = 'pending' AND `employees_name` = '".$_SESSION['name']['name']."'";

                        $result = mysqli_query($con, $select);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $employees_name = $row['employees_name'];
                            $leave_title = $row['leave_title'];
                            $emp_leave = $row['emp_leave'];
                            $date = $row['date'];
                            $status = $row['status'];

                            echo "<tr>
                            <td> $id</td>
                            <td>$employees_name</td>
                            <td>$leave_title</td>
                            <td>$emp_leave</td>
                            <td>$date</td>
                            <td>$status</td>
                          </tr>";
                        }

                        ?>
                        
                      </tbody>
                    </table>
                                </div>
                  </div>
                </div>
              </div>


              <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">leave status</h4>
                               <div class="table-responsive">
                               <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>employees_name</th>
                                        <th>leave_title</th>
                                        <th>emp_leave</th>
                                        <th>date</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                      <tbody>
                        <?php
                        
                        $select = "SELECT * FROM `office_leave` WHERE `status` = 'verify' AND `employees_name` = '".$_SESSION['name']['name']."'";

                        $result = mysqli_query($con, $select);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $employees_name = $row['employees_name'];
                            $leave_title = $row['leave_title'];
                            $emp_leave = $row['emp_leave'];
                            $date = $row['date'];
                            $status = $row['status'];

                            echo "<tr>
                            <td> $id</td>
                            <td>$employees_name</td>
                            <td>$leave_title</td>
                            <td>$emp_leave</td>
                            <td>$date</td>
                            <td>$status</td>
                          </tr>";
                        }

                        ?>
                        
                      </tbody>
                    </table>
                               </div>
                  </div>
                </div>
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