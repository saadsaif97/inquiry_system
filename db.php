<?php
$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "vtech";
$con = mysqli_connect($host, $db_user, $db_pass, $db_name);
if (!$con) {
    die("database not connected" . mysqli_error($con));
}
