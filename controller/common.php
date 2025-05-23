<?php

include("../session.php");
include("../admin/include/db_config.php");


if ($_POST['cart_pro_id'] != '') {


    $check_result = mysqli_query($con, "SELECT * FROM cart WHERE pro_id='" . $_POST['cart_pro_id'] . "' AND user_id='$session_id' ");

    if (mysqli_num_rows($check_result) > 0) {

        $update = "UPDATE `cart` SET `qty`='" . $_POST['qty'] . "',`updated_on`='" . date('Y-m-d H:i:s') . "' WHERE pro_id='" . $_POST['cart_pro_id'] . "' AND user_id='$session_id' ";
        mysqli_query($con, $update);
    } else {
        $addCart = "INSERT `cart` (`user_id`, `pro_id`, `qty`, `price`, `created_on`, `updated_on`)
                           VALUES ('$session_id','" . $_POST['cart_pro_id'] . "','" . $_POST['qty'] . "','" . $_POST['price'] . "','" . date('Y-m-d H:i:s') . "','" . date('Y-m-d H:i:s') . "') ";
        mysqli_query($con, $addCart);
    }
}


if ($_POST['cart_pro_id_session'] != '') {

    $item_id = $_POST['cart_pro_id_session'];
    $qty = $_POST['qty_session'];


    $itemData = array(
        'id' => $_POST['cart_pro_id_session'],
        'qty' =>  $_POST['qty_session'],
        'price' => $_POST['price_session']
    );

    $_SESSION['cart'][$item_id] =  $itemData;
}

if ($_POST['cart_proId'] != '') {
    $delete = mysqli_query($con, "DELETE FROM `cart` WHERE `id`='" . $_POST['cart_proId'] . "'");
}

if ($_POST['qty_pro_id'] != '') {
    $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE `id`='" . $_POST['qty_pro_id'] . "'");
    $resCart = mysqli_fetch_assoc($select_cart);

    $minusQty = $resCart['qty'] - 1;

    if ($minusQty < 1) {
        $minusQty = 1;
    }

    $updateMinus = mysqli_query($con, "UPDATE `cart` SET `qty`='$minusQty' WHERE `id`='" . $_POST['qty_pro_id'] . "'");
}

if ($_POST['pro_qtyId'] != '') {
    $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE `id`='" . $_POST['pro_qtyId'] . "'");
    $resCart = mysqli_fetch_assoc($select_cart);

    $plusQty = $resCart['qty'] + 1;

    if ($minusQty < 1) {
        $minusQty = 1;
    }

    $updateMinus = mysqli_query($con, "UPDATE `cart` SET `qty`='$plusQty' WHERE `id`='" . $_POST['pro_qtyId'] . "'");
}

if ($_POST['sessionId_delete']) {

    $sessionCart = $_POST['sessionId_delete'];
    foreach ($_SESSION['cart'] as $key => $val) {
        if ($val['id'] == $sessionCart) {
            unset($_SESSION['cart'][$key]);
            exit;
        }
    }
}


if (isset($_POST['sessionId_plus'])) {

    $sessionCart_countPlus = $_POST['sessionId_plus'];

    foreach ($_SESSION['cart'] as $key => $val) {

        if ($val['id'] == $sessionCart_countPlus) {

            $_SESSION['cart'][$key]['qty'] += 1;
            exit;
        }
    }
}

if (isset($_POST['sessionId_minus'])) {

    $sessionCart_countminus = $_POST['sessionId_minus'];

    foreach ($_SESSION['cart'] as $key => $val) {

        if ($val['id'] == $sessionCart_countminus) {

            $_SESSION['cart'][$key]['qty'] -= 1;
            exit;
        }
    }
}


if (isset($_POST['prod_id_fromCart'])) {
    $prod_id = $_POST['prod_id_fromCart'];
    $prod_price = $_POST['prod_price_fromCart'];
    $user_id = $session_id;

    $checkCart = mysqli_query($con, "SELECT * FROM `cart` WHERE `user_id` = '$user_id' AND `pro_id` = '$prod_id'");

    if (mysqli_num_rows($checkCart) == 0) {

        $addCart = "INSERT INTO `cart` (`user_id`, `pro_id`, `qty`, `price`, `created_on`, `updated_on`)
                    VALUES ('$user_id', '$prod_id', 1, '$prod_price', NOW(), NOW())";
        mysqli_query($con, $addCart);
    }
}


if (isset($_POST["prod_id_fromSess"]) && isset($_POST["prod_price_fromSess"])) {

    $prodID = $_POST["prod_id_fromSess"];
    $prodPrice = $_POST["prod_price_fromSess"];

    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = [];
    }

    if (isset($_SESSION["cart"][$prodID])) {
        $_SESSION["cart"][$prodID]['qty'] += 1;
        echo "updated qty";
    } else {
        // If not in cart, add new item
        $_SESSION["cart"][$prodID] = [
            'id' => $prodID,
            'qty' => 1,
            'price' => $prodPrice
        ];
        echo "added to cart";
    }
}



if (isset($_POST["proId_wishlistUser"]) && isset($_POST["userId_wishlistUser"])) {

    $prodId = mysqli_real_escape_string($con, $_POST['proId_wishlistUser']);
    $userId = mysqli_real_escape_string($con, $_POST['userId_wishlistUser']);

    // Check if item already exists in wishlis
    $checkExist = mysqli_query($con, "SELECT * FROM `wishlist` WHERE `user_id` = '$userId' AND `prod_id` = '$prodId'");

    if (mysqli_num_rows($checkExist) > 0) {
        echo "Item already in wishlist";
    } else {


        $insertWishlist = mysqli_query($con, "INSERT INTO `wishlist` (`prod_id`, `user_id`, `created_on`)
                                              VALUES ('$prodId', '$userId', NOW())");
    }
}


if (isset($_POST["user_wishlistId"])) {

    $wishlist_id = $_POST["user_wishlistId"];

    $delete = mysqli_query($con, "DELETE FROM `wishlist` WHERE `id`='$wishlist_id'");
}


if (isset($_POST["proId_wishlistSession"])) {

    $prodID = $_POST["proId_wishlistSession"];

    if (!isset($_SESSION["wishlist"])) {
        $_SESSION["wishlist"] = [];
    }

    if (isset($_SESSION["wishlist"][$prodID])) {
        $_SESSION["wishlist"][$prodID];
        echo "updated wishlist";
    } else {
        $_SESSION["wishlist"][$prodID] = [
            'id' => $prodID
        ];
        echo "added to wishlist";
    }
}

if (isset($_POST["session_wishlistId"])) {

    $session_wishlistId = $_POST["session_wishlistId"];

    foreach ($_SESSION['wishlist'] as $key => $val) {
        if ($val['id'] == $session_wishlistId) {
            unset($_SESSION['wishlist'][$key]);
            exit;
        }
    }
}

