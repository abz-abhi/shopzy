<?php
// error_reporting(0);
session_start();
$session_id = "";

include('admin/include/db_config.php');




if (isset($_SESSION["user_id"])) {

    $session_id = $_SESSION['user_id'];
    $result = mysqli_query($con, "SELECT * FROM `users` WHERE `id`='$session_id'");
    $row_user = mysqli_fetch_assoc($result);

    if (isset($_SESSION['cart'])) {
        $session_cart = $_SESSION['cart'];
        foreach ($session_cart as $key => $value) {

            // $result_cartproduct = mysqli_query($con, "SELECT * FROM product WHERE id='" . $value['id'] . "'");
            // $row_cartproduct = mysqli_fetch_assoc($result_cartproduct);
            $addCart = "INSERT `cart` (`user_id`, `pro_id`, `qty`, `price`, `created_on`, `updated_on`)
            VALUES ('$session_id','" . $value['id'] . "','" . $value['qty'] . "','" . $value['price'] . "','" . date('Y-m-d H:i:s') . "','" . date('Y-m-d H:i:s') . "') ";
            mysqli_query($con, $addCart);
        }

        unset($_SESSION['cart']);
    }
} else {
}
