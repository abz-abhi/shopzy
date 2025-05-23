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
            <div class="col-lg-9">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>09-2905025-882eeb7</h4>
                        <p class="text-muted">Order Date: 22-05-2025 06:19 AM</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Customer Details</h5>
                                <div class="mb-3">
                                    <p><strong>Name:</strong> kunjappan</p>
                                    <p><strong>Email:</strong> kunjappan@gmail.com</p>
                                    <p><strong>Contact Number:</strong> +123456789</p>
                                    <p><strong>Delivery Address:</strong> sdfscdfs.asdfasdf.asdfasdf.64.464</p>
                                    <p><strong>Delivery Contact no:</strong> 4.64644</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Status</h5>
                                <div class="mb-3">
                                    <p class="text-danger"><strong>Avoiding Payment</strong></p>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Order Type</th>
                                            <td>Delivery</td>
                                        </tr>
                                        <tr>
                                            <th>Payment Mode</th>
                                            <td>COD</td>
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
                                    <th># ITEM</th>
                                    <th>UNIT COST</th>
                                    <th>QTY</th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>$709.0</td>
                                    <td>1</td>
                                    <td>$2700.0</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>$900.0</td>
                                    <td>1</td>
                                    <td>$950.0</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>$830.0</td>
                                    <td>1</td>
                                    <td>$630.0</td>
                                </tr>
                            </tbody>
                        </table>

                        <hr>

                        <h5 class="mt-4">Order Timeline</h5>
                        <p><strong>22 May 2025, 08:19 am</strong><br>
                            Order placed by Kunjappan.</p>

                        <hr>

                        <h5 class="mt-4">Code: ring Perils Vibrator</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>Subtotal</th>
                                <td>$12530.00</td>
                            </tr>
                            <tr>
                                <th>Delivery Charge</th>
                                <td>$100.00</td>
                            </tr>
                            <tr>
                                <th>Handling Charge (2)%</th>
                                <td>$0</td>
                            </tr>
                            <tr>
                                <th>GST</th>
                                <td>$810.00</td>
                            </tr>
                            <tr class="table-active">
                                <th>Order Total</th>
                                <td><strong>$13540.00</strong></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Change Order Status</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <select class="form-select mb-2">
                                <option selected>Avoiding Payment</option>
                                <option>Processing</option>
                                <option>Shipped</option>
                                <option>Delivered</option>
                                <option>Cancelled</option>
                            </select>
                            <button class="btn btn-primary w-100">Change</button>
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