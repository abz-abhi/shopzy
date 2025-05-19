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

            $selectCart = mysqli_query($con, "SELECT * FROM `cart` WHERE `pro_id` = '" . $value['id'] . "' AND `user_id` = '$session_id' ");

            if (mysqli_fetch_assoc($selectCart) == '') {

                $addCart = "INSERT INTO `cart` (`user_id`, `pro_id`, `qty`, `price`, `created_on`, `updated_on`)
                        VALUES ('$session_id', '" . $value['id'] . "', '" . $value['qty'] . "', '" . $value['price'] . "', '" . date('Y-m-d H:i:s') . "', '" . date('Y-m-d H:i:s') . "')";

                mysqli_query($con, $addCart);
            }
        }

        unset($_SESSION['cart']);
    }


    if (isset($_SESSION['wishlist']) && !empty($_SESSION['wishlist'])) {

        $session_wishlist = $_SESSION['wishlist'];

        foreach ($session_wishlist as $key => $value) {

            $prod_id = mysqli_real_escape_string($con, $value['id']);
            $user_id = mysqli_real_escape_string($con, $session_id);

            $checkQuery = "SELECT * FROM `wishlist` WHERE `prod_id` = '$prod_id' AND `user_id` = '$user_id'";
            $selectwishlist = mysqli_query($con, $checkQuery);

            if (mysqli_num_rows($selectwishlist) == 0) {
                $created_on = date('Y-m-d H:i:s');
                $addQuery = "INSERT INTO `wishlist` (`prod_id`, `user_id`, `created_on`)
                         VALUES ('$prod_id', '$user_id', '$created_on')";
                mysqli_query($con, $addQuery);
            }
        }

        unset($_SESSION['wishlist']);
    }
}
