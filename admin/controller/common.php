<?php
include("../session.php");
include("../include/db_config.php");

if ($_POST['catId'] != '') {

    $delet = " DELETE FROM `categories` WHERE id='" . $_POST['catId'] . "'";
    mysqli_query($con, $delet);
}
if ($_POST["activate_cato_id"] != '') {

    $sql = "UPDATE `categories` SET `status`='" . $_POST['cato_value'] . "',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE id='" . $_POST["activate_cato_id"] . "'";
    mysqli_query($con, $sql);
}
if ($_POST['prodId'] != '') {
    $delete = "DELETE FROM `product` WHERE id='" . $_POST['prodId'] . "'";
    mysqli_query($con, $delete);
}
if ($_POST['active_status_id'] != '') {
    $status = " UPDATE `product` SET `status`= '" . $_POST['status_value'] . "' , `updated_on` ='" . date("Y-m-d H:i:s") . "' WHERE id = '" . $_POST['active_status_id'] . "' ";
    mysqli_query($con, $status);
}

if (isset($_POST['featureId'])) {

    $updateFeature = mysqli_query($con, "UPDATE `product` SET `featured` ='" . $_POST['featureValue'] . "' WHERE `id` = '" . $_POST['featureId'] . "'");
}
