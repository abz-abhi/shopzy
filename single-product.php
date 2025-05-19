<?php
include('session.php');
include('common/header.php') ?>

<main class="main">
  <div class="section-box">
    <div class="breadcrumbs-div">
      <div class="container">
      </div>
    </div>
  </div>

  <!-- Product gallery and single items -->

  <section class="section-box shop-template">

    <?php
    $result = mysqli_query($con, "SELECT * FROM `product` WHERE `id` = '" . $_GET['prod_id'] . "' ");
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="gallery-image">
            <div class="galleries">
              <!-- Product gallery box -->
              <div class="detail-gallery">
                <label class="label">-17%</label>
                <div class="product-image-slider">
                  <?php
                  $selectGall = mysqli_query($con, "SELECT * FROM `product_gallery` WHERE `pro_id`='" . $_GET['prod_id'] . "'");
                  while ($gallRow = mysqli_fetch_array($selectGall)) {
                  ?>
                    <figure class="border-radius-10">
                      <img src="admin/<?php echo $gallRow['image']; ?>" alt="product image" />
                    </figure>
                  <?php } ?>
                </div>
              </div>

              <!-- Thumbnail navigation (optional) -->
              <div class="slider-nav-thumbnails">
                <?php
                // Re-run query or store earlier results in an array if needed
                $selectThumbs = mysqli_query($con, "SELECT * FROM `product_gallery` WHERE `pro_id`='" . $_GET['prod_id'] . "'");
                while ($thumbRow = mysqli_fetch_array($selectThumbs)) {
                ?>
                  <div>
                    <div class="item-thumb">
                      <img src="admin/<?php echo $thumbRow['image']; ?>" alt="product image thumbnail" />
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <h3 class="color-brand-3 mb-25">
            <?php echo $row['name'] ?>
          </h3>
          <div class="rating mt-5">
            <img src="assets/imgs/template/icons/star.svg" alt="Ecom" /><img
              src="assets/imgs/template/icons/star.svg"
              alt="Ecom" /><img src="assets/imgs/template/icons/star.svg" alt="Ecom" /><img
              src="assets/imgs/template/icons/star.svg"
              alt="Ecom" /><img src="assets/imgs/template/icons/star.svg" alt="Ecom" /><span
              class="font-xs color-gray-500">
              (65)</span>
          </div>
          <div class="border-bottom pt-20 mb-40"></div>
          <div class="box-product-price">
            <h3 class="color-brand-3 price-main d-inline-block mr-10">
              <?php echo $row['selling_price'] ?>
            </h3>
            <span class="color-gray-500 price-line font-xl line-througt"><?php echo $row['mrp'] ?></span>
          </div>

          <div class="product-description mt-20 color-gray-900 ">
            <?php echo $row['discription'] ?>
          </div>

          <div class="buy-product mt-20">
            <p class="font-sm mb-20">Quantity</p>
            <div class="box-quantity">
              <div class="input-quantity">

                <?php $check_result = mysqli_query($con, "SELECT * FROM cart WHERE pro_id='" . $row['id'] . "' AND user_id='$session_id' ");
                if (mysqli_num_rows($check_result) > 0) {
                  $row_cart_item = mysqli_fetch_assoc($check_result);
                  $qty = $row_cart_item['qty'];
                } else {
                  if (isset($_SESSION['cart'])) {

                    foreach ($session_cart as $key => $value) {
                      if ($value['id'] == $row['id']) {
                        $qty = $value['qty'];
                      } else {
                        $qty = 1;
                      }
                    }
                  } else {

                    $qty = 1;
                  }
                } ?>

                <input
                  class="font-xl color-brand-3"
                  type="text"
                  id="qty" name="qty" value="<?php echo $qty; ?>" />
                <span class="minus-cart"></span>
                <span class="plus-cart"></span>
              </div>
              <div class="button-buy">


                <?php if (isset($_SESSION['user_id'])) { ?>
                  <button class="btn btn-cart" onclick="add_cart(<?php echo $row['id'] ?>,<?php echo $row['selling_price'] ?>);">Add to cart</button>
                <?php } else { ?>
                  <button class="btn btn-cart" onclick="add_cart_session(<?php echo $row['id'] ?>,<?php echo $row['selling_price'] ?>);">Add to cart</button>
                <?php } ?>


              </div>
            </div>
          </div>
          <div class="border-bottom pt-30 mb-20"></div>





          <a class="mr-30" onclick="AddWishlist_User(<?php echo $row['id']; ?>, <?php echo $_SESSION['user_id']; ?>)">
            <span class="btn btn-wishlist mr-5 opacity-100 transform-none"></span>
            <span class="font-md color-gray-900">Add to Wish list</span>
          </a>
          <a href="shop-compare.php">
            <span class="btn btn-compare mr-5 opacity-100 transform-none"></span>
            <span class="font-md color-gray-900">Add to Compare</span>
          </a>




          <div class="info-product mt-20 font-md color-gray-900">
            <div class="mt-20">
              <a class="font-md color-gray-900" href="shop-compare.php">Compare with similar items</a>
            </div>
          </div>
        </div>
        <div class="border-bottom pt-20 mb-40"></div>
      </div>
  </section>

  <!-- Description banner & related products-->

  <section class="section-box shop-template">
    <div class="container">
      <div class="pt-30 mb-10">
        <ul class="nav nav-tabs nav-tabs-product" role="tablist">
          <li>
            <a
              class="active"
              href="#tab-description"
              data-bs-toggle="tab"
              role="tab"
              aria-controls="tab-description"
              aria-selected="true">Description</a>
          </li>
          <li>
            <a
              href="#tab-specification"
              data-bs-toggle="tab"
              role="tab"
              aria-controls="tab-specification"
              aria-selected="true">Specification</a>
          </li>
          <li>
            <a
              href="#tab-additional"
              data-bs-toggle="tab"
              role="tab"
              aria-controls="tab-additional"
              aria-selected="true">Additional information</a>
          </li>
          <li>
            <a
              href="#tab-reviews"
              data-bs-toggle="tab"
              role="tab"
              aria-controls="tab-reviews"
              aria-selected="true">Reviews (2)</a>
          </li>
          <li>
            <a
              href="#tab-vendor"
              data-bs-toggle="tab"
              role="tab"
              aria-controls="tab-vendor"
              aria-selected="true">Vendor</a>
          </li>
        </ul>
        <div class="tab-content">
          <div
            class="tab-pane fade active show"
            id="tab-description"
            role="tabpanel"
            aria-labelledby="tab-description">
            <div class="display-text-short">
              <p>
                It is a paradisematic country, in which roasted parts of
                sentences fly into your mouth. Even the all-powerful Pointing
                has no control about the blind texts it is an almost
                unorthographic life One day however a small line of blind text
                by the name of Lorem Ipsum decided to leave for the far World of
                Grammar. The Big Oxmox advised her not to do so, because there
                were thousands of bad Commas, wild Question Marks and devious
                Semikoli, but the Little Blind Text didn’t listen. She packed
                her seven versalia, put her initial into the belt and made
                herself on the way.
              </p>
              <p>
                When she reached the first hills of the Italic Mountains, she
                had a last view back on the skyline of her hometown
                Bookmarksgrove, the headline of Alphabet Village and the subline
                of her own road, the Line Lane. Pityful a rethoric question ran
                over her cheek, then she continued her way. On her way she met a
                copy. The copy warned the Little Blind Text, that where it came
                from it would have been rewritten a thousand times and
                everything that was left from its origin would be the word “and”
                and the Little Blind Text should turn around and return to its
                own, safe country. It is a paradisematic country, in which
                roasted parts of sentences fly into your mouth. Even the
                all-powerful Pointing has no control about the blind texts it is
                an almost unorthographic life One day however a small line of
                blind text by the name of Lorem Ipsum decided to leave for the
                far World of Grammar.
              </p>
              <p>
                <img
                  src="assets/imgs/page/product/product-banner.jpg"
                  alt="Ecom" />
              </p>
              <p>
                It is a paradisematic country, in which roasted parts of
                sentences fly into your mouth. Even the all-powerful Pointing
                has no control about the blind texts it is an almost
                unorthographic life One day however a small line of blind text
                by the name of Lorem Ipsum decided to leave for the far World of
                Grammar. The Big Oxmox advised her not to do so, because there
                were thousands of bad Commas, wild Question Marks and devious
                Semikoli, but the Little Blind Text didn’t listen. She packed
                her seven versalia, put her initial into the belt and made
                herself on the way.
              </p>
              <p>
                <img
                  src="assets/imgs/page/product/product-banner-2.jpg"
                  alt="Ecom" />
              </p>
              <p>
                When she reached the first hills of the Italic Mountains, she
                had a last view back on the skyline of her hometown
                Bookmarksgrove, the headline of Alphabet Village and the subline
                of her own road, the Line Lane. Pityful a rethoric question ran
                over her cheek, then she continued her way. On her way she met a
                copy. The copy warned the Little Blind Text, that where it came
                from it would have been rewritten a thousand times and
                everything that was left from its origin would be the word “and”
                and the Little Blind Text should turn around and return to its
                own, safe country.
              </p>
            </div>
            <div class="mt-20 text-center">
              <a class="btn btn-border font-sm-bold pl-80 pr-80 btn-expand-more">More Details</a>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="tab-specification"
            role="tabpanel"
            aria-labelledby="tab-specification">
            <h5 class="mb-25">Specification</h5>
            <div class="table-responsive">
              <table class="table table-striped">
                <tr>
                  <td>Mode</td>
                  <td>#SK10923</td>
                </tr>
                <tr>
                  <td>Brand</td>
                  <td>SamSung</td>
                </tr>
                <tr>
                  <td>Size</td>
                  <td>6.7"</td>
                </tr>
                <tr>
                  <td>Finish</td>
                  <td>Pacific Blue</td>
                </tr>
                <tr>
                  <td>Origin of Country</td>
                  <td>United States</td>
                </tr>
                <tr>
                  <td>Manufacturer</td>
                  <td>USA</td>
                </tr>
                <tr>
                  <td>Released Year</td>
                  <td>2022</td>
                </tr>
                <tr>
                  <td>Warranty</td>
                  <td>International</td>
                </tr>
              </table>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="tab-additional"
            role="tabpanel"
            aria-labelledby="tab-additional">
            <h5 class="mb-25">Additional information</h5>
            <div class="table-responsive">
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <td>Weight</td>
                    <td>
                      <p>0.240 kg</p>
                    </td>
                  </tr>
                  <tr>
                    <td>Dimensions</td>
                    <td>
                      <p>0.74 x 7.64 x 16.08 cm</p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="tab-reviews"
            role="tabpanel"
            aria-labelledby="tab-reviews">
            <div class="comments-area">
              <div class="row">
                <div class="col-lg-8">
                  <h4 class="mb-30 title-question">
                    Customer questions &amp; answers
                  </h4>
                  <div class="comment-list">
                    <div
                      class="single-comment justify-content-between d-flex mb-30 hover-up">
                      <div class="user justify-content-between d-flex">
                        <div class="thumb text-center">
                          <img
                            src="assets/imgs/page/product/author-2.png"
                            alt="Ecom" /><a class="font-heading text-brand" href="#">Sienna</a>
                        </div>
                        <div class="desc">
                          <div class="d-flex justify-content-between mb-10">
                            <div class="d-flex align-items-center">
                              <span class="font-xs color-gray-700">December 4, 2022 at 3:12 pm</span>
                            </div>
                            <div class="product-rate d-inline-block">
                              <div
                                class="product-rating"
                                style="width: 100%"></div>
                            </div>
                          </div>
                          <p class="mb-10 font-sm color-gray-900">
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Delectus, suscipit exercitationem accusantium
                            obcaecati quos voluptate nesciunt facilis itaque
                            modi commodi dignissimos sequi repudiandae minus ab
                            deleniti totam officia id incidunt?<a
                              class="reply"
                              href="#">
                              Reply</a>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div
                      class="single-comment justify-content-between d-flex mb-30 ml-30 hover-up">
                      <div class="user justify-content-between d-flex">
                        <div class="thumb text-center">
                          <img
                            src="assets/imgs/page/product/author-3.png"
                            alt="Ecom" /><a class="font-heading text-brand" href="#">Brenna</a>
                        </div>
                        <div class="desc">
                          <div class="d-flex justify-content-between mb-10">
                            <div class="d-flex align-items-center">
                              <span class="font-xs color-gray-700">December 4, 2022 at 3:12 pm</span>
                            </div>
                            <div class="product-rate d-inline-block">
                              <div
                                class="product-rating"
                                style="width: 80%"></div>
                            </div>
                          </div>
                          <p class="mb-10 font-sm color-gray-900">
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Delectus, suscipit exercitationem accusantium
                            obcaecati quos voluptate nesciunt facilis itaque
                            modi commodi dignissimos sequi repudiandae minus ab
                            deleniti totam officia id incidunt?<a
                              class="reply"
                              href="#">
                              Reply</a>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div
                      class="single-comment justify-content-between d-flex hover-up">
                      <div class="user justify-content-between d-flex">
                        <div class="thumb text-center">
                          <img
                            src="assets/imgs/page/product/author-4.png"
                            alt="Ecom" /><a class="font-heading text-brand" href="#">Gemma</a>
                        </div>
                        <div class="desc">
                          <div class="d-flex justify-content-between mb-10">
                            <div class="d-flex align-items-center">
                              <span class="font-xs color-gray-700">December 4, 2022 at 3:12 pm</span>
                            </div>
                            <div class="product-rate d-inline-block">
                              <div
                                class="product-rating"
                                style="width: 80%"></div>
                            </div>
                          </div>
                          <p class="mb-10 font-sm color-gray-900">
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Delectus, suscipit exercitationem accusantium
                            obcaecati quos voluptate nesciunt facilis itaque
                            modi commodi dignissimos sequi repudiandae minus ab
                            deleniti totam officia id incidunt?<a
                              class="reply"
                              href="#">
                              Reply</a>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <h4 class="mb-30 title-question">Customer reviews</h4>
                  <div class="d-flex mb-30">
                    <div class="product-rate d-inline-block mr-15">
                      <div class="product-rating" style="width: 90%"></div>
                    </div>
                    <h6>4.8 out of 5</h6>
                  </div>
                  <div class="progress">
                    <span>5 star</span>
                    <div
                      class="progress-bar"
                      role="progressbar"
                      style="width: 50%"
                      aria-valuenow="50"
                      aria-valuemin="0"
                      aria-valuemax="100">
                      50%
                    </div>
                  </div>
                  <div class="progress">
                    <span>4 star</span>
                    <div
                      class="progress-bar"
                      role="progressbar"
                      style="width: 25%"
                      aria-valuenow="25"
                      aria-valuemin="0"
                      aria-valuemax="100">
                      25%
                    </div>
                  </div>
                  <div class="progress">
                    <span>3 star</span>
                    <div
                      class="progress-bar"
                      role="progressbar"
                      style="width: 45%"
                      aria-valuenow="45"
                      aria-valuemin="0"
                      aria-valuemax="100">
                      45%
                    </div>
                  </div>
                  <div class="progress">
                    <span>2 star</span>
                    <div
                      class="progress-bar"
                      role="progressbar"
                      style="width: 65%"
                      aria-valuenow="65"
                      aria-valuemin="0"
                      aria-valuemax="100">
                      65%
                    </div>
                  </div>
                  <div class="progress mb-30">
                    <span>1 star</span>
                    <div
                      class="progress-bar"
                      role="progressbar"
                      style="width: 85%"
                      aria-valuenow="85"
                      aria-valuemin="0"
                      aria-valuemax="100">
                      85%
                    </div>
                  </div>
                  <a class="font-xs text-muted" href="#">How are ratings calculated?</a>
                </div>
              </div>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="tab-vendor"
            role="tabpanel"
            aria-labelledby="tab-vendor">
            <div class="vendor-logo d-flex mb-30">
              <img src="assets/imgs/page/product/futur.png" alt="" />
              <div class="vendor-name ml-15">
                <h6><a href="shop-vendor-single.html">Futur Tech.</a></h6>
                <div class="product-rate-cover text-end">
                  <div class="product-rate d-inline-block">
                    <div class="product-rating" style="width: 90%"></div>
                  </div>
                  <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                </div>
              </div>
            </div>
            <ul class="contact-infor mb-50">
              <li>
                <img
                  src="assets/imgs/page/product/icon-location.svg"
                  alt="" /><strong>Address:</strong><span>
                  5171 W Campbell Ave undefined Kent, Utah 53127 United
                  States</span>
              </li>
              <li>
                <img
                  src="assets/imgs/page/product/icon-contact.svg"
                  alt="" /><strong>Contact Seller:</strong><span> (+91) - 540-025-553</span>
              </li>
            </ul>
            <div class="d-flex mb-25">
              <div class="mr-30">
                <p class="color-brand-1 font-xs">Rating</p>
                <h4 class="mb-0">92%</h4>
              </div>
              <div class="mr-30">
                <p class="color-brand-1 font-xs">Ship on time</p>
                <h4 class="mb-0">100%</h4>
              </div>
              <div>
                <p class="color-brand-1 font-xs">Chat response</p>
                <h4 class="mb-0">89%</h4>
              </div>
            </div>
            <p class="font-sm color-gray-500 mb-15">
              Noodles &amp; Company is an American fast-casual restaurant that
              offers international and American noodle dishes and pasta in
              addition to soups and salads. Noodles &amp; Company was founded in
              1995 by Aaron Kennedy and is headquartered in Broomfield,
              Colorado. The company went public in 2013 and recorded a $457
              million revenue in 2017.In late 2018, there were 460 Noodles &amp;
              Company locations across 29 states and Washington, D.C.
            </p>
            <p class="font-sm color-gray-500">
              Proin congue dapibus rhoncus. Curabitur ipsum orci, malesuada in
              porttitor a, porttitor quis diam. Nunc at arcu ut turpis facilisis
              volutpat. Proin tristique, mauris non gravida dignissim, purus
              mauris malesuada tellus, in tincidunt orci enim eget ligula.
              Quisque bibendum, ipsum id malesuada placerat, purus felis
              vehicula risus, vel fringilla justo erat ullamcorper ligula. Fusce
              congue ullamcorper ligula, at commodo turpis molestie vel.
            </p>
          </div>
          <div class="border-bottom pt-30 mb-50"></div>
          <h4 class="color-brand-3">Related Products</h4>

          <div class="list-products-5 mt-20 ">

            <?php
            $select = mysqli_query($con, "SELECT * FROM `product` WHERE `categorie_id` = '" . $_GET['cat_id'] . "' ");
            while ($row = mysqli_fetch_assoc($select)) {
            ?>
              <div class="card-grid-style-3">
                <div class="card-grid-inner">
                  <div class="tools">


                    <?php if (isset($_SESSION['user_id'])) { ?>


                      <button class="btn btn-wishlist btn-tooltip mb-10" onclick="AddWishlist_User(<?php echo $row['id']; ?>, <?php echo $_SESSION['user_id']; ?>)" aria-label="Add To Wishlist"></button>
                      <a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.php" aria-label="Compare"></a>
                    <?php } else {
                    ?>
                      <a class="btn btn-wishlist btn-tooltip mb-10" style="background-color: red;" onclick="AddWishlist(<?php echo $FeatureRow['id'] ?>,<?php echo $_SESSION['user_id'] ?>)" aria-label="Add To Wishlist"></a>
                      <a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.php" aria-label="Compare"></a>
                    <?php }
                    ?>


                  </div>
                  <div class="image-box">
                    <span class="label bg-brand-2">-17%</span>
                    <a href="single-product.php?prod_id=<?php echo $row['id']; ?>&cat_id=<?php echo $row['categorie_id']; ?>">
                      <img
                        src="admin/<?php echo $row['image'] ?>"
                        alt="Ecom" /></a>
                  </div>
                  <div class="info-right">
                    <a
                      class="font-xs color-gray-500 ">
                      <?php echo $row['name'] ?></a><br /><a
                      class="color-brand-3 font-sm-bold description-clamp">
                      <?php echo $row['discription'] ?></a>
                    <div class="rating">
                      <img
                        src="assets/imgs/template/icons/star.svg"
                        alt="Ecom" /><img
                        src="assets/imgs/template/icons/star.svg"
                        alt="Ecom" /><img
                        src="assets/imgs/template/icons/star.svg"
                        alt="Ecom" /><img
                        src="assets/imgs/template/icons/star.svg"
                        alt="Ecom" /><img
                        src="assets/imgs/template/icons/star.svg"
                        alt="Ecom" /><span class="font-xs color-gray-500">(65)</span>
                    </div>
                    <div class="price-info">
                      <strong class="font-lg-bold color-brand-3 price-main"><?php echo $row['selling_price'] ?></strong>
                      <span class="color-gray-500 price-line"><?php echo $row['mrp'] ?></span>
                    </div>
                    <div class="mt-20 box-btn-cart">
                      <?php if (isset($_SESSION['user_id'])) { ?>

                        <button class="btn btn-cart" onclick="addCartfrom_cart(<?php echo $row['id']; ?>, <?php echo $row['selling_price']; ?>)">Add To Cart</button>
                      <?php } else {
                      ?>
                        <button class="btn btn-cart" onclick="addCartfrom_session(<?php echo $row['id']; ?>,<?php echo $row['selling_price']; ?>)">Add To Cart</button>
                      <?php
                      } ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php  } ?>

          </div>


          <div class="border-bottom pt-20 mb-40"></div>
          <div class="border-bottom pt-20 mb-40"></div>
          <h4 class="color-brand-3">Recently viewed items</h4>
          <div class="row mt-40">
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="card-grid-style-2 card-grid-none-border hover-up">
                <div class="image-box">
                  <a href="single-product.php"><img
                      src="assets/imgs/page/homepage1/imgsp1.png"
                      alt="Ecom" /></a>
                </div>
                <div class="info-right">
                  <span class="font-xs color-gray-500">Apple</span><br /><a
                    class="color-brand-3 font-xs-bold"
                    href="single-product.php">SAMSUNG Galaxy Tab A7 Lite, 8.7&quot; Tablet 32GB</a>
                  <div class="rating">
                    <img
                      src="assets/imgs/template/icons/star.svg"
                      alt="Ecom" /><img
                      src="assets/imgs/template/icons/star.svg"
                      alt="Ecom" /><img
                      src="assets/imgs/template/icons/star.svg"
                      alt="Ecom" /><img
                      src="assets/imgs/template/icons/star.svg"
                      alt="Ecom" /><img
                      src="assets/imgs/template/icons/star.svg"
                      alt="Ecom" /><span class="font-xs color-gray-500"> (65)</span>
                  </div>
                  <div class="price-info">
                    <strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="card-grid-style-2 card-grid-none-border hover-up">
                <div class="image-box">
                  <a href="single-product.php"><img
                      src="assets/imgs/page/homepage1/imgsp2.png"
                      alt="Ecom" /></a>
                </div>
                <div class="info-right">
                  <span class="font-xs color-gray-500">Apple</span><br /><a
                    class="color-brand-3 font-xs-bold"
                    href="single-product.php">Class 4K UHD (2160P) LED Roku Smart TV HDR</a>
                  <div class="rating">
                    <img
                      src="assets/imgs/template/icons/star.svg"
                      alt="Ecom" /><img
                      src="assets/imgs/template/icons/star.svg"
                      alt="Ecom" /><img
                      src="assets/imgs/template/icons/star.svg"
                      alt="Ecom" /><img
                      src="assets/imgs/template/icons/star.svg"
                      alt="Ecom" /><img
                      src="assets/imgs/template/icons/star.svg"
                      alt="Ecom" /><span class="font-xs color-gray-500"> (65)</span>
                  </div>
                  <div class="price-info">
                    <strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="card-grid-style-2 card-grid-none-border hover-up">
                <div class="image-box">
                  <a href="single-product.php"><img
                      src="assets/imgs/page/homepage1/imgsp1.png"
                      alt="Ecom" /></a>
                </div>
                <div class="info-right">
                  <span class="font-xs color-gray-500">Apple</span><br /><a
                    class="color-brand-3 font-xs-bold"
                    href="single-product.php">HP 24mh FHD Monitor - Computer Monitor with 23.8-Inch</a>
                  <div class="rating">
                    <img
                      src="assets/imgs/template/icons/star.svg"
                      alt="Ecom" /><img
                      src="assets/imgs/template/icons/star.svg"
                      alt="Ecom" /><img
                      src="assets/imgs/template/icons/star.svg"
                      alt="Ecom" /><img
                      src="assets/imgs/template/icons/star.svg"
                      alt="Ecom" /><img
                      src="assets/imgs/template/icons/star.svg"
                      alt="Ecom" /><span class="font-xs color-gray-500"> (65)</span>
                  </div>
                  <div class="price-info">
                    <strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="card-grid-style-2 card-grid-none-border hover-up">
                <div class="image-box">
                  <a href="single-product.php"><img
                      src="assets/imgs/page/homepage1/imgsp2.png"
                      alt="Ecom" /></a>
                </div>
                <div class="info-right">
                  <span class="font-xs color-gray-500">Apple</span><br /><a
                    class="color-brand-3 font-xs-bold"
                    href="single-product.php">Logitech H390 Wired Headset, Stereo Headphones</a>
                  <div class="rating">
                    <img
                      src="assets/imgs/template/icons/star.svg"
                      alt="Ecom" /><img
                      src="assets/imgs/template/icons/star.svg"
                      alt="Ecom" /><img
                      src="assets/imgs/template/icons/star.svg"
                      alt="Ecom" /><img
                      src="assets/imgs/template/icons/star.svg"
                      alt="Ecom" /><img
                      src="assets/imgs/template/icons/star.svg"
                      alt="Ecom" /><span class="font-xs color-gray-500"> (65)</span>
                  </div>
                  <div class="price-info">
                    <strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="border-bottom pt-20 mb-40"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- Recently banner  -->

  <section class="section-box mt-90 mb-50">
    <div class="container">
      <ul class="list-col-5">
        <li>
          <div class="item-list">
            <div class="icon-left">
              <img src="assets/imgs/template/delivery.svg" alt="Ecom" />
            </div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Free Delivery</h5>
              <p class="font-sm color-gray-500">From all orders over $10</p>
            </div>
          </div>
        </li>
        <li>
          <div class="item-list">
            <div class="icon-left">
              <img src="assets/imgs/template/support.svg" alt="Ecom" />
            </div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Support 24/7</h5>
              <p class="font-sm color-gray-500">Shop with an expert</p>
            </div>
          </div>
        </li>
        <li>
          <div class="item-list">
            <div class="icon-left">
              <img src="assets/imgs/template/voucher.svg" alt="Ecom" />
            </div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Gift voucher</h5>
              <p class="font-sm color-gray-500">Refer a friend</p>
            </div>
          </div>
        </li>
        <li>
          <div class="item-list">
            <div class="icon-left">
              <img src="assets/imgs/template/return.svg" alt="Ecom" />
            </div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Return &amp; Refund</h5>
              <p class="font-sm color-gray-500">Free return over $200</p>
            </div>
          </div>
        </li>
        <li>
          <div class="item-list">
            <div class="icon-left">
              <img src="assets/imgs/template/secure.svg" alt="Ecom" />
            </div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Secure payment</h5>
              <p class="font-sm color-gray-500">100% Protected</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </section>
</main>
<?php include('common/footer.php') ?>