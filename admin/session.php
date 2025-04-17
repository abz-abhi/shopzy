<?php
session_start();

if(isset($_SESSION["user_id"])){

}else{
    echo "<script>window.location.href='index.php';</script>";
}

?>