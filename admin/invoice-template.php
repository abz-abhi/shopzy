<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'include/db_config.php'; // Include your DB connection
$orderId = $_GET['order_id'];

$selectOrder = mysqli_query($con, "SELECT * FROM `orders` WHERE `uniqe_id` = '$orderId'");
$resultOrder = mysqli_fetch_assoc($selectOrder);

$user_id = $resultOrder['user_id'];
$shippingId = $resultOrder['shipping_id'];

$selectUser = mysqli_query($con, "SELECT * FROM `users` WHERE `id` = '$user_id'");
$resultUser = mysqli_fetch_assoc($selectUser);

$selectAddress = mysqli_query($con, "SELECT * FROM `shipping` WHERE `id` = '$shippingId'");
$resultAddress = mysqli_fetch_assoc($selectAddress);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            padding: 20px;
        }

        h1,
        h3,
        h4,
        h5 {
            margin: 0 0 10px;
        }

        .section {
            margin-bottom: 20px;
        }

        .bordered {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total-row th,
        .total-row td {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h1>Invoice: OD-<?php echo $resultOrder['uniqe_id']; ?></h1>
    <p>Order Date: <?php echo $resultOrder['created_on']; ?></p>

    <div class="section bordered">
        <h4>Customer Details</h4>
        <p><strong>Name:</strong> <?php echo $resultUser['user_name']; ?></p>
        <p><strong>Email:</strong> <?php echo $resultUser['email']; ?></p>
        <p><strong>Phone:</strong> <?php echo $resultUser['phone_number']; ?></p>
        <p><strong>Address:</strong> <?php echo $resultAddress['adress']; ?></p>
        <p><strong>Delivery Contact:</strong> <?php echo $resultAddress['phone_number']; ?></p>
    </div>

    <div class="section bordered">
        <h4>Order Status & Payment</h4>
        <p><strong>Status:</strong> Awaiting Payment</p>
        <p><strong>Order Type:</strong> Delivery</p>
        <p><strong>Payment Method:</strong> <?php echo $resultOrder['pay_method']; ?></p>
    </div>

    <div class="section">
        <h4>Order Items</h4>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Item</th>
                    <th>Unit Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $selectItems = mysqli_query($con, "SELECT * FROM `order_items` WHERE `order_id` = '$orderId'");
                $count = 1;
                while ($resItems = mysqli_fetch_assoc($selectItems)) {
                    $itemId = $resItems['item_id'];
                    $selectProd = mysqli_query($con, "SELECT * FROM `product` WHERE `id` = '$itemId'");
                    $resProd = mysqli_fetch_assoc($selectProd);
                ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $resProd['name']; ?></td>
                        <td><?php echo $resItems['price']; ?></td>
                        <td><?php echo $resItems['qty']; ?></td>
                        <td><?php echo $resItems['total']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="section">
        <h4>Summary</h4>
        <table>amount
            <tr>
                <th>Subtotal</th>
                <td><?php echo $resultOrder['sub_total']; ?></td>
            </tr>
            <tr>
                <th>Delivery Charge</th>
                <td>0</td>
            </tr>
            <tr>
                <th>Handling Charge (0%)</th>
                <td>0</td>
            </tr>
            <tr>
                <th>GST</th>
                <td>0</td>
            </tr>
            <tr class="total-row">
                <th>Total</th>
                <td><?php echo $resultOrder['sub_total']; ?></td>
            </tr>
        </table>
    </div>

</body>

</html>