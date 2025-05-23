<?php
include("session.php");
include('common/header.php');
include('include/db_config.php');
?>



<div class="card" style="background-color: #f4f5f9;">
    <h2 style="margin-left: 40px; margin-top: 20px;">Order List</h2>
    <div class="card-body" style="margin: 20px; background-color: white;">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table" id="categoriesTable">
                        <thead>
                            <tr>
                                <th class="text-center">Order Id</th>
                                <th>Customer Details</th> <!-- Fixed spelling -->
                                <th>Date</th>
                                <th>Order Status</th>
                                <th>Payment Type</th>
                                <th>Order Total</th>
                                <th>View/Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $selectOrders = mysqli_query($con, "SELECT * FROM `orders` ORDER BY  `id`");
                            while ($ResOrder = mysqli_fetch_assoc($selectOrders)) {
                                $userId = $ResOrder['user_id'];

                                $selectUser = mysqli_query($con, "SELECT * FROM `users` WHERE `id` = '$userId' ");
                                while ($User = mysqli_fetch_assoc($selectUser)) {

                            ?>
                                    <tr>
                                        <td class="text-center align-middle">
                                            OD-<?php echo $ResOrder['uniqe_id'] ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?php echo $User['user_name'] ?><br><?php echo $User['phone_number'] ?></td>
                                        <td style="vertical-align: middle;"><?php echo $ResOrder['created_on'] ?></td>
                                        <td style="vertical-align: middle;">
                                            <?php if ($ResOrder['status'] == 1) { ?>
                                                <span class="badge bg-primary">Order Placed</span>
                                            <?php } else if ($ResOrder['status'] == 2) { ?>
                                                <span class="badge bg-info text-dark">In Production</span>
                                            <?php } else if ($ResOrder['status'] == 3) { ?>
                                                <span class="badge bg-warning text-dark">In Shipping</span>
                                            <?php } else if ($ResOrder['status'] == 4) { ?>
                                                <span class="badge bg-secondary">Shipping Final Mile</span>
                                            <?php } else { ?>
                                                <span class="badge bg-success">Delivered</span>
                                            <?php } ?>

                                        </td>
                                        <td style="vertical-align: middle;"><?php echo $ResOrder['pay_method'] ?></td>
                                        <td style="vertical-align: middle;"><?php echo $ResOrder['sub_total'] ?></td>
                                        <td style="vertical-align: middle;"><a href="view-edit.php" class="badge bg-info text-dark">View Or Edit</a></td>
                                        
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



