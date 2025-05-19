<?php
include('session.php');
include('common/header.php') ?>
<main class="main">
  <!-- Banner 1  -->
  <section class="section-box">
    <div class="banner-hero banner-1">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="box-swiper">
              <div class="swiper-container swiper-group-1">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <div class="banner-big bg-11" style="background-image: url(assets/imgs/page/homepage1/banner.png)"><span class="font-sm text-uppercase">Hot Right Now</span>
                      <h2 class="mt-10">Sale Up to 50% Off</h2>
                      <h1>Mobile Devices</h1>
                      <div class="row">
                        <div class="col-lg-5 col-md-7 col-sm-12">
                          <p class="font-sm color-brand-3">Curabitur id lectus in felis hendrerit efficitur quis quis lectus. Donec sollicitudin elit eu ipsum maximus blandit. Curabitur blandit tempus consectetur.</p>
                        </div>
                      </div>
                      <div class="mt-30"><a class="btn btn-brand-2" href="#">Shop now</a><a class="btn btn-link" href="#">Learn more</a></div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="banner-big bg-11-2" style="background-image: url(assets/imgs/page/homepage1/banner-hero-2.png)"><span class="font-sm text-uppercase">Trending Now</span>
                      <h2 class="mt-10">Big Sale 25%</h2>
                      <h1>Laptop & PC</h1>
                      <div class="row">
                        <div class="col-lg-5 col-md-7 col-sm-12">
                          <p class="font-sm color-brand-3">Curabitur id lectus in felis hendrerit efficitur quis quis lectus. Donec sollicitudin elit eu ipsum maximus blandit. Curabitur blandit tempus consectetur.</p>
                        </div>
                      </div>
                      <div class="mt-30"><a class="btn btn-brand-2" href="#">Shop now</a><a class="btn btn-link" href="#">Learn more</a></div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="banner-big bg-11-3" style="background-image: url(assets/imgs/page/homepage1/banner-hero-3.png)"><span class="font-sm text-uppercase">Top Sale This Month</span>
                      <h2 class="mt-10">Hot Collection</h2>
                      <h1>Virtual glasses</h1>
                      <div class="row">
                        <div class="col-lg-5 col-md-7 col-sm-12">
                          <p class="font-sm color-brand-3">Curabitur id lectus in felis hendrerit efficitur quis quis lectus. Donec sollicitudin elit eu ipsum maximus blandit. Curabitur blandit tempus consectetur.</p>
                        </div>
                      </div>
                      <div class="mt-30"><a class="btn btn-brand-2" href="#">Shop now</a><a class="btn btn-link" href="#">Learn more</a></div>
                    </div>
                  </div>
                </div>
                <div class="swiper-pagination swiper-pagination-1"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="row">
              <div class="col-lg-12 col-md-6 col-sm-12">
                <div class="banner-small banner-small-1 bg-13"><span class="color-danger text-uppercase font-sm-lh32">10%<span class="color-brand-3">Sale Off</span></span>
                  <h4 class="mb-10">Apple Watch Serial 7</h4>
                  <p class="color-brand-3 font-desc">Don&apos;t miss the last<br class="d-none d-lg-block"> opportunity.</p>
                  <div class="mt-20"><a class="btn btn-brand-3 btn-arrow-right" href="#">Shop now</a></div>
                </div>
              </div>
              <div class="col-lg-12 col-md-6 col-sm-12">
                <div class="banner-small banner-small-2 bg-14"><span class="color-danger text-uppercase font-sm-lh32">LATEST COLLECTION</span>
                  <h4 class="mb-10">Apple Devices &amp; Software</h4>
                  <p class="color-brand-3 font-md">Don&apos;t miss the last<br class="d-none d-lg-block"> opportunity.</p>
                  <div class="mt-20"><a class="btn btn-brand-2 btn-arrow-right" href="#">Shop now</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Featured Categories -->
  <section class="section-box">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <h3>Featured Categories</h3>
          <p class="font-base">Choose your necessary products from this feature categories.</p>
        </div>
        <div class="col-lg-7">
          <div class="list-brands">
            <div class="box-swiper">
              <div class="swiper-container swiper-group-7">
                <div class="swiper-wrapper">
                  <div class="swiper-slide"><a href="#"><img src="assets/imgs/slider/logo/acer.svg" alt="Ecom"></a></div>
                  <div class="swiper-slide"><a href="#"><img src="assets/imgs/slider/logo/nokia.svg" alt="Ecom"></a></div>
                  <div class="swiper-slide"><a href="#"><img src="assets/imgs/slider/logo/assus.svg" alt="Ecom"></a></div>
                  <div class="swiper-slide"><a href="#"><img src="assets/imgs/slider/logo/casio.svg" alt="Ecom"></a></div>
                  <div class="swiper-slide"><a href="#"><img src="assets/imgs/slider/logo/dell.svg" alt="Ecom"></a></div>
                  <div class="swiper-slide"><a href="#"><img src="assets/imgs/slider/logo/panasonic.svg" alt="Ecom"></a></div>
                  <div class="swiper-slide"><a href="#"><img src="assets/imgs/slider/logo/vaio.svg" alt="Ecom"></a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-50">
        <div class="row">
          <?php

          $catSel = mysqli_query($con, "SELECT * FROM `categories` ORDER BY `id`");


          while ($catRow = mysqli_fetch_assoc($catSel)) {

          ?>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
              <div class="card-grid-style-2 card-grid-style-2-small hover-up">
                <div class="image-box">
                  <a href="shop-grid-2.php">
                    <img src="admin/<?php echo $catRow['image'] ?>" alt="Ecom">
                  </a>
                </div>
                <div class="info-right"><a class="color-brand-3 font-sm-bold" href="shop-grid-2.php">
                    <h6><?php echo $catRow['name'] ?></h6>
                  </a>
                  <ul class="list-links-disc">
                    <?php
                    $prodSel = mysqli_query($con, "SELECT * FROM `product` WHERE `categorie_id` = '" . $catRow['id'] . "' LIMIT 4");

                    while ($prodRow = mysqli_fetch_assoc($prodSel)) {


                    ?>
                      <li><a class="font-sm" href="single-product.php?prod_id=<?php echo $prodRow['id']; ?>&cat_id=<?php echo $catRow['id']; ?>"><?php echo $prodRow['name'] ?></a></li>
                    <?php } ?>
                    <li><a class="btn btn-gray-abs" href="catogery-product.php?$cat_id=<?php echo $catRow['id'] ?>">View all</a></li>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <!-- Banner 2  -->
  <section class="section-box pt-50">
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-lg-5 col-md-5 col-sm-12 mb-30">
          <div class="bg-5 block-iphone"><span class="color-brand-3 font-sm-lh32">Starting from $899</span>
            <h3 class="font-xl mb-10">iPhone 12 Pro 128Gb</h3>
            <p class="font-base color-brand-3 mb-10">Special Sale</p><a class="btn btn-arrow">learn more</a>
          </div>
        </div>
        <div class="col-xl-4 col-lg-7 col-md-7 col-sm-12 mb-30">
          <div class="bg-4 block-samsung"><span class="color-brand-3 font-sm-lh32">New Arrivals</span>
            <h3 class="font-xl mb-10">Samsung 2022 Led TV</h3>
            <p class="font-base color-brand-3 mb-20">Special Sale</p><a class="btn btn-brand-2 btn-arrow-right">learn more</a>
          </div>
        </div>
        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12">
          <div class="bg-6 block-drone">
            <h3 class="font-33 mb-20">Drone Quadcopter UAV - DJI Air 2S</h3>
            <div class="mb-30"><strong class="font-18">Gimbal Camera, 5.4K Video</strong></div><a class="btn btn-brand-2 btn-arrow-right">learn more</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--  Featured Product -->
  <section class="section-box pt-50">
    <div class="container">
      <div class="head-main">
        <div class="row">
          <div class="col-xl-7 col-lg-6">
            <h3 class="mb-5">Featured Product</h3>
            <p class="font-base color-gray-500">Special products in this month.</p>
          </div>
        </div>
      </div>


      <div class="tab-content">
        <div class="tab-pane fade active show" id="tab-all" role="tabpanel" aria-labelledby="tab-all">
          <div class="list-products-5">

            <?php
            $FeatureSel = mysqli_query($con, "SELECT * FROM `product` WHERE `featured` = 1");
            while ($FeatureRow = mysqli_fetch_assoc($FeatureSel)) {
            ?>

              <div class="card-grid-style-3">
                <div class="card-grid-inner">
                  <div class="tools">

                    <?php if (isset($_SESSION['user_id'])) { ?>


                      <button class="btn btn-wishlist btn-tooltip mb-10" onclick="AddWishlist_User(<?php echo $FeatureRow['id']; ?>, <?php echo $_SESSION['user_id']; ?>)" aria-label="Add To Wishlist"></button>
                      <a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.php" aria-label="Compare"></a>
                    <?php } else {
                    ?>
                      <a class="btn btn-wishlist btn-tooltip mb-10" onclick="AddWishlist_session(<?php echo $FeatureRow['id'] ?>)" aria-label="Add To Wishlist"></a>
                      <a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.php" aria-label="Compare"></a>
                    <?php  }  ?>


                  </div>
                  <div class="image-box">
                    <span class="label bg-brand-2">-17%</span>
                    <a href="single-product.php?prod_id=<?php echo $FeatureRow['id']; ?>&cat_id=<?php echo $FeatureRow['categorie_id']; ?>">
                      <img src="admin/<?php echo $FeatureRow['image'] ?>" alt="Ecom">
                    </a>
                  </div>
                  <div class="info-right">
                    <a class="font-xs color-gray-500" href="shop-vendor-single.html"><?php echo $FeatureRow['name'] ?></a><br>
                    <a class="color-brand-3 font-sm-bold description-clamp" href="single-product.php?prod_id=<?php echo $FeatureRow['id']; ?>&cat_id=<?php echo $FeatureRow['categorie_id']; ?>">
                      <?php echo $FeatureRow['discription']; ?>
                    </a>

                    <div class="rating">
                      <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                      <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                      <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                      <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                      <img src="assets/imgs/template/icons/star.svg" alt="Ecom">
                      <span class="font-xs color-gray-500">(65)</span>
                    </div>
                    <div class="price-info">
                      <strong class="font-lg-bold color-brand-3 price-main"><?php echo $FeatureRow['selling_price'] ?></strong>
                      <span class="color-gray-500 price-line"><?php echo $FeatureRow['mrp'] ?></span>
                    </div>



                    <?php if (isset($_SESSION['user_id'])) { ?>

                      <button class="btn btn-cart" onclick="addCartfrom_cart(<?php echo $FeatureRow['id']; ?>, <?php echo $FeatureRow['selling_price']; ?>)">Add To Cart</button>
                    <?php } else {
                    ?>
                      <button class="btn btn-cart" onclick="addCartfrom_session(<?php echo $FeatureRow['id']; ?>,<?php echo $FeatureRow['selling_price']; ?>)">Add To Cart</button>
                    <?php
                    } ?>

                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Banner 3  -->
  <section class="section-box mt-50">
    <div class="container">
      <div class="row">
        <div class="col-xl-4 col-lg-12">
          <div class="banner-2 bg-xbox"><span class="color-danger text-uppercase">Flat 20% off</span>
            <h3 class="font-30">Microsoft</h3>
            <h4 class="font-59">Xbox</h4>
            <h5 class="font-55 mb-15">Series S</h5><span class="font-16">From $3500.00</span>
            <div class="mt-25"><a class="btn btn-brand-2 btn-arrow-right">Shop Now</a></div>
          </div>
        </div>
        <div class="col-xl-8 col-lg-12">
          <div class="image-gallery">
            <div class="image-big">
              <div class="banner-img-left bg-controller">
                <h3 class="font-33 mb-10">Xbox Core Wireless Controller</h3>
                <p class="font-18">Aqua Shift Special Edition</p>
                <div class="mt-25"><a class="btn btn-info btn-arrow-right">Shop Now</a></div>
              </div>
            </div>
            <div class="image-small">
              <div class="bg-metaverse">
                <h3 class="mb-10 font-32">Metaverse</h3>
                <p class="font-16">The Future of<br class="d-none d-lg-block"> Creativity</p>
                <div class="mt-15"><a class="btn btn-link-brand-2 btn-arrow-brand-2">learn more</a></div>
              </div>
            </div>
          </div>
          <div class="image-gallery">
            <div class="image-small">
              <div class="bg-electronic">
                <h3 class="font-32">Electronic</h3>
                <p class="font-16 color-brand-3">Hot devices, Latest trending</p>
              </div>
            </div>
            <div class="image-big">
              <div class="bg-phone">
                <h3 class="font-33 mb-15">Super discount for your first purchase</h3>
                <p class="font-18">Use discount code in checkout page.</p>
                <div class="mt-25"><a class="btn btn-brand-2 btn-arrow-right">Shop Now</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php include('common/footer.php') ?>