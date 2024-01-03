<?php

include('../includes/connect.php');


$id =  $_GET['id'];

$delete = "DELETE FROM `employees` WHERE id = '$id'";

$result = mysqli_query($con, $delete);

if ($result) {
    header('Location:employee.php');
}

?>