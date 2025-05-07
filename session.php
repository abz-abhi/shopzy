<?php
//error_reporting(0);
session_start();
$session_id ="";

include('admin/include/db_config.php');




if (isset($_SESSION["user_id"])) {

    $session_id = $_SESSION['user_id'];
    $result = mysqli_query($con, "SELECT * FROM `users` WHERE `id`='$session_id'");
    $row_user = mysqli_fetch_assoc($result);





    
} else {
   
    
}
