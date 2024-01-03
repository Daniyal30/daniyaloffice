<?php

include('../includes/connect.php');

$id = $_GET['id'];

$update = "UPDATE `office_leave` SET `status` = 'verify' WHERE id = '$id'";

$result = mysqli_query($con, $update);

header("Location: leave_application.php");


?>