<?php
include("session.php");
include('common/header.php');
include('include/db_config.php'); ?>
<section class="content-main">
  <div class="content-header">
    <div>
      <h2 class="content-title card-title">Products List</h2>
    </div>
    <div>
      <a class="btn btn-light rounded font-md" href="#">Export</a>
      <a class="btn btn-light rounded font-md" href="#">Import</a>
      <a class="btn btn-primary btn-sm rounded" href="add-product.php">Create new</a>
    </div>
  </div>
  <div class="card mb-4">
    <header class="card-header">
      <div class="row align-items-center">
        <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
          <select class="form-select">
            <option selected="">All category</option>
            <option>Electronics</option>
            <option>Clothes</option>
            <option>Automobile</option>
          </select>
        </div>
        <div class="col-md-2 col-6">
          <input class="form-control" type="date" value="02.05.2022" />
        </div>
        <div class="col-md-2 col-6">
          <select class="form-select">
            <option selected="">Status</option>
            <option>Active</option>
            <option>Disabled</option>
            <option>Show all</option>
          </select>
        </div>
      </div>
    </header>
    <!-- card-header end//-->
    <div class="card-body">
      <table class="itemlist" id="productTable">
        <thead>
          <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Status</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>

        <?php

        $result = mysqli_query($con, "SELECT * FROM `product` ORDER BY `id`");

        while ($row = mysqli_fetch_assoc($result)) {
        ?>

          <tbody>
            <tr>
              <td style="vertical-align: middle;"><?php echo $row['id'] ?></td>
              <td style="vertical-align: middle;"><img
                  style="width: 70px; height: 70px;"
                  class="img-sm img-thumbnail"
                  src="<?php echo $row['image']; ?>"
                  alt="Item" /></td>
              <td style="vertical-align: middle;">
                <h6 class="mb-0"><?php echo $row['name'] ?></h6>
              </td>
              <td style="vertical-align: middle;"><span><?php echo $row['selling_price'] ?></span></td>
              <td style="vertical-align: middle;">
                <?php
                if ($row['status'] == 1) {
                  echo '<span class="badge rounded-pill alert-success">Active</span>';
                } else {
                  echo '<span class="badge rounded-pill alert-danger">Inative</span>';
                }
                ?>
              </td>
              <td style="vertical-align: middle;"> <span><?php echo $row['created_on'] ?></span></td>
              <td style="vertical-align: middle;">
                <div class="form-check form-switch">
                  <?php
                  if ($row['status'] == 1) {
                    echo '<input onclick="prod_status(' . $row['id'] . ',0)" class="form-check-input" type="checkbox" role="switch" checked="">';
                  } else {
                    echo '<input onclick="prod_status(' . $row['id'] . ',1)" class="form-check-input" type="checkbox" role="switch" >';
                  }
                  ?>
                </div>
                <a class="btn btn-sm font-sm rounded btn-brand mr-5" href="edit-product.php?id=<?php echo $row['id'] ?>">
                  <i class="material-icons md-edit"></i> Edit</a>
                <button class="btn btn-sm font-sm btn-light rounded" onclick="delete_product(<?php echo $row['id'] ?>)">
                  <i class="material-icons md-delete_forever"></i> Delete</button>
              </td>
            </tr>
          <?php } ?>
          </tbody>
          <table />
    </div>
  </div>
</section>
<script>
  function prod_status(prod_id, prod_value) {
    $.ajax({
      type: "POST",
      url: 'controller/common.php',
      data: {
        active_status_id: prod_id,
        status_value: prod_value
      },
      success: function(response) {
        alert("product status updated");
        $("#productTable").load(window.location.href + " #productTable");
      }
    })
  }

  function delete_product(id) {
    $.ajax({
      type: "POST",
      url: 'controller/common.php',
      data: {
        prodId: id
      },
      success: function(response) {
        alert("Your data deleted");
        $("#productTable").load(window.location.href + " #productTable");
      }
    });
  }
</script>

</main>
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