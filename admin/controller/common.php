<?php
include("../session.php");
include("../include/db_config.php");

if ($_POST['id'] != '') {

    $delet = "DELETE FROM `categories` WHERE id='" . $_POST['id'] . "'";
    mysqli_query($con, $delet);
}
if ($_POST["activate_user_id"] != '') {

    $sql = "UPDATE `categories` SET `status`='" . $_POST['value'] . "',`updated_on`='" . date("Y-m-d H:i:s") . "' WHERE id='" . $_POST["activate_user_id"] . "'";
    mysqli_query($con, $sql);
}
