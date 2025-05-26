<?php
include("session.php");
include('common/header.php');
include('include/db_config.php'); ?>

<body>
    <section class="content-main">
        <div class="row">
            <div class="col-9">
                <div class="content-header">
                    <h2 class="content-title">Order Detail</h2>
                </div>
            </div>
            <?php
            $orderId = $_GET['order_id'];

            $selectOrder = mysqli_query($con, "SELECT * FROM `orders` WHERE `uniqe_id` = '$orderId' ");
            $resultOrder = mysqli_fetch_assoc($selectOrder);

            ?>
            <div class="col-lg-9">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3>OD-<?php echo $resultOrder['uniqe_id'] ?></h3>
                        <p class="text-muted">Order Date: <?php echo $resultOrder['created_on'] ?> </p>
                    </div>
                    <?php

                    $user_id = $resultOrder['user_id'];
                    $shippingId = $resultOrder['shipping_id'];
                    $selectUser = mysqli_query($con, "SELECT * FROM `users` WHERE `id` = '$user_id' ");
                    $resultUser = mysqli_fetch_assoc($selectUser);



                    ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Customer Details</h4>
                                <div class="mb-3">
                                    <p><strong style="font-weight: bold;">Name:</strong> <?php echo $resultUser['user_name'] ?></p>
                                    <p><strong style="font-weight: bold;">Email:</strong> <?php echo $resultUser['email'] ?></p>
                                    <p><strong style="font-weight: bold;">Contact Number:</strong> <?php echo $resultUser['phone_number'] ?></p>

                                    <?php

                                    $selectAddress = mysqli_query($con, "SELECT * FROM `shipping` WHERE `id` = '$shippingId' ");
                                    $resultAddress = mysqli_fetch_assoc($selectAddress);


                                    ?>
                                    <p><strong style="font-weight: bold;">Delivery Address:</strong> <?php echo $resultAddress['adress']; ?></p>
                                    <p><strong style="font-weight: bold;">Delivery Contact no:</strong> <?php echo $resultAddress['phone_number'] ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Status</h5>
                                <div class="mb-3">
                                    <p class="text-warning"><strong>
                                            Awaiting Payment </strong></p>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Order Type</th>
                                            <td>Delivery</td>
                                        </tr>
                                        <tr>
                                            <th>Payment Mode</th>
                                            <td><?php echo $resultOrder['pay_method']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="mt-4">Order Items</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ITEM</th>
                                    <th>UNIT COST</th>
                                    <th>QTY</th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                $selectItems = mysqli_query($con, "SELECT * FROM `order_items` WHERE `order_id` = '$orderId' ");
                                $count = 1;
                                while ($resItems = mysqli_fetch_assoc($selectItems)) {

                                    $itemId = $resItems['item_id'];

                                    $selectProd = mysqli_query($con, "SELECT * FROM `product` WHERE `id` = '$itemId' ");
                                    $resProd = mysqli_fetch_assoc($selectProd);

                                ?>

                                    <tr>
                                        <td><?php echo $count ?></td>
                                        <td><?php echo $resProd['name'] ?></td>
                                        <td><?php echo $resItems['price'] ?></td>
                                        <td><?php echo $resItems['qty'] ?></td>
                                        <td><?php echo $resItems['total'] ?></td>
                                    </tr>

                                <?php $count++;
                                }
                                ?>

                            </tbody>
                        </table>

                        <hr>



                        <hr>

                        <table class="table table-bordered">
                            <tr>
                                <th>Subtotal</th>
                                <td>₹<?php echo $resultOrder['sub_total'] ?></td>
                            </tr>
                            <tr>
                                <th>Delivery Charge</th>
                                <td>₹0</td>
                            </tr>
                            <tr>
                                <th>Handling Charge (2)%</th>
                                <td>₹0</td>
                            </tr>
                            <tr>
                                <th>GST</th>
                                <td>₹0</td>
                            </tr>
                            <tr class="table-active">
                                <th>Order Total</th>
                                <td><strong>₹<?php echo $resultOrder['sub_total'] ?></strong></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card mb-4" id="orderStatus">
                    <div class="card-header">
                        <h4>Change Order Status</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <select class="form-select mb-2" id="statusSelect_<?php echo $resultOrder['uniqe_id']; ?>" required>
                                <option value="">Select Status</option>
                                <?php
                                $selectStatus = mysqli_query($con, "SELECT * FROM `order_status` ORDER BY `id`");
                                while ($countStatus = mysqli_fetch_assoc($selectStatus)) {
                                    $selected = ($countStatus['id'] == $resultOrder['status']) ? 'selected' : '';
                                    echo '<option value="' . $countStatus['id'] . '" ' . $selected . '>' . $countStatus['status'] . '</option>';
                                }
                                ?>
                            </select>

                            <button
                                onclick="update_orderStatus(document.getElementById('statusSelect_<?php echo $resultOrder['uniqe_id']; ?>').value,'<?php echo $resultOrder['uniqe_id']; ?>')"
                                type="button"
                                class="btn btn-primary w-100">
                                Change
                            </button>
                        </div>

                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Other Action</h4>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-outline-danger w-100 mb-2">Cancel Order</button>
                        <button class="btn btn-primary w-100 mb-2">Print Invoice</button>
                        <button class="btn btn-secondary w-100 mb-2">Email Customer</button>
                        <button class="btn btn-danger w-100">Refund Order</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="main-footer font-xs"></footer>

    <script>
        function update_orderStatus(orderStatus_Id, uniqeId) {
            $.ajax({
                type: "POST",
                url: 'controller/common.php',
                data: {
                    order_statusID: orderStatus_Id,
                    UID: uniqeId
                },
                success: function(response) {
                    // $("#orderStatus").load(window.location.href + " #orderStatus");
                }
            });
        }
    </script>

    <script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendors/select2.min.js"></script>
    <script src="assets/js/vendors/perfect-scrollbar.js"></script>
    <script src="assets/js/vendors/jquery.fullscreen.min.js"></script>
    <script src="assets/js/vendors/chart.js"></script>
    <script src="assets/js/main.js?v=1.0.0"></script>
    <script src="assets/js/custom-chart.js" type="text/javascript"></script>
</body>

</html>