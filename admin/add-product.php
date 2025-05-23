<?php
include("session.php");
include('common/header.php');
include('include/db_config.php'); ?>
<section class="content-main">
  <div class="row">
    <div class="col-9">
      <div class="content-header">
        <h2 class="content-title">Add New Product</h2>
      </div>
    </div>
    <div class="col-lg-6">
      <!-- Basic -->
      <div class="card mb-4">
        <div class="card-header">
          <h4>Basic</h4>
        </div>
        <div class="card-body">

          <?php

          if (isset($_POST['addProduct'])) {

            $productname = mysqli_real_escape_string($con, $_POST['productName']);
            $description = mysqli_real_escape_string($con, $_POST['description']);
            $mrp = $_POST['mrp'];
            $sellprice = $_POST['sellingPrice'];
            $date_time = date("Y-m-d H-i-s");

            $proimgName = $_FILES['productimg']['name'];
            $proimgTemp = $_FILES['productimg']['tmp_name'];
            $uploadDir = "uploads/product/";
            $targetPath = $uploadDir . basename($proimgName);
            $categorie_id = $_POST['category_id'];

            if (move_uploaded_file($proimgTemp, $targetPath)) {

              echo $query = "INSERT INTO `product`(`name`,`categorie_id`,`selling_price`,`mrp`,`discription`,`image`,`status`,`featured`,`created_on`,`updated_on`)
                                  VALUES('$productname','$categorie_id','$sellprice','$mrp','$description','$targetPath','1','1','$date_time','$date_time')";

              if (mysqli_query($con, $query)) {

                $pro_id = mysqli_insert_id($con);
                $galleryDir = "uploads/product/gallery/";
                $allowedFileType = array('jpg', 'png', 'jpeg');

                if (!empty(array_filter($_FILES['productGall']['name']))) {

                  foreach ($_FILES['productGall']['name'] as $id => $val) {

                    $gallImgName = $_FILES['productGall']['name'][$id];
                    $gallImgTemp = $_FILES['productGall']['tmp_name'][$id];
                    $cat_banner = time() . '.' . $gallImgName;
                    $targetGallPath = $galleryDir . $cat_banner;
                    $fileType = strtolower(pathinfo($targetGallPath, PATHINFO_EXTENSION));

                    if (in_array($fileType,  $allowedFileType)) {


                      if (move_uploaded_file($gallImgTemp, $targetGallPath)) {

                        $sqlVal = "('$pro_id','" . $targetGallPath . "','" . $date_time . "')";
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
                    if (! empty($sqlVal)) {

                      $pro_gallery = "INSERT INTO product_gallery (pro_id, image, created_on) VALUES $sqlVal ";
                      $insert = mysqli_query($con, $pro_gallery);

                      if ($insert) {

                        $response = array(
                          "status" => "alert-success",
                          "message" => "Files successfully uploaded."
                        );
                      } else {
                        $response = array(
                          "status" => "alert-danger",
                          "message" => "Files coudn't be uploaded due to database error."
                        );
                      }
                    }
                  }
                } else {
                  // Error
                  $response = array(
                    "status" => "alert-danger",
                    "message" => "Please select a file to upload."
                  );
                }
                echo '<script>alert("Product added"); window.location.href="add-product.php"</script>';
              } else {
                echo "error !";
              }
            }
          }
          ?>


          <form method="POST" enctype="multipart/form-data">
            <div class="mb-4">
              <label class="form-label" for="product_name">Product title</label>
              <input
                class="form-control"
                id="product_name"
                name="productName"
                type="text"
                placeholder="Type here" />
            </div>
            <div class="mb-4">
              <label class="form-label">Full description</label>
              <textarea
                class="form-control"
                name="description"
                placeholder="Type here"
                rows="4"></textarea>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-4">
                  <label class="form-label">MRP</label>
                  <div class="row gx-2"></div>
                  <input
                    class="form-control"
                    name="mrp"
                    placeholder="$"
                    type="number" />
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-4">
                  <label class="form-label">Selling price</label>
                  <input
                    class="form-control"
                    name="sellingPrice"
                    placeholder="$"
                    type="number" />
                </div>
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
            <img name="productImage" id="previewImage" src="assets/imgs/theme/upload.svg" alt="" />
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
              <select class="form-select" name="category_id" required>
                <option value="">select</option>
                <?php
                $result_cat = mysqli_query($con, "SELECT * FROM `categories` WHERE `status`='1' ORDER BY `id`");
                while ($row_cat = mysqli_fetch_assoc($result_cat)) {
                ?>
                  <option value="<?php echo $row_cat['id']; ?>"><?php echo $row_cat['name']; ?></option>
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
            <img name="productImage" id="previewImages" src="assets/imgs/theme/upload.svg" alt="" />
            <input name="productGall[]" class="form-control" type="file" id="imageInputs" accept="image/*" multiple />
          </div>
        </div>
      </div>
      <button
        class="btn btn-light rounded font-sm mr-5 text-body hover-up">
        Save to draft
      </button>
      <button type="submit" name="addProduct" class="btn btn-md rounded font-sm hover-up">
        Add product
      </button>
      </form>
    </div>
  </div>
</section>

<footer class="main-footer font-xs">
  </div>
</footer>
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

  const imageInputs = document.getElementById('imageInputs');
  const previewImages = document.getElementById('previewImages');

  imageInputs.addEventListener('change', function() {
    const file = this.files[0];

    if (file) {
      const reader = new FileReader();

      reader.onload = function(event) {
        previewImages.setAttribute('src', event.target.result);
      }

      reader.readAsDataURL(file);
    }
  })
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