<?php
include('session.php');
include('common/header.php');

?>
<main class="main">
    <section class="section-box shop-template mt-30">
        <div class="container box-account-template">
            <h3>Hello Steven</h3>
            <p class="font-md color-gray-500">From your account dashboard. you can easily check & view your recent orders,
                <br class="d-none d-lg-block">manage your shipping and billing addresses and edit your password and account details.
            </p>
            <div class="box-tabs mb-100">
                <div class="border-bottom mt-20 mb-40"></div>
                <div>

                    <?php
                    $user_id = $_SESSION['user_id'];
                    $SelectOrder = mysqli_query($con, "SELECT * FROM `orders` WHERE `user_id` = '$user_id' ");

                    while ($OrderRow = mysqli_fetch_assoc($SelectOrder)) {

                        $dateString = $OrderRow['updated_on'];
                        $formattedDate = date("d M Y", strtotime($dateString));

                    ?>

                        <div class="box-orders">
                            <div class="head-orders">
                                <div class="head-left">
                                    <h5 class="mr-20">Order ID: #<?php echo $OrderRow['uniqe_id']; ?></h5>
                                    <span class="font-md color-brand-3 mr-20">Date: <?php echo $formattedDate ?></span>

                                    <?php if ($OrderRow['status'] == 1) { ?>
                                        <span class="label-delivery">Order placed</span>
                                    <?php } else if ($OrderRow['status'] == 2) { ?>
                                        <span class="label-delivery">In Production</span>
                                    <?php } else if ($OrderRow['status'] == 3) { ?>
                                        <span class="label-delivery">In shipping</span>
                                    <?php } else if ($OrderRow['status'] == 4) { ?>
                                        <span class="label-delivery">Shipping Final Mile</span>
                                    <?php } else { ?>
                                        <span class="label-delivery">Delivered</span>
                                    <?php } ?>

                                </div>
                                <div class="head-right"><a class="btn btn-buy font-sm-bold w-auto" href="order-track.php">Track Order</a></div>
                            </div>
                            <div class="body-orders">
                                <div class="list-orders">
                                    <?php
                                    $selectItem = mysqli_query($con, "SELECT * FROM `order_items` WHERE `order_id` = '" . $OrderRow['uniqe_id'] . "' ");

                                    while ($result_item = mysqli_fetch_assoc($selectItem)) {

                                        $select_prod = mysqli_query($con,"SELECT * FROM `product` WHERE `id` =  '".$result_item['item_id']."' ");

                                        while ($result_prod = mysqli_fetch_assoc($select_prod)) {

                                    ?>
                                        <div class="item-orders">
                                            <div class="image-orders"><img src="admin/<?php echo $result_prod['image'] ?>" alt="Ecom"></div>
                                            <div class="info-orders">
                                                <h5><?php echo $result_prod['discription'] ?></h6>
                                            </div>
                                            <div class="quantity-orders">
                                                <h6>Quantity: <?php echo $result_item['qty'] ?></h6>
                                            </div>
                                            <div class="price-orders">
                                                <h3><?php echo $result_item['total'] ?></h3>
                                            </div>
                                        </div>
                                    <?php } } ?>
                                </div>
                            </div>
                        </div>

                    <?php
                    } ?>

                </div>
            </div>
        </div>
        </div>
    </section>
</main>
<?php include('common/footer.php') ?>