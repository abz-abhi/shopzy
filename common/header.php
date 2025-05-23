<?php include('session.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/template/favicon.svg">
    <link href="./assets/css/style.css?v=3.0.0" rel="stylesheet">
    <title>Shopzy</title>
    <style>
        .description-clamp {
            display: -webkit-box;
            -webkit-line-clamp: 4;
            /* Number of lines to show */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            max-height: 6em;
            /* Optional: helps with consistent layout */
        }
    </style>
</head>

<body>
    <header class="header sticky-bar" id="cartCount">
        <div class="container">
            <div class="main-header">
                <div class="header-left">
                    <div class="header-logo"><a class="d-flex" href="index.php"><img alt="Ecom" src="assets/imgs/template/logo.svg"></a></div>
                    <div class="header-search">
                        <div class="box-header-search">
                            <form class="form-search" method="post" action="">
                                <div class="box-category">
                                    <select class="select-active select2-hidden-accessible">
                                        <option>All categories</option>
                                        <?php
                                        $result = mysqli_query($con, "SELECT * FROM categories ORDER BY id") or die(mysqli_error($con));

                                        while ($rowAllcat = mysqli_fetch_assoc($result)) { ?>

                                            <option value="<?php $rowAllcat['id'] ?>"><?php echo $rowAllcat['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="box-keysearch">
                                    <input class="form-control font-xs" type="text" value="" placeholder="Search for items">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="header-nav">
                        <nav class="nav-main-menu d-none d-xl-block">
                            <ul class="main-menu">
                                <li class="has-children"><a class="active" href="index.php">Categories</a>
                                    <ul class="sub-menu two-col">
                                        <?php
                                        $result = mysqli_query($con, "SELECT * FROM `categories` ORDER BY `id`") or die(mysqli_error($con));

                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <li><a href="catogery-product.php?$cat_id=<?php echo $row['id'] ?>"><?php echo $row['name']; ?></a></li>
                                        <?php  } ?>
                                    </ul>
                                </li>
                                <li class="has-children"><a>Shop</a>
                                    <ul class="sub-menu two-col">
                                        <li><a href="shop-cart.php">Shop Cart</a></li>
                                        <li><a href="shop-compare.php">Shop Compare</a></li>
                                        <li><a href="shop-wishlist.php">Shop Wishlist</a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href="#">Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="page-register.php">Register</a></li>
                                        <li><a href="page-login.php">Login</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <span> Welcome <?php if (isset($_SESSION['user_id'])) {
                                        echo $row_user['user_name'];
                                    } else {
                                        echo 'Guest';
                                    } ?></span>


                    <div class="header-shop">
                        <?php if (isset($_SESSION['user_id'])) { ?>
                            <div class="d-inline-block box-dropdown-cart"><span class="font-lg icon-list icon-account"><span>Account</span></span>
                                <div class="dropdown-account">
                                    <ul>
                                        <li><a href="page-account.php">My Account</a></li>
                                        <li><a href="order-track.php">Order Tracking</a></li>
                                        <li><a href="order.php">My Orders</a></li>
                                        <li><a href="shop-wishlist.php">My Wishlist</a></li>
                                        <li><a href="logout.php">Sign out</a></li>
                                    </ul>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="d-inline-block box-dropdown-cart"><span class="font-lg icon-list icon-account"><span>Account</span></span>
                                <div class="dropdown-account">
                                    <ul>
                                        <li><a href="page-register.php">Register</a></li>
                                        <li><a href="page-login.php">Login</a></li>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if (isset($_SESSION['user_id'])) {

                            $user_id = $_SESSION['user_id'];

                            $selectWish_count = mysqli_query($con, "SELECT * FROM `wishlist` WHERE `user_id` = '$user_id'");

                            if (mysqli_num_rows($selectWish_count) > 0) {
                                $wishlist_count = mysqli_num_rows($selectWish_count);
                            } else {
                                $wishlist_count = 0;
                            }

                        ?>

                            <a class="font-lg icon-list icon-wishlist" href="shop-wishlist.php">
                                <span>Wishlist</span>
                                <span class="number-item font-xs"><?php echo $wishlist_count ?></span>
                            </a>

                            <?php



                            $check_result = mysqli_query($con, "SELECT * FROM cart WHERE  user_id='$session_id' ");

                            if (mysqli_num_rows($check_result) > 0) {
                                $cart_count = mysqli_num_rows($check_result);
                            } else {
                                $cart_count = 0;
                            } ?>

                            <div class="d-inline-block box-dropdown-cart">
                                <span class="font-lg icon-list icon-cart">
                                    <span>Cart</span>
                                    <span class="number-item font-xs"><?php echo $cart_count; ?></span>
                                </span>
                                <div class="dropdown-cart" style=" max-height: 25rem; 
                                                                   overflow-y: auto; 
                                                                   overflow-x: hidden;  
                                                                   padding-right: 10px; 
                                                                   scroll-behavior: smooth; ">


                                    <?php

                                    if (mysqli_num_rows($check_result) > 0) {

                                        $total_cart_amt = 0;

                                        while ($row_cart_item = mysqli_fetch_assoc($check_result)) {

                                            $result_cartproduct = mysqli_query($con, "SELECT * FROM product WHERE id='" . $row_cart_item['pro_id'] . "'");
                                            $row_cartproduct = mysqli_fetch_assoc($result_cartproduct);

                                    ?>

                                            <div class="item-cart mb-20">
                                                <div class="cart-image"><img src="admin/<?php echo $row_cartproduct['image']; ?>" alt="Ecom"></div>
                                                <div class="cart-info"><a class="font-sm-bold color-brand-3" href="single-product.php"><?php echo $row_cartproduct['name']; ?></a>
                                                    <p><span class="color-brand-2 font-sm-bold"><?php echo $row_cart_item['qty'];  ?> x $<?php echo $row_cart_item['price'];  ?></span></p>
                                                </div>
                                            </div>


                                        <?php
                                            $singletotal =    ($row_cart_item['qty'] * $row_cart_item['price']);

                                            $total_cart_amt = ($total_cart_amt + $singletotal);
                                        } ?>

                                        <div class="border-bottom pt-0 mb-15"></div>
                                        <div class="cart-total">
                                            <div class="row">
                                                <div class="col-6 text-start"><span class="font-md-bold color-brand-3">Total</span></div>
                                                <div class="col-6"><span class="font-md-bold color-brand-1">$<?php echo $total_cart_amt; ?></span></div>
                                            </div>
                                            <div class="row mt-15">
                                                <div class="col-6 text-start"><a class="btn btn-cart w-auto" href="shop-cart.php">View cart</a></div>
                                            </div>
                                        </div>
                                    <?php } else {

                                        echo '<p> No item in cart </p>';
                                    } ?>




                                </div>
                            </div>
                        <?php } else { ?>
                            <?php

                            $session_cart = $_SESSION['cart'] ?? [];
                            $session_wishlist = $_SESSION['wishlist'] ?? [];


                            ?>

                            <a class="font-lg icon-list icon-wishlist" href="shop-wishlist.php">
                                <span>Wishlist</span>
                                <span class="number-item font-xs">
                                    <?php echo isset($session_wishlist) && count($session_wishlist) > 0 ? count($session_wishlist) : 0; ?></span>
                            </a>



                            <div class="d-inline-block box-dropdown-cart">
                                <span class="font-lg icon-list icon-cart">
                                    <span>Cart</span>
                                    <span class="number-item font-xs">
                                        <?php echo isset($session_cart) && count($session_cart) > 0 ? count($session_cart) : 0; ?>
                                    </span>
                                </span>

                                <div class="dropdown-cart" style=" max-height: 25rem; 
                                                                   overflow-y: auto; 
                                                                   overflow-x: hidden;  
                                                                   padding-right: 10px; 
                                                                   scroll-behavior: smooth; ">

                                    <?php if (isset($_SESSION['cart'])) { ?>

                                        <?php
                                        $total_cart_amt = 0;
                                        foreach ($session_cart as $key => $value) {

                                            $result_cartproduct = mysqli_query($con, "SELECT * FROM product WHERE id='" . $value['id'] . "'");
                                            $row_cartproduct = mysqli_fetch_assoc($result_cartproduct);

                                        ?>
                                            <div class="item-cart mb-20">
                                                <div class="cart-image">
                                                    <img src="admin/<?php echo $row_cartproduct['image']; ?>" alt="Ecom">
                                                </div>
                                                <div class="cart-info"><a class="font-sm-bold color-brand-3" href="single-product.php"><?php echo $row_cartproduct['name']; ?></a>
                                                    <p><span class="color-brand-2 font-sm-bold"><?php echo $value['qty'];  ?> x $<?php echo $value['price'];  ?></span></p>
                                                </div>
                                            </div>

                                        <?php $singletotal =    ($value['qty'] * $value['price']);

                                            $total_cart_amt = ($total_cart_amt + $singletotal);
                                        } ?>

                                        <div class="border-bottom pt-0 mb-15"></div>
                                        <div class="cart-total">
                                            <div class="row">
                                                <div class="col-6 text-start"><span class="font-md-bold color-brand-3">Total</span></div>
                                                <div class="col-6"><span class="font-md-bold color-brand-1">$<?php echo $total_cart_amt; ?></span></div>
                                            </div>
                                            <div class="row mt-15">
                                                <div class="col-6 text-start"><a class="btn btn-cart w-auto" href="shop-cart.php">View cart</a></div>
                                            </div>
                                        </div>


                                    <?php } else {
                                        echo 'No iteam in cart';
                                    } ?>

                                </div>
                            </div>



                        <?php }
                        ?>


                        <a class="font-lg icon-list icon-compare" href="shop-compare.php"><span>Compare</span></a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--     
    <script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendors/wow.js"></script>
    <script src="assets/js/vendors/select2.min.js"></script>
    <script src="assets/js/vendors/scrollup.js"></script>
    <script src="assets/js/main.js?v=3.0.0"></script> -->