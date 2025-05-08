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
