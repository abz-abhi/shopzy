<?php
include('session.php');
include('common/header.php');

?>
<main class="main">
    <!-- Banner 1  -->
    <section class="section-box" style="margin-top: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-20">
                    <div class="block-sale-2 circle-1">
                        <div class="row height-100">
                            <div class="col-lg-7 col-md-7 col-sm-7 col-12 height-100 align-items-center d-flex">
                                <div class="box-sale"><span class="font-sm color-brand-3">Latest Books</span>
                                    <h4 class="mt-5 mb-10">Exclusive Offers</h4>
                                    <p class="color-brand-3 font-sm mb-5">Let’s change thinks<br>with inspire books</p><a class="btn btn-arrow" href="#">Shop Now</a>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-12 height-100 align-items-end d-flex"><img src="assets/imgs/page/homepage8/sale1.png" alt="Ecom"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-20">
                    <div class="block-sale-2 bg-4 circle-2">
                        <div class="row height-100">
                            <div class="col-lg-6 col-md-7 col-sm-7 col-12 height-100 align-items-center d-flex">
                                <div class="box-sale"><span class="font-sm color-brand-3">Best collection</span>
                                    <h4 class="mt-5 mb-10">Get up to 20% discount</h4>
                                    <p class="color-brand-3 font-sm mb-5">Only this week</p><a class="btn btn-arrow" href="#">Shop Now</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-5 col-sm-5 col-12 height-100 align-items-end d-flex"><img src="assets/imgs/page/homepage8/sale2.png" alt="Ecom"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-20">
                    <div class="block-sale-2 bg-10 circle-3">
                        <div class="row height-100">
                            <div class="col-lg-6 col-md-7 col-sm-7 col-12 height-100 align-items-center d-flex">
                                <div class="box-sale"><span class="font-sm color-brand-3">Off the month</span>
                                    <h4 class="mt-5 mb-10">Professional Books</h4>
                                    <p class="color-brand-3 font-sm mb-5">Flat 50% discount</p><a class="btn btn-arrow" href="#">Shop Now</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-5 col-sm-5 col-12 height-100 align-items-end d-flex"><img src="assets/imgs/page/homepage8/sale3.png" alt="Ecom"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest deals   -->
    <section class="section-box pt-30">
        <div class="container">
            <div class="head-main bd-gray-200">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="mb-5">Latest Deals</h3>
                        <p class="font-base color-gray-500">Special products in this month.</p>
                    </div>
                    <div class="col-lg-6 text-end">
                        <div class="box-all-hurry">
                            <div class="d-inline-block box-text-hurryup"><span class="font-md-bold color-gray-900">Hurry up!</span><br><span class="font-xs color-gray-500">Offers end in:</span></div>
                            <div class="box-count box-count-square hide-period">
                                <div class="deals-countdown" data-countdown="2023/08/25 00:00:00"></div>
                            </div><a class="btn btn-view-all font-md-bold" href="single-product.php">View All</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="list-products-5 list-brand-2">

                        <?php
                        $result = mysqli_query($con, "SELECT * FROM `product` WHERE `categorie_id` ='" . $_GET['$cat_id'] . "'  ");
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                                <div class="card-grid-style-3 card-style-full-image">
                                    <div class="card-grid-inner">
                                        <div class="tools">
                                            <a class="btn btn-wishlist btn-tooltip mb-10" href="shop-wishlist.php" aria-label="Add To Wishlist"></a>
                                            <a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.php" aria-label="Compare"></a>
                                        </div>
                                        <div class="image-box">
                                            <span class="label bg-brand-2">-17%</span>
                                            <a href="single-product.php?prod_id=<?php echo $row['id']; ?>&cat_id=<?php echo $row['categorie_id']; ?>">
                                                <img src="admin/<?php echo $row['image']; ?>" alt="Ecom">
                                            </a>

                                        </div>
                                        <div class="info-right">
                                            <div class="row">
                                                <div class="col-6"> <span class="font-xs color-gray-500"><?php echo $row['name']; ?></span></div>
                                                <div class="col-6 text-end">
                                                    <div class="rating">
                                                        <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                                                        <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                                                        <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                                                        <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                                                        <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                                                        <span class="font-xs color-gray-500">(65)</span>
                                                    </div>
                                                </div>
                                            </div><a class="color-brand-3 font-sm-bold" href="single-product.php"><?php echo $row['discription']; ?></a>
                                            <div class="price-info"><strong class="font-lg-bold color-brand-2 price-main"><?php echo $row['selling_price']; ?></strong>
                                                <span class="color-gray-500 price-line"><?php echo $row['mrp']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php  }
                        } else {
                            echo "<p>No products found in this category.</p>";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner 2  -->
    <div class="section-box mt-30 mb-50">
        <div class="container">
            <div class="box-ads-2 box-ads-3"> <img src="assets/imgs/page/homepage8/ads1.png" alt="Ecom">
                <div class="ads-info">
                    <h6 class="color-white mb-5">Best Book Colletion</h6>
                    <h3 class="color-white mb-15">Let’s Change Things Inspire Book</h3><a class="btn btn-brand-2 btn-arrow-right">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Selling Books -->
    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="head-main">
                        <h3 class="mb-5">Top Selling Items</h3>
                        <p class="font-base color-gray-500">Special products in this month.</p>
                        <div class="box-button-slider">
                            <div class="swiper-button-next swiper-button-next-group-1"></div>
                            <div class="swiper-button-prev swiper-button-prev-group-1"></div>
                        </div>
                    </div>
                    <div class="box-swiper">
                        <div class="swiper-container swiper-group-1 style-label-right">
                            <div class="swiper-wrapper pt-5">
                                <div class="swiper-slide">
                                    <div class="row">
                                        <?php
                                        $result = mysqli_query($con, "SELECT * FROM `product` WHERE `categorie_id` ='" . $_GET['$cat_id'] . "' LIMIT 9  ");
                                        if ($result && mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>

                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="card-grid-style-2">
                                                        <label class="label font-xs color-gray-500 bg-success">New</label>
                                                        <div class="image-box">
                                                            <a href="single-product.php?prod_id=<?php echo $row['id']; ?>&cat_id=<?php echo $row['categorie_id']; ?>">
                                                                <img src="admin/<?php echo $row['image']; ?>" alt="Ecom"></a>
                                                        </div>
                                                        <div class="info-right">
                                                            <span class="font-xs color-gray-500"><?php echo $row['name']; ?></span><br>
                                                            <a class="color-brand-3 font-sm-bold description-clamp" href="single-product.php?prod_id=<?php echo $row['id']; ?>&cat_id=<?php echo $row['categorie_id']; ?>"><?php echo $row['discription']; ?></a>
                                                            <div class="rating">
                                                                <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                                                                <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                                                                <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                                                                <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                                                                <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                                                                <span class="font-xs color-gray-500">(65)</span>
                                                            </div>
                                                            <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main"><?php echo $row['selling_price']; ?></strong>
                                                                <span class="color-gray-500 price-line"><?php echo $row['mrp']; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php }
                                        } else {
                                            echo "<p>No products found in this category.</p>";
                                        } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner 3  -->
    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-20">
                    <div class="block-sale-3">
                        <div class="row height-100">
                            <div class="col-lg-5 col-md-6 col-sm-6 col-12 height-100 align-items-center d-flex">
                                <div class="box-sale"><span class="font-sm color-brand-3">Latest Books</span>
                                    <h4 class="mt-5 mb-5">Exclusive Offers</h4>
                                    <p class="color-brand-3 font-sm mb-5">Nullam diam tellus, convallis vel rhoncus vel, condimentum</p><a class="btn btn-arrow" href="#">Shop Now</a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6 col-sm-6 col-12 height-100 align-items-end d-flex"><img src="assets/imgs/page/homepage8/book-ads1.png" alt="Ecom"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-20">
                    <div class="block-sale-3 bg-29">
                        <div class="row height-100">
                            <div class="col-lg-5 col-md-6 col-sm-6 col-12 height-100 align-items-center d-flex">
                                <div class="box-sale"><span class="font-sm color-brand-3">For Collection</span>
                                    <h4 class="mt-5 mb-10">History Books</h4>
                                    <p class="color-brand-3 font-sm mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean maximus laoreet</p><a class="btn btn-arrow" href="#">Shop Now</a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6 col-sm-6 col-12 height-100 align-items-end d-flex"><img src="assets/imgs/page/homepage8/book-ads2.png" alt="Ecom"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner 4  -->
    <section class="section-box mt-30">
        <div class="container">
            <div class="row">
                <!-- Item-->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card-grid-style-2 card-grid-style-2-small">
                        <div class="image-box"><a><img src="assets/imgs/page/homepage8/img1.png" alt="Ecom"></a>
                            <div class="mt-10 text-center"><a class="btn btn-gray">View all</a></div>
                        </div>
                        <div class="info-right"><a class="color-brand-3 font-sm-bold">
                                <h6>Business & Money</h6>
                            </a>
                            <ul class="list-links-disc">
                                <li><a class="font-sm">Accounting</a></li>
                                <li><a class="font-sm">Biography & History</a></li>
                                <li><a class="font-sm">Business Culture</a></li>
                                <li><a class="font-sm">Economics</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End item-->
                <!-- Item-->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card-grid-style-2 card-grid-style-2-small">
                        <div class="image-box"><a><img src="assets/imgs/page/homepage8/img2.png" alt="Ecom"></a>
                            <div class="mt-10 text-center"><a class="btn btn-gray">View all</a></div>
                        </div>
                        <div class="info-right"><a class="color-brand-3 font-sm-bold">
                                <h6>Biographies</h6>
                            </a>
                            <ul class="list-links-disc">
                                <li><a class="font-sm">HD DVD Players</a></li>
                                <li><a class="font-sm">Projection Screens</a></li>
                                <li><a class="font-sm">Television Accessories</a></li>
                                <li><a class="font-sm">TV-DVD Combos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End item-->
                <!-- Item-->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card-grid-style-2 card-grid-style-2-small">
                        <div class="image-box"><a><img src="assets/imgs/page/homepage8/img3.png" alt="Ecom"></a>
                            <div class="mt-10 text-center"><a class="btn btn-gray">View all</a></div>
                        </div>
                        <div class="info-right"><a class="color-brand-3 font-sm-bold">
                                <h6>Children's Books</h6>
                            </a>
                            <ul class="list-links-disc">
                                <li><a class="font-sm">Action & Adventure</a></li>
                                <li><a class="font-sm">Activities, Crafts</a></li>
                                <li><a class="font-sm">Arts, Music</a></li>
                                <li><a class="font-sm">Early Learning</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End item-->
                <!-- Item-->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card-grid-style-2 card-grid-style-2-small">
                        <div class="image-box"><a><img src="assets/imgs/page/homepage8/img4.png" alt="Ecom"></a>
                            <div class="mt-10 text-center"><a class="btn btn-gray">View all</a></div>
                        </div>
                        <div class="info-right"><a class="color-brand-3 font-sm-bold">
                                <h6>Education & Teaching</h6>
                            </a>
                            <ul class="list-links-disc">
                                <li><a class="font-sm">Higher & Continuing</a></li>
                                <li><a class="font-sm">Schools & Teaching</a></li>
                                <li><a class="font-sm">Study Guides</a></li>
                                <li><a class="font-sm">Test Preparation </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End item-->
            </div>
        </div>
    </section>
    <!-- Last container -->
    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
                <!-- Best Seller -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="box-slider-item">
                        <div class="head">
                            <h5>Best seller</h5>
                        </div>
                        <div class="content-slider">
                            <div class="box-swiper">
                                <div class="swiper-container swiper-best-seller">
                                    <div class="swiper-wrapper pt-5">
                                        <div class="swiper-slide">
                                            <?php
                                            $result = mysqli_query($con, "SELECT * FROM `product` WHERE `categorie_id` ='" . $_GET['$cat_id'] . "' LIMIT 3 ");
                                            if ($result && mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                    <div class="card-grid-style-2 card-grid-none-border hover-up">
                                                        <div class="image-box"><span class="label bg-brand-2">-17%</span>
                                                            <a href="single-product.php?prod_id=<?php echo $row['id']; ?>&cat_id=<?php echo $row['categorie_id']; ?>"><img src="admin/<?php echo $row['image'] ?>" alt="Ecom"></a>
                                                        </div>
                                                        <div class="info-right"><span class="font-xs color-gray-500"><?php echo $row['name'] ?></span><br>
                                                            <a class="color-brand-3 font-xs-bold description-clamp" href="single-product.php?prod_id=<?php echo $row['id']; ?>&cat_id=<?php echo $row['categorie_id']; ?>"><?php echo $row['discription'] ?></a>
                                                            <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                                                                <img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span>
                                                            </div>
                                                            <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main"><?php echo $row['selling_price'] ?></strong>
                                                                <span class="color-gray-500 price-line"><?php echo $row['mrp'] ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php }
                                            } else {
                                                echo "<p>No products found in this category.</p>";
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-button-next swiper-button-next-style-2 swiper-button-next-bestseller"></div>
                                <div class="swiper-button-prev swiper-button-prev-style-2 swiper-button-prev-bestseller"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Featured products -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="box-slider-item">
                        <div class="head">
                            <h5>Featured products</h5>
                        </div>
                        <div class="content-slider">
                            <div class="box-swiper">
                                <div class="swiper-container swiper-featured">
                                    <div class="swiper-wrapper pt-5">
                                        <div class="swiper-slide">
                                            <?php
                                            $result = mysqli_query($con, "SELECT * FROM `product` WHERE `featured` ='1' LIMIT 3 ");
                                            if ($result && mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                    <div class="card-grid-style-2 card-grid-none-border hover-up">
                                                        <div class="image-box"><span class="label bg-brand-2">-17%</span>
                                                            <a href="single-product.php?prod_id=<?php echo $row['id']; ?>&cat_id=<?php echo $row['categorie_id']; ?>"><img src="admin/<?php echo $row['image'] ?>" alt="Ecom"></a>
                                                        </div>
                                                        <div class="info-right"><span class="font-xs color-gray-500"><?php echo $row['name'] ?></span><br>
                                                            <a class="color-brand-3 font-xs-bold description-clamp" href="single-product.php?prod_id=<?php echo $row['id']; ?>&cat_id=<?php echo $row['categorie_id']; ?>"><?php echo $row['discription'] ?></a>
                                                            <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                                                                <img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span>
                                                            </div>
                                                            <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main"><?php echo $row['selling_price'] ?></strong>
                                                                <span class="color-gray-500 price-line"><?php echo $row['mrp'] ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php }
                                            } else {
                                                echo "<p>No products found in this category.</p>";
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-button-next swiper-button-next-style-2 swiper-button-next-featured"></div>
                                <div class="swiper-button-prev swiper-button-prev-style-2 swiper-button-prev-featured"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Most viewed -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="box-slider-item">
                        <div class="head">
                            <h5>Most viewed</h5>
                        </div>
                        <div class="content-slider">
                            <div class="box-swiper">
                                <div class="swiper-container swiper-mostviewed">
                                    <div class="swiper-wrapper pt-5">
                                        <div class="swiper-slide">
                                            <?php
                                            $result = mysqli_query($con, "SELECT * FROM `product` WHERE `categorie_id` ='" . $_GET['$cat_id'] . "' LIMIT 2 OFFSET 6 ");
                                            if ($result && mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                    <div class="card-grid-style-2 card-grid-none-border hover-up">
                                                        <div class="image-box"><span class="label bg-brand-2">-17%</span>
                                                            <a href="single-product.php?prod_id=<?php echo $row['id']; ?>&cat_id=<?php echo $row['categorie_id']; ?>"><img src="admin/<?php echo $row['image'] ?>" alt="Ecom"></a>
                                                        </div>
                                                        <div class="info-right"><span class="font-xs color-gray-500"><?php echo $row['name'] ?></span><br>
                                                            <a class="color-brand-3 font-xs-bold description-clamp" href="single-product.php?prod_id=<?php echo $row['id']; ?>&cat_id=<?php echo $row['categorie_id']; ?>"><?php echo $row['discription'] ?></a>
                                                            <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                                                                <img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span>
                                                            </div>
                                                            <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main"><?php echo $row['selling_price'] ?></strong>
                                                                <span class="color-gray-500 price-line"><?php echo $row['mrp'] ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php }
                                            } else {
                                                echo "<p>No products found in this category.</p>";
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-button-next swiper-button-next-style-2 swiper-button-next-mostviewed"></div>
                                <div class="swiper-button-prev swiper-button-prev-style-2 swiper-button-prev-mostviewed"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Trending -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="box-slider-item">
                        <div class="head">
                            <h5>Trending</h5>
                        </div>
                        <div class="content-slider">
                            <div class="box-swiper">
                                <div class="swiper-container swiper-trending">
                                    <div class="swiper-wrapper pt-5">
                                        <div class="swiper-slide">
                                            <?php
                                            $result = mysqli_query($con, "SELECT * FROM `product` WHERE `categorie_id` ='" . $_GET['$cat_id'] . "' LIMIT 3 OFFSET 9 ");
                                            if ($result && mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                    <div class="card-grid-style-2 card-grid-none-border hover-up">
                                                        <div class="image-box"><span class="label bg-brand-2">-17%</span>
                                                            <a href="single-product.php?prod_id=<?php echo $row['id']; ?>&cat_id=<?php echo $row['categorie_id']; ?>"><img src="admin/<?php echo $row['image'] ?>" alt="Ecom"></a>
                                                        </div>
                                                        <div class="info-right"><span class="font-xs color-gray-500"><?php echo $row['name'] ?></span><br>
                                                            <a class="color-brand-3 font-xs-bold description-clamp" href="single-product.php?prod_id=<?php echo $row['id']; ?>&cat_id=<?php echo $row['categorie_id']; ?>"><?php echo $row['discription'] ?></a>
                                                            <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                                                                <img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span>
                                                            </div>
                                                            <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main"><?php echo $row['selling_price'] ?></strong>
                                                                <span class="color-gray-500 price-line"><?php echo $row['mrp'] ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php }
                                            } else {
                                                echo "<p>No products found in this category.</p>";
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-button-next swiper-button-next-style-2 swiper-button-next-trending"></div>
                                <div class="swiper-button-prev swiper-button-prev-style-2 swiper-button-prev-trending"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include('common/footer.php'); ?>