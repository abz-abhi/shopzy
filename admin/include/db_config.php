<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "shopzy";

$con = mysqli_connect($hostname, $username, $password, $database);

if (mysqli_connect_errno()) {
    echo "connection faild" . mysqli_connect_error();
}
