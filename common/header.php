<?php
include('admin/include/db_config.php');
?>
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
</head>

<body>
    <header class="header sticky-bar">
        <div class="container">
            <div class="main-header">
                <div class="header-left">
                    <div class="header-logo"><a class="d-flex" href="index.php"><img alt="Ecom" src="assets/imgs/template/logo.svg"></a></div>
                    <div class="header-search">
                        <div class="box-header-search">
                            <form class="form-search" method="post" action="#">
                                <div class="box-category">
                                    <select class="select-active select2-hidden-accessible">
                                        <option>All categories</option>
                                        <?php
                                        $result = mysqli_query($con, "SELECT * FROM `categories` ORDER BY `id`  ");

                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <option><a><?php echo $row['name'] ?></a> </option>
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
                                        $result = mysqli_query($con, "SELECT * FROM `categories` ORDER BY `id`  ");

                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <li><a href="catogery-product.php?$cat_id=<?php echo $row['id'] ?>"><?php echo $row['name']; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li class="has-children"><a href="shop-grid-2.php">Shop</a>
                                    <ul class="sub-menu two-col">
                                        <li><a href="single-product.php">Single Product </a></li>
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
                        <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
                    </div>
                    <div class="header-shop">
                        <div class="d-inline-block box-dropdown-cart"><span class="font-lg icon-list icon-account"><span>Account</span></span>
                            <div class="dropdown-account">
                                <ul>
                                    <li><a href="page-account.php">My Account</a></li>
                                    <li><a href="page-account.php">Order Tracking</a></li>
                                    <li><a href="page-account.php">My Orders</a></li>
                                    <li><a href="page-account.php">My Wishlist</a></li>
                                    <li><a href="page-account.php">Setting</a></li>
                                    <li><a href="page-login.php">Sign out</a></li>
                                </ul>
                            </div>
                        </div><a class="font-lg icon-list icon-wishlist" href="shop-wishlist.php"><span>Wishlist</span><span class="number-item font-xs">5</span></a>
                        <div class="d-inline-block box-dropdown-cart"><span class="font-lg icon-list icon-cart"><span>Cart</span><span class="number-item font-xs">2</span></span>
                            <div class="dropdown-cart">
                                <div class="item-cart mb-20">
                                    <div class="cart-image"><img src="assets/imgs/page/homepage1/imgsp5.png" alt="Ecom"></div>
                                    <div class="cart-info"><a class="font-sm-bold color-brand-3" href="single-product.php">2022 Apple iMac with Retina 5K Display 8GB RAM, 256GB SSD</a>
                                        <p><span class="color-brand-2 font-sm-bold">1 x $2856.4</span></p>
                                    </div>
                                </div>
                                <div class="item-cart mb-20">
                                    <div class="cart-image"><img src="assets/imgs/page/homepage1/imgsp4.png" alt="Ecom"></div>
                                    <div class="cart-info"><a class="font-sm-bold color-brand-3" href="single-product.php">2022 Apple iMac with Retina 5K Display 8GB RAM, 256GB SSD</a>
                                        <p><span class="color-brand-2 font-sm-bold">1 x $2856.4</span></p>
                                    </div>
                                </div>
                                <div class="border-bottom pt-0 mb-15"></div>
                                <div class="cart-total">
                                    <div class="row">
                                        <div class="col-6 text-start"><span class="font-md-bold color-brand-3">Total</span></div>
                                        <div class="col-6"><span class="font-md-bold color-brand-1">$2586.3</span></div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-6 text-start"><a class="btn btn-cart w-auto" href="shop-cart.php">View cart</a></div>
                                        <div class="col-6"><a class="btn btn-buy w-auto" href="shop-checkout.php">Checkout</a></div>
                                    </div>
                                </div>
                            </div>
                        </div><a class="font-lg icon-list icon-compare" href="shop-compare.php"><span>Compare</span></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="sidebar-left"><a class="btn btn-open" href="#"></a>
        <ul class="menu-icons hidden">
            <li><a href="javascript:void(0)"><img src="assets/imgs/template/monitor.svg" alt="Ecom"></a></li>
            <li><a href="javascript:void(0)"><img src="assets/imgs/template/mobile.svg" alt="Ecom"></a></li>
            <li><a href="#"><img src="assets/imgs/template/game.svg" alt="Ecom"></a></li>
            <li><a href="#"><img src="assets/imgs/template/clock.svg" alt="Ecom"></a></li>
            <li><a href="#"><img src="assets/imgs/template/airpod.svg" alt="Ecom"></a></li>
            <li><a href="#"><img src="assets/imgs/template/airpods.svg" alt="Ecom"></a></li>
            <li><a href="#"><img src="assets/imgs/template/mouse.svg" alt="Ecom"></a></li>
            <li><a href="#"><img src="assets/imgs/template/music-play.svg" alt="Ecom"></a></li>
            <li><a href="#"><img src="assets/imgs/template/bluetooth.svg" alt="Ecom"></a></li>
            <li><a href="#"><img src="assets/imgs/template/clound.svg" alt="Ecom"></a></li>
            <li><a href="#"><img src="assets/imgs/template/electricity.svg" alt="Ecom"></a></li>
            <li><a href="#"><img src="assets/imgs/template/cpu.svg" alt="Ecom"></a></li>
            <li><a href="#"><img src="assets/imgs/template/devices.svg" alt="Ecom"></a></li>
            <li><a href="#"><img src="assets/imgs/template/driver.svg" alt="Ecom"></a></li>
            <li><a href="#"><img src="assets/imgs/template/lamp.svg" alt="Ecom"></a></li>
        </ul>
        <ul class="menu-texts menu-close">
            <li class="has-children"><a href="shop-grid-2.php"><span class="img-link"><img src="assets/imgs/template/monitor.svg" alt="Ecom"></span><span class="text-link">Computers &amp; Accessories</span></a>
                <ul class="sub-menu">
                    <li><a href="shop-grid-2.php">Computer Accessories</a></li>
                    <li><a href="shop-grid-2.php">Computer Cases</a></li>
                    <li><a href="shop-grid-2.php">Laptop</a></li>
                    <li><a href="shop-grid-2.php">HDD</a></li>
                    <li><a href="shop-grid-2.php">RAM</a></li>
                    <li><a href="shop-grid-2.php">Headphone</a></li>
                </ul>
            </li>
            <li class="has-children"><a href="#"><span class="img-link"><img src="assets/imgs/template/mobile.svg" alt="Ecom"></span><span class="text-link">Cell Phones</span></a>
                <ul class="sub-menu">
                    <li><a href="shop-grid-2.php">Phone Accessories</a></li>
                    <li><a href="shop-grid-2.php">Phone Cases</a></li>
                    <li><a href="shop-grid-2.php">Postpaid Phones</a></li>
                    <li><a href="shop-grid-2.php">Unlocked Phones</a></li>
                    <li><a href="shop-grid-2.php">Prepaid Phones</a></li>
                    <li><a href="shop-grid-2.php">Prepaid Plans</a></li>
                    <li><a href="shop-grid-2.php">Refurbished Phones</a></li>
                    <li><a href="shop-grid-2.php">Straight Talk</a></li>
                    <li><a href="shop-grid-2.php">iPhone</a></li>
                    <li><a href="shop-grid-2.php">Samsung Galaxy</a></li>
                    <li><a href="shop-grid-2.php">Samsung Galaxy</a></li>
                    <li><a href="shop-grid-2.php">Samsung Galaxy</a></li>
                    <li><a href="shop-grid-2.php">Samsung Galaxy</a></li>
                    <li><a href="shop-grid-2.php">Samsung Galaxy</a></li>
                </ul>
            </li>
            <li class="has-children"><a href="shop-grid-2.php"><span class="img-link"><img src="assets/imgs/template/game.svg" alt="Ecom"></span><span class="text-link">Gaming Gatgets</span></a>
                <ul class="sub-menu">
                    <li><a href="shop-grid-2.php">Wireless Routers</a></li>
                    <li><a href="shop-grid-2.php">Cool New Gadgets</a></li>
                    <li><a href="shop-grid-2.php">Tech and Gadgets</a></li>
                    <li><a href="shop-grid-2.php">Geek Gifts and Gadgets</a></li>
                    <li><a href="shop-grid-2.php">Xbox Accessories</a></li>
                    <li><a href="shop-grid-2.php">PlayStation Accessories</a></li>
                </ul>
            </li>
            <li class="has-children"><a href="shop-grid-2.php"><span class="img-link"><img src="assets/imgs/template/clock.svg" alt="Ecom"></span><span class="text-link">Smart watches</span></a>
                <ul class="sub-menu">
                    <li><a href="shop-grid-2.php">Smart Watches</a></li>
                    <li><a href="shop-grid-2.php">Fashion Smart Watches</a></li>
                    <li><a href="shop-grid-2.php">Smart Bracelets</a></li>
                    <li><a href="shop-grid-2.php">Pocket Watches</a></li>
                    <li><a href="shop-grid-2.php">Smart Rings</a></li>
                    <li><a href="shop-grid-2.php">Other Watches</a></li>
                </ul>
            </li>
            <li class="has-children"><a href="shop-grid-2.php"><span class="img-link"><img src="assets/imgs/template/airpods.svg" alt="Ecom"></span><span class="text-link">Wired Headphone</span></a>
                <ul class="sub-menu">
                    <li><a href="shop-grid-2.php">On-Ear Headphones</a></li>
                    <li><a href="shop-grid-2.php">Earbud & In-Ear</a></li>
                    <li><a href="shop-grid-2.php">DJ Headphones</a></li>
                    <li><a href="shop-grid-2.php">PC Accessories</a></li>
                    <li><a href="shop-grid-2.php">PC Game Headsets</a></li>
                </ul>
            </li>
            <li class="has-children"><a href="shop-grid-2.php"><span class="img-link"><img src="assets/imgs/template/mouse.svg" alt="Ecom"></span><span class="text-link">Mouse &amp; Keyboard</span></a>
                <ul class="sub-menu">
                    <li><a href="shop-grid-2.php">Logitech</a></li>
                    <li><a href="shop-grid-2.php">Redragon</a></li>
                    <li><a href="shop-grid-2.php">Amazon Basics</a></li>
                    <li><a href="shop-grid-2.php">Microsoft</a></li>
                    <li><a href="shop-grid-2.php">MageGee</a></li>
                </ul>
            </li>
            <li class="has-children"><a href="shop-grid-2.php"><span class="img-link"><img src="assets/imgs/template/music-play.svg" alt="Ecom"></span><span class="text-link">Headphone</span></a>
                <ul class="sub-menu">
                    <li><a href="shop-grid-2.php">Car Audio Systems</a></li>
                    <li><a href="shop-grid-2.php">Cellphones</a></li>
                    <li><a href="shop-grid-2.php">Desktops</a></li>
                    <li><a href="shop-grid-2.php">Gaming Consoles</a></li>
                    <li><a href="shop-grid-2.php">Telephones</a></li>
                </ul>
            </li>
            <li class="has-children"><a href="shop-grid-2.php"><span class="img-link"><img src="assets/imgs/template/bluetooth.svg" alt="Ecom"></span><span class="text-link">Bluetooth devices</span></a>
                <ul class="sub-menu">
                    <li><a href="shop-grid-2.php">Player Accessories</a></li>
                    <li><a href="shop-grid-2.php">Computer Accessories</a></li>
                    <li><a href="shop-grid-2.php">Speakers & Audio</a></li>
                    <li><a href="shop-grid-2.php">Computer Networking</a></li>
                    <li><a href="shop-grid-2.php">Movies & Films</a></li>
                </ul>
            </li>
            <li class="has-children"><a href="shop-grid-2.php"><span class="img-link"><img src="assets/imgs/template/clound.svg" alt="Ecom"></span><span class="text-link">Cloud Software</span></a>
                <ul class="sub-menu">
                    <li><a href="shop-grid-2.php">Android</a></li>
                    <li><a href="shop-grid-2.php">Linux & Unix</a></li>
                    <li><a href="shop-grid-2.php">Macintosh</a></li>
                    <li><a href="shop-grid-2.php">Windows</a></li>
                    <li><a href="shop-grid-2.php">iPhone & iOS</a></li>
                </ul>
            </li>
            <li class="has-children"><a href="shop-grid-2.php"><span class="img-link"><img src="assets/imgs/template/electricity.svg" alt="Ecom"></span><span class="text-link">Electric accessories</span></a>
                <ul class="sub-menu">
                    <li><a href="shop-grid-2.php">Antenna Toppers</a></li>
                    <li><a href="shop-grid-2.php">Automotive Body Armor</a></li>
                    <li><a href="shop-grid-2.php">Power Inverter</a></li>
                    <li><a href="shop-grid-2.php">Gas Tank Doors</a></li>
                    <li><a href="shop-grid-2.php">Hood Scoops & Vents</a></li>
                </ul>
            </li>
            <li class="has-children"><a href="shop-grid-2.php"><span class="img-link"><img src="assets/imgs/template/cpu.svg" alt="Ecom"></span><span class="text-link">Mainboard &amp; CPU</span></a>
                <ul class="sub-menu">
                    <li><a href="shop-grid-2.php">Computer CPU Processors</a></li>
                    <li><a href="shop-grid-2.php">Internal Fans & Cooling</a></li>
                    <li><a href="shop-grid-2.php">Graphics Cards</a></li>
                    <li><a href="shop-grid-2.php">Network I/O Port Cards</a></li>
                    <li><a href="shop-grid-2.php">Internal Memory Card</a></li>
                </ul>
            </li>
            <li class="has-children"><a href="shop-grid-2.php"><span class="img-link"><img src="assets/imgs/template/devices.svg" alt="Ecom"></span><span class="text-link">Desktop PC</span></a>
                <ul class="sub-menu">
                    <li><a href="shop-grid-2.php">Graphic PC</a></li>
                    <li><a href="shop-grid-2.php">Office PC</a></li>
                    <li><a href="shop-grid-2.php">Gaming PC</a></li>
                    <li><a href="shop-grid-2.php">Server</a></li>
                </ul>
            </li>
            <li class="has-children"><a href="shop-grid-2.php"><span class="img-link"><img src="assets/imgs/template/driver.svg" alt="Ecom"></span><span class="text-link">Speaker</span></a>
                <ul class="sub-menu">
                    <li><a href="shop-grid-2.php">JBL</a></li>
                    <li><a href="shop-grid-2.php">Anker</a></li>
                    <li><a href="shop-grid-2.php">Pyle</a></li>
                    <li><a href="shop-grid-2.php">Bose</a></li>
                    <li><a href="shop-grid-2.php">Logitech</a></li>
                </ul>
            </li>
            <li class="has-children"><a href="shop-grid-2.php"><span class="img-link"><img src="assets/imgs/template/airpod.svg" alt="Ecom"></span><span class="text-link">Bluetooth Headphone</span></a>
                <ul class="sub-menu">
                    <li><a href="shop-grid-2.php">On-Ear Headphones</a></li>
                    <li><a href="shop-grid-2.php">In-Ear Headphones</a></li>
                    <li><a href="shop-grid-2.php">Earbud</a></li>
                    <li><a href="shop-grid-2.php">Over-Ear Headphones</a></li>
                    <li><a href="shop-grid-2.php">Other</a></li>
                </ul>
            </li>
            <li class="has-children"><a href="shop-grid-2.php"><span class="img-link"><img src="assets/imgs/template/lamp.svg" alt="Ecom"></span><span class="text-link">Computer Decor</span></a>
                <ul class="sub-menu">
                    <li><a href="shop-grid-2.php">Copyholders</a></li>
                    <li><a href="shop-grid-2.php">Office Bookends</a></li>
                    <li><a href="shop-grid-2.php">Business Card Holders</a></li>
                    <li><a href="shop-grid-2.php">Lap Desks</a></li>
                    <li><a href="shop-grid-2.php">Mouse Pads</a></li>
                </ul>
            </li>
        </ul>
    </div>