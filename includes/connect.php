<?php

$con = new mysqli("localhost", 'root', '', 'office_mangement');

if (!$con) {
    die(mysqli_error($con));
}


?>