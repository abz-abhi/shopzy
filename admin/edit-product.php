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

if (isset($_POST['editProduct'])) {

    $edit_pro_name = mysqli_real_escape_string($con, $_POST['productName']);
    $edit_pro_disc = mysqli_real_escape_string($con, $_POST['description']);
    $edit_pro_mrp = $_POST['mrp'];
    $edit_pro_sell = $_POST['sellingPrice'];
    $edit_dateTime = date("Y-m-d H:i:s");
    $edit_cat_id = $_POST['category_id'];

    if ($_FILES['productimg']['name'] != '') {

        $edit_pro_img = time() . '.' . $_FILES['productimg']['name'];
        $edit_img_temp = $_FILES['productimg']['tmp_name'];
        $uploadDir = 'uploads/product';
        $targetPath = $uploadDir . basename($edit_pro_img);

        if (move_uploaded_file($edit_img_temp, $targetPath)) {
            $finalImagePath  = $targetPath;
        } else {
            $finalImagePath = $pro_res_row['image'];
        }
    } else {
        $finalImagePath = $pro_res_row['image'];
    }

    $query = " UPDATE `product` SET `name`='$edit_pro_name',
                                    `discription`='$edit_pro_disc',
                                    `mrp`='$edit_pro_mrp',
                                    `selling_price`='$edit_pro_sell',
                                    `image`='$finalImagePath',
                                    `categorie_id`='$edit_cat_id',
                                    `updated_on`='$edit_dateTime'
                                    WHERE `id`='" . $_GET['id'] . "'";
    mysqli_query($con, $query);

    $editGallDir = "uploads/product/gallery/";
    $allowedFileType = array('jpg', 'png', 'jpeg');

    if (!empty(array_filter($_FILES['editProductGall']['name']))) {

        foreach ($_FILES['editProductGall']['name'] as $id => $val) {

            $prod_id = $pro_res_row['id'];

            $editGall_imgName = $_FILES['editProductGall']['name'][$id];
            $editGall_imgTemp = $_FILES['editProductGall']['tmp_name'][$id];
            $cat_banner = time() . '.' . $editGall_imgName;
            $edit_target_path = $editGallDir . $cat_banner;
            $chechExten = strtolower(pathinfo($edit_target_path, PATHINFO_EXTENSION));

            if (in_array($chechExten, $allowedFileType)) {

                if (move_uploaded_file($editGall_imgTemp, $edit_target_path)) {
                    $editSqlVal = "('$prod_id','" . $edit_target_path . "','" . $edit_dateTime . "')";
                } else {

                    $response = array(
                        "status" => "alert-danger",
                        "message" => "File coud not be uploaded."
                    );
                }
            } else {

                $response = array(
                    "status" => "alert-danger",
                    "message" => "Only .jpg, .jpeg and .png file formats allowed."
                );
            }

            if (!empty($editSqlVal)) {
                $edit_prod_gall = " INSERT INTO product_gallery (pro_id, image, created_on) VALUES $editSqlVal ";
                $editInsert = mysqli_query($con, $edit_prod_gall);

                if ($editInsert) {
                    echo "<script>window.location.href='page-products-list.php'</script>";
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Files coudn't be uploaded due to database error."
                    );
                }
            }
        }
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
                                        type="number"
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
                                        type="number"
                                        value="<?php echo $pro_res_row['selling_price']; ?>" />
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
                    <p>Dimensions (894 x 1251)</p>
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
                        <div class="col-sm-12 mb-3">
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
        </div>

        <div class="col-lg-3">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Product gallery </h4>
                    <p>Dimensions (894 x 1251)</p>
                </div>
                <div class="card-body">
                    <div class="input-upload">
                        <img name="editProductImage" id="previewImages" src="assets/imgs/theme/upload.svg" alt="" />
                        <input name="editProductGall[]" class="form-control" type="file" id="imageInputs" accept="image/*" multiple />
                    </div>
                </div>
            </div>

            <button
                class="btn btn-light rounded font-sm mr-5 text-body hover-up">
                Save to draft
            </button>
            <button onclick="count" name="editProduct" class="btn btn-md rounded font-sm hover-up">
                Edit product
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