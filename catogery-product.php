<?php include('common/header.php');

?>
<main class="main">
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
                            </div><a class="btn btn-view-all font-md-bold" href="shop-single-product.php">View All</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="list-products-5 list-brand-2">

                        <?php
                        $result = mysqli_query($con, "SELECT * FROM `product` WHERE `categorie_id` ='" . $_GET['$cat_id'] . "'  ");
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                            <div class="card-grid-style-3 card-style-full-image">
                                <div class="card-grid-inner">
                                    <div class="tools">
                                        <a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend"></a>
                                        <a class="btn btn-wishlist btn-tooltip mb-10" href="shop-wishlist.php" aria-label="Add To Wishlist"></a>
                                        <a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.php" aria-label="Compare"></a>
                                        <a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a>
                                    </div>
                                    <div class="image-box">
                                        <span class="label bg-brand-2">-17%</span>
                                        <a href="shop-single-product-3.php">
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
                                        </div><a class="color-brand-3 font-sm-bold" href="shop-single-product-3.php"><?php echo $row['discription']; ?></a>
                                        <div class="price-info"><strong class="font-lg-bold color-brand-2 price-main"><?php echo $row['selling_price']; ?></strong>
                                            <span class="color-gray-500 price-line"><?php echo $row['mrp']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php  }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
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
    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="head-main">
                        <h3 class="mb-5">Top Selling Books</h3>
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
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="card-grid-style-2">
                                                    <label class="label font-xs color-gray-500 bg-success">New</label>
                                                    <div class="image-box">
                                                        <a href="shop-single-product.php">
                                                            <img src="admin/<?php echo $row['image']; ?>" alt="Ecom"></a>
                                                    </div>
                                                    <div class="info-right">
                                                        <span class="font-xs color-gray-500"><?php echo $row['name']; ?></span><br>
                                                        <a class="color-brand-3 font-sm-bold" href="shop-single-product.php"><?php echo $row['discription']; ?></a>
                                                        <div class="rating">
                                                            <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                                                            <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                                                            <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                                                            <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                                                            <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                                                            <span class="font-xs color-gray-500">(65)</span>
                                                        </div>
                                                        <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main"><?php echo $row['selling_price']; ?></strong>
                                                            <span class="color-gray-500 price-line"><?php  echo $row['mrp']; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
    <section class="section-box mt-30">
        <div class="container">
            <div class="row">
                <!-- Item-->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card-grid-style-2 card-grid-style-2-small">
                        <div class="image-box"><a href="shop-fullwidth.html"><img src="assets/imgs/page/homepage8/img1.png" alt="Ecom"></a>
                            <div class="mt-10 text-center"><a class="btn btn-gray" href="shop-fullwidth.html">View all</a></div>
                        </div>
                        <div class="info-right"><a class="color-brand-3 font-sm-bold" href="shop-fullwidth.html">
                                <h6>Business & Money</h6>
                            </a>
                            <ul class="list-links-disc">
                                <li><a class="font-sm" href="shop-fullwidth.html">Accounting</a></li>
                                <li><a class="font-sm" href="shop-fullwidth.html">Biography & History</a></li>
                                <li><a class="font-sm" href="shop-fullwidth.html">Business Culture</a></li>
                                <li><a class="font-sm" href="shop-fullwidth.html">Economics</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End item-->
                <!-- Item-->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card-grid-style-2 card-grid-style-2-small">
                        <div class="image-box"><a href="shop-fullwidth.html"><img src="assets/imgs/page/homepage8/img2.png" alt="Ecom"></a>
                            <div class="mt-10 text-center"><a class="btn btn-gray" href="shop-fullwidth.html">View all</a></div>
                        </div>
                        <div class="info-right"><a class="color-brand-3 font-sm-bold" href="shop-fullwidth.html">
                                <h6>Biographies</h6>
                            </a>
                            <ul class="list-links-disc">
                                <li><a class="font-sm" href="shop-fullwidth.html">HD DVD Players</a></li>
                                <li><a class="font-sm" href="shop-fullwidth.html">Projection Screens</a></li>
                                <li><a class="font-sm" href="shop-fullwidth.html">Television Accessories</a></li>
                                <li><a class="font-sm" href="shop-fullwidth.html">TV-DVD Combos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End item-->
                <!-- Item-->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card-grid-style-2 card-grid-style-2-small">
                        <div class="image-box"><a href="shop-fullwidth.html"><img src="assets/imgs/page/homepage8/img3.png" alt="Ecom"></a>
                            <div class="mt-10 text-center"><a class="btn btn-gray" href="shop-fullwidth.html">View all</a></div>
                        </div>
                        <div class="info-right"><a class="color-brand-3 font-sm-bold" href="shop-fullwidth.html">
                                <h6>Children's Books</h6>
                            </a>
                            <ul class="list-links-disc">
                                <li><a class="font-sm" href="shop-fullwidth.html">Action & Adventure</a></li>
                                <li><a class="font-sm" href="shop-fullwidth.html">Activities, Crafts</a></li>
                                <li><a class="font-sm" href="shop-fullwidth.html">Arts, Music</a></li>
                                <li><a class="font-sm" href="shop-fullwidth.html">Early Learning</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End item-->
                <!-- Item-->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card-grid-style-2 card-grid-style-2-small">
                        <div class="image-box"><a href="shop-fullwidth.html"><img src="assets/imgs/page/homepage8/img4.png" alt="Ecom"></a>
                            <div class="mt-10 text-center"><a class="btn btn-gray" href="shop-fullwidth.html">View all</a></div>
                        </div>
                        <div class="info-right"><a class="color-brand-3 font-sm-bold" href="shop-fullwidth.html">
                                <h6>Education & Teaching</h6>
                            </a>
                            <ul class="list-links-disc">
                                <li><a class="font-sm" href="shop-fullwidth.html">Higher & Continuing</a></li>
                                <li><a class="font-sm" href="shop-fullwidth.html">Schools & Teaching</a></li>
                                <li><a class="font-sm" href="shop-fullwidth.html">Study Guides</a></li>
                                <li><a class="font-sm" href="shop-fullwidth.html">Test Preparation </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End item-->
            </div>
        </div>
    </section>
    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
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
                                            <div class="card-grid-style-2 card-grid-none-border hover-up">
                                                <div class="image-box"><span class="label bg-brand-2">-17%</span><a href="shop-single-product-2.php"><img src="assets/imgs/page/homepage8/book1.png" alt="Ecom"></a>
                                                </div>
                                                <div class="info-right"><span class="font-xs color-gray-500">Steven Job</span><br><a class="color-brand-3 font-xs-bold" href="shop-single-product-2.php">How Great Leaders Inspire Everyone to Take Action</a>
                                                    <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                                                    <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                                                </div>
                                            </div>
                                            <div class="card-grid-style-2 card-grid-none-border hover-up">
                                                <div class="image-box"><a href="shop-single-product-2.php"><img src="assets/imgs/page/homepage8/book2.png" alt="Ecom"></a>
                                                </div>
                                                <div class="info-right"><span class="font-xs color-gray-500">Steven Job</span><br><a class="color-brand-3 font-xs-bold" href="shop-single-product-2.php">How Great Leaders Inspire Everyone to Take Action</a>
                                                    <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                                                    <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                                                </div>
                                            </div>
                                            <div class="card-grid-style-2 card-grid-none-border hover-up">
                                                <div class="image-box"><a href="shop-single-product-2.php"><img src="assets/imgs/page/homepage8/book6.png" alt="Ecom"></a>
                                                </div>
                                                <div class="info-right"><span class="font-xs color-gray-500">Steven Job</span><br><a class="color-brand-3 font-xs-bold" href="shop-single-product-2.php">How Great Leaders Inspire Everyone to Take Action</a>
                                                    <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                                                    <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                                                </div>
                                            </div>
                                            <div class="card-grid-style-2 card-grid-none-border hover-up">
                                                <div class="image-box"><a href="shop-single-product-2.php"><img src="assets/imgs/page/homepage8/book3.png" alt="Ecom"></a>
                                                </div>
                                                <div class="info-right"><span class="font-xs color-gray-500">Steven Job</span><br><a class="color-brand-3 font-xs-bold" href="shop-single-product-2.php">How Great Leaders Inspire Everyone to Take Action</a>
                                                    <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                                                    <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-button-next swiper-button-next-style-2 swiper-button-next-bestseller"></div>
                                <div class="swiper-button-prev swiper-button-prev-style-2 swiper-button-prev-bestseller"></div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                            <div class="card-grid-style-2 card-grid-none-border hover-up">
                                                <div class="image-box"><span class="label bg-brand-2">-17%</span><a href="shop-single-product-2.php"><img src="assets/imgs/page/homepage8/book4.png" alt="Ecom"></a>
                                                </div>
                                                <div class="info-right"><span class="font-xs color-gray-500">Steven Job</span><br><a class="color-brand-3 font-xs-bold" href="shop-single-product-2.php">How Great Leaders Inspire Everyone to Take Action</a>
                                                    <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                                                    <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                                                </div>
                                            </div>
                                            <div class="card-grid-style-2 card-grid-none-border hover-up">
                                                <div class="image-box"><a href="shop-single-product-2.php"><img src="assets/imgs/page/homepage8/book5.png" alt="Ecom"></a>
                                                </div>
                                                <div class="info-right"><span class="font-xs color-gray-500">Steven Job</span><br><a class="color-brand-3 font-xs-bold" href="shop-single-product-2.php">How Great Leaders Inspire Everyone to Take Action</a>
                                                    <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                                                    <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                                                </div>
                                            </div>
                                            <div class="card-grid-style-2 card-grid-none-border hover-up">
                                                <div class="image-box"><a href="shop-single-product-2.php"><img src="assets/imgs/page/homepage8/book6.png" alt="Ecom"></a>
                                                </div>
                                                <div class="info-right"><span class="font-xs color-gray-500">Steven Job</span><br><a class="color-brand-3 font-xs-bold" href="shop-single-product-2.php">How Great Leaders Inspire Everyone to Take Action</a>
                                                    <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                                                    <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                                                </div>
                                            </div>
                                            <div class="card-grid-style-2 card-grid-none-border hover-up">
                                                <div class="image-box"><a href="shop-single-product-2.php"><img src="assets/imgs/page/homepage8/book7.png" alt="Ecom"></a>
                                                </div>
                                                <div class="info-right"><span class="font-xs color-gray-500">Steven Job</span><br><a class="color-brand-3 font-xs-bold" href="shop-single-product-2.php">How Great Leaders Inspire Everyone to Take Action</a>
                                                    <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                                                    <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-button-next swiper-button-next-style-2 swiper-button-next-featured"></div>
                                <div class="swiper-button-prev swiper-button-prev-style-2 swiper-button-prev-featured"></div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                            <div class="card-grid-style-2 card-grid-none-border hover-up">
                                                <div class="image-box"><a href="shop-single-product-2.php"><img src="assets/imgs/page/homepage8/book7.png" alt="Ecom"></a>
                                                </div>
                                                <div class="info-right"><span class="font-xs color-gray-500">Steven Job</span><br><a class="color-brand-3 font-xs-bold" href="shop-single-product-2.php">How Great Leaders Inspire Everyone to Take Action</a>
                                                    <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                                                    <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                                                </div>
                                            </div>
                                            <div class="card-grid-style-2 card-grid-none-border hover-up">
                                                <div class="image-box"><a href="shop-single-product-2.php"><img src="assets/imgs/page/homepage8/book8.png" alt="Ecom"></a>
                                                </div>
                                                <div class="info-right"><span class="font-xs color-gray-500">Steven Job</span><br><a class="color-brand-3 font-xs-bold" href="shop-single-product-2.php">How Great Leaders Inspire Everyone to Take Action</a>
                                                    <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                                                    <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                                                </div>
                                            </div>
                                            <div class="card-grid-style-2 card-grid-none-border hover-up">
                                                <div class="image-box"><a href="shop-single-product-2.php"><img src="assets/imgs/page/homepage8/book9.png" alt="Ecom"></a>
                                                </div>
                                                <div class="info-right"><span class="font-xs color-gray-500">Steven Job</span><br><a class="color-brand-3 font-xs-bold" href="shop-single-product-2.php">How Great Leaders Inspire Everyone to Take Action</a>
                                                    <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                                                    <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                                                </div>
                                            </div>
                                            <div class="card-grid-style-2 card-grid-none-border hover-up">
                                                <div class="image-box"><span class="label bg-brand-2">-17%</span><a href="shop-single-product-2.php"><img src="assets/imgs/page/homepage8/book5.png" alt="Ecom"></a>
                                                </div>
                                                <div class="info-right"><span class="font-xs color-gray-500">Steven Job</span><br><a class="color-brand-3 font-xs-bold" href="shop-single-product-2.php">How Great Leaders Inspire Everyone to Take Action</a>
                                                    <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                                                    <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-button-next swiper-button-next-style-2 swiper-button-next-mostviewed"></div>
                                <div class="swiper-button-prev swiper-button-prev-style-2 swiper-button-prev-mostviewed"></div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                            <div class="card-grid-style-2 card-grid-none-border hover-up">
                                                <div class="image-box"><a href="shop-single-product-2.php"><img src="assets/imgs/page/homepage8/book4.png" alt="Ecom"></a>
                                                </div>
                                                <div class="info-right"><span class="font-xs color-gray-500">Steven Job</span><br><a class="color-brand-3 font-xs-bold" href="shop-single-product-2.php">How Great Leaders Inspire Everyone to Take Action</a>
                                                    <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                                                    <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                                                </div>
                                            </div>
                                            <div class="card-grid-style-2 card-grid-none-border hover-up">
                                                <div class="image-box"><span class="label bg-brand-2">-17%</span><a href="shop-single-product-2.php"><img src="assets/imgs/page/homepage8/book5.png" alt="Ecom"></a>
                                                </div>
                                                <div class="info-right"><span class="font-xs color-gray-500">Steven Job</span><br><a class="color-brand-3 font-xs-bold" href="shop-single-product-2.php">How Great Leaders Inspire Everyone to Take Action</a>
                                                    <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                                                    <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                                                </div>
                                            </div>
                                            <div class="card-grid-style-2 card-grid-none-border hover-up">
                                                <div class="image-box"><a href="shop-single-product-2.php"><img src="assets/imgs/page/homepage8/book9.png" alt="Ecom"></a>
                                                </div>
                                                <div class="info-right"><span class="font-xs color-gray-500">Steven Job</span><br><a class="color-brand-3 font-xs-bold" href="shop-single-product-2.php">How Great Leaders Inspire Everyone to Take Action</a>
                                                    <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                                                    <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                                                </div>
                                            </div>
                                            <div class="card-grid-style-2 card-grid-none-border hover-up">
                                                <div class="image-box"><a href="shop-single-product-2.php"><img src="assets/imgs/page/homepage8/book1.png" alt="Ecom"></a>
                                                </div>
                                                <div class="info-right"><span class="font-xs color-gray-500">Steven Job</span><br><a class="color-brand-3 font-xs-bold" href="shop-single-product-2.php">How Great Leaders Inspire Everyone to Take Action</a>
                                                    <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                                                    <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                                                </div>
                                            </div>
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
    <section class="section-box mt-90 mb-50">
        <div class="container">
            <ul class="list-col-5">
                <li>
                    <div class="item-list">
                        <div class="icon-left"><img src="assets/imgs/template/delivery.svg" alt="Ecom"></div>
                        <div class="info-right">
                            <h5 class="font-lg-bold color-gray-100">Free Delivery</h5>
                            <p class="font-sm color-gray-500">From all orders over $10</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item-list">
                        <div class="icon-left"><img src="assets/imgs/template/support.svg" alt="Ecom"></div>
                        <div class="info-right">
                            <h5 class="font-lg-bold color-gray-100">Support 24/7</h5>
                            <p class="font-sm color-gray-500">Shop with an expert</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item-list">
                        <div class="icon-left"><img src="assets/imgs/template/voucher.svg" alt="Ecom"></div>
                        <div class="info-right">
                            <h5 class="font-lg-bold color-gray-100">Gift voucher</h5>
                            <p class="font-sm color-gray-500">Refer a friend</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item-list">
                        <div class="icon-left"><img src="assets/imgs/template/return.svg" alt="Ecom"></div>
                        <div class="info-right">
                            <h5 class="font-lg-bold color-gray-100">Return &amp; Refund</h5>
                            <p class="font-sm color-gray-500">Free return over $200</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item-list">
                        <div class="icon-left"><img src="assets/imgs/template/secure.svg" alt="Ecom"></div>
                        <div class="info-right">
                            <h5 class="font-lg-bold color-gray-100">Secure payment</h5>
                            <p class="font-sm color-gray-500">100% Protected</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="section-box box-newsletter bg-27 bg-newsletter-home8">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3 class="color-gray-1000 mb-5">Subscrible &amp; Get<span class="color-brand-2">10%</span> Discount</h3>
                    <p class="font-lg color-gray-1000 mb-10">Get E-mail updates about our latest shop and<span class="font-lg-bold">special offers.</span></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="box-form-newsletter mw-newsletter mt-15 d-inline-block">
                        <form class="form-newsletter">
                            <input class="input-newsletter font-xs" value="" placeholder="Your email Address">
                            <button class="btn btn-brand-2">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="ModalQuickview" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content apply-job-form">
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body p-30">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="gallery-image">
                                <div class="galleries-2">
                                    <div class="detail-gallery">
                                        <div class="product-image-slider-2">
                                            <figure class="border-radius-10"><img src="assets/imgs/page/product/img-gallery-1.jpg" alt="product image"></figure>
                                            <figure class="border-radius-10"><img src="assets/imgs/page/product/img-gallery-2.jpg" alt="product image"></figure>
                                            <figure class="border-radius-10"><img src="assets/imgs/page/product/img-gallery-3.jpg" alt="product image"></figure>
                                            <figure class="border-radius-10"><img src="assets/imgs/page/product/img-gallery-4.jpg" alt="product image"></figure>
                                            <figure class="border-radius-10"><img src="assets/imgs/page/product/img-gallery-5.jpg" alt="product image"></figure>
                                            <figure class="border-radius-10"><img src="assets/imgs/page/product/img-gallery-6.jpg" alt="product image"></figure>
                                            <figure class="border-radius-10"><img src="assets/imgs/page/product/img-gallery-7.jpg" alt="product image"></figure>
                                        </div>
                                    </div>
                                    <div class="slider-nav-thumbnails-2">
                                        <div>
                                            <div class="item-thumb"><img src="assets/imgs/page/product/img-gallery-1.jpg" alt="product image"></div>
                                        </div>
                                        <div>
                                            <div class="item-thumb"><img src="assets/imgs/page/product/img-gallery-2.jpg" alt="product image"></div>
                                        </div>
                                        <div>
                                            <div class="item-thumb"><img src="assets/imgs/page/product/img-gallery-3.jpg" alt="product image"></div>
                                        </div>
                                        <div>
                                            <div class="item-thumb"><img src="assets/imgs/page/product/img-gallery-4.jpg" alt="product image"></div>
                                        </div>
                                        <div>
                                            <div class="item-thumb"><img src="assets/imgs/page/product/img-gallery-5.jpg" alt="product image"></div>
                                        </div>
                                        <div>
                                            <div class="item-thumb"><img src="assets/imgs/page/product/img-gallery-6.jpg" alt="product image"></div>
                                        </div>
                                        <div>
                                            <div class="item-thumb"><img src="assets/imgs/page/product/img-gallery-7.jpg" alt="product image"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-tags">
                                <div class="d-inline-block mr-25"><span class="font-sm font-medium color-gray-900">Category:</span><a class="link" href="#">Smartphones</a></div>
                                <div class="d-inline-block"><span class="font-sm font-medium color-gray-900">Tags:</span><a class="link" href="#">Blue</a>,<a class="link" href="#">Smartphone</a></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-info">
                                <h5 class="mb-15">SAMSUNG Galaxy S22 Ultra, 8K Camera & Video, Brightest Display Screen, S Pen Pro</h5>
                                <div class="info-by"><span class="bytext color-gray-500 font-xs font-medium">by</span><a class="byAUthor color-gray-900 font-xs font-medium" href="shop-vendor-list.html"> Ecom Tech</a>
                                    <div class="rating d-inline-block"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500 font-medium"> (65 reviews)</span></div>
                                </div>
                                <div class="border-bottom pt-10 mb-20"></div>
                                <div class="box-product-price">
                                    <h3 class="color-brand-3 price-main d-inline-block mr-10">$2856.3</h3><span class="color-gray-500 price-line font-xl line-througt">$3225.6</span>
                                </div>
                                <div class="product-description mt-10 color-gray-900">
                                    <ul class="list-dot">
                                        <li>8k super steady video</li>
                                        <li>Nightography plus portait mode</li>
                                        <li>50mp photo resolution plus bright display</li>
                                        <li>Adaptive color contrast</li>
                                        <li>premium design & craftmanship</li>
                                        <li>Long lasting battery plus fast charging</li>
                                    </ul>
                                </div>
                                <div class="box-product-color mt-10">
                                    <p class="font-sm color-gray-900">Color:<span class="color-brand-2 nameColor">Pink Gold</span></p>
                                    <ul class="list-colors">
                                        <li class="disabled"><img src="assets/imgs/page/product/img-gallery-1.jpg" alt="Ecom" title="Pink"></li>
                                        <li><img src="assets/imgs/page/product/img-gallery-2.jpg" alt="Ecom" title="Gold"></li>
                                        <li><img src="assets/imgs/page/product/img-gallery-3.jpg" alt="Ecom" title="Pink Gold"></li>
                                        <li><img src="assets/imgs/page/product/img-gallery-4.jpg" alt="Ecom" title="Silver"></li>
                                        <li class="active"><img src="assets/imgs/page/product/img-gallery-5.jpg" alt="Ecom" title="Pink Gold"></li>
                                        <li class="disabled"><img src="assets/imgs/page/product/img-gallery-6.jpg" alt="Ecom" title="Black"></li>
                                        <li class="disabled"><img src="assets/imgs/page/product/img-gallery-7.jpg" alt="Ecom" title="Red"></li>
                                    </ul>
                                </div>
                                <div class="box-product-style-size mt-10">
                                    <div class="row">
                                        <div class="col-lg-12 mb-10">
                                            <p class="font-sm color-gray-900">Style:<span class="color-brand-2 nameStyle">S22</span></p>
                                            <ul class="list-styles">
                                                <li class="disabled" title="S22 Ultra">S22 Ultra</li>
                                                <li class="active" title="S22">S22</li>
                                                <li title="S22 + Standing Cover">S22 + Standing Cover</li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12 mb-10">
                                            <p class="font-sm color-gray-900">Size:<span class="color-brand-2 nameSize">512GB</span></p>
                                            <ul class="list-sizes">
                                                <li class="disabled" title="1GB">1GB</li>
                                                <li class="active" title="512 GB">512 GB</li>
                                                <li title="256 GB">256 GB</li>
                                                <li title="128 GB">128 GB</li>
                                                <li class="disabled" title="64GB">64GB</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="buy-product mt-5">
                                    <p class="font-sm mb-10">Quantity</p>
                                    <div class="box-quantity">
                                        <div class="input-quantity">
                                            <input class="font-xl color-brand-3" type="text" value="1"><span class="minus-cart"></span><span class="plus-cart"></span>
                                        </div>
                                        <div class="button-buy"><a class="btn btn-cart" href="shop-cart.php">Add to cart</a><a class="btn btn-buy" href="shop-checkout.php">Buy now</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include('common/footer.php') ?>