<?php
include("session.php");
include('common/header.php');
include('include/db_config.php');

if ($_GET['id'] != '') {
    $select_pro = " SELECT * FROM `product` WHERE `id`='" . $_GET['id'] . "' ";
    $result_pro = mysqli_query($con, $select_pro);

    if (mysqli_num_rows($result_pro) > 0) {
        $pro_res_row = mysqli_fetch_assoc($result_pro);
    } else {
        header('404.php');
        die();
    }
}


?>
<section class="content-main">
    <div class="row">
        <div class="col-9">
            <div class="content-header">
                <h2 class="content-title">Edit Product</h2>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Basic -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Basic</h4>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label class="form-label" for="product_name">Product title</label>
                            <input
                                class="form-control"
                                id="product_name"
                                name="productName"
                                type="text"
                                value="<?php echo $pro_res_row['name']; ?>" />
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Full description</label>
                            <textarea
                                class="form-control"
                                name="description"
                                placeholder="Type here"
                                rows="4"><?php echo $pro_res_row['discription']; ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label">MRP</label>
                                    <div class="row gx-2"></div>
                                    <input
                                        class="form-control"
                                        name="mrp"
                                        type="text"
                                        value="<?php echo $pro_res_row['mrp']; ?>" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label">Selling price</label>
                                    <input
                                        class="form-control"
                                        name="sellingPrice"
                                        placeholder="$"
                                        type="text"
                                        value="<?php echo $pro_res_row['selling_price']; ?> " />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Currency</label>
                                <select class="form-select">
                                    <option>USD</option>
                                    <option>EUR</option>
                                    <option>RUBL</option>
                                </select>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Media</h4>
                </div>
                <div class="card-body">
                    <div class="input-upload">
                        <img name="productImage" id="previewImage" src="<?php echo $pro_res_row['image'] ?>" alt="" />
                        <input name="productimg" class="form-control" type="file" id="imageInput" accept="image/*" />
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Organization</h4>
                </div>
                <div class="card-body">
                    <div class="row gx-2">
                        <div class="col-sm-6 mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select" name="category_id">
                                <option value="">select</option>
                                <?php
                                $result_cato = mysqli_query($con, " SELECT * FROM `categories` WHERE `status`='1' ORDER BY `id` DESC");
                                while ($cato_row = mysqli_fetch_assoc($result_cato)) { ?>
                                    <option value="<?php echo $cato_row['id'] ?>"
                                        <?php if ($cato_row['id'] == $pro_res_row['categorie_id']) {
                                            echo 'selected';
                                        } ?>>
                                        <?php echo $cato_row['name'] ?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <button
                class="btn btn-light rounded font-sm mr-5 text-body hover-up">
                Save to draft
            </button>
            <button onclick="count" name="addProduct" class="btn btn-md rounded font-sm hover-up">
                Add product
            </button>
            </form>
        </div>
    </div>
</section>
</main>
<script>
    const imageInput = document.getElementById('imageInput');
    const previewImage = document.getElementById('previewImage');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(event) {
                previewImage.setAttribute('src', event.target.result);
            }

            reader.readAsDataURL(file);
        }
    });
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