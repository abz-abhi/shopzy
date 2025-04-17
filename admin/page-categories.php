<?php
include("session.php");
include('common/header.php');
include('include/db_config.php');
?>

<section class="content-main">
  <div class="content-header">
    <div>
      <h2 class="content-title card-title">Categories</h2>
      <p>Add, edit or delete a category</p>
    </div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Add categorie
    </button>

    <?php
    if (isset($_POST['addcategorie'])) {
      $name = $_POST['name'];

      $imageName = $_FILES['image']['name'];
      $imageTmp = $_FILES['image']['tmp_name'];
      $date_time = date("Y-m-d H:i:s");

      $uploadDir = 'uploads/';
      $targetPath = $uploadDir . basename($imageName);

      if (move_uploaded_file($imageTmp, $targetPath)) {

        $query = "INSERT INTO `categories` (`name`,`image`,`status`,`created_on`,`updated_on`)
                                            VALUES ('$name','$targetPath','1','$date_time','$date_time')";

        if (mysqli_query($con, $query)) {
          echo '<script> window.location.href="page-categories.php"</script>';
        } else {
        }
      }
    }
    ?>
    <!-- Bootstrap popup 1 -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add categorie</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="col-md-12">
                <div class="mb-4">
                  <label class="form-label" for="product_name">Name</label>
                  <input
                    class="form-control"
                    id="product_name"
                    type="text"
                    placeholder="Type here"
                    name="name"
                    required />
                </div>
                <div class="mb-4">
                  <label class="form-label" for="product_image">Images</label>
                  <div class="input-upload">
                    <input class="form-control" type="file" name="image" required />
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button class="btn btn-primary" name="addcategorie">Create category</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div>
      <input
        class="form-control bg-white"
        type="text"
        placeholder="Search Categories" />
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table" id="categoriesTable">
              <thead>
                <tr>
                  <th class="text-center">Images</th>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th class="text-end">Action</th>
                </tr>
              </thead>
              <tbody>

                <?php

                $result = mysqli_query($con, "SELECT * FROM `categories` ORDER BY `id`");
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <td class="text-center align-middle h-[100px]">
                      <img src="<?php echo $row['image']; ?>" style="width: 70px; height: 70px;">
                    </td>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php
                        if ($row['status'] == 1) {
                          echo '<span class="badge bg-success" >Active</span>';
                        } else {
                          echo '<span class="badge bg-danger" >Inactive</span>';
                        }
                        ?>
                    </td>
                    <td class="text-end">
                      <div class="form-check form-switch">
                        <?php if ($row['status'] == 1) {
                          echo '<input onclick="publish(' . $row['id'] . ',0)" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked="">';
                        } else {
                          echo '<input onclick="publish(' . $row['id'] . ',1)" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" >';
                        } ?>
                      </div>
                      <a href="edit-categories.php?id=<?php echo $row['id'] ?>" class="badge bg-warning text-dark">Edit</a>
                      <button onclick="delete_user('<?php echo $row['id'] ?>')" class="badge bg-danger text-dark">Delete</button>
                    </td>
                  </tr>
                <?php $i++;
                }; ?>

                <script>
                  function publish(user_id, value) {
                    $.ajax({
                      type: "POST",
                      url: 'controller/common.php',
                      data: {
                        activate_user_id: user_id,
                        value: value
                      },
                      success: function(response) {
                        alert("Your data updated");
                        $("#categoriesTable").load(window.location.href + " #categoriesTable");
                      }
                    });
                  }

                  function delete_user(id) {
                    $.ajax({
                      type: "POST",
                      url: 'controller/common.php',
                      data: {
                        id: id
                      },
                      success: function(response) {
                        alert("Your data deleted");
                        $("#categoriesTable").load(window.location.href + " #categoriesTable");
                      }
                    });
                  }
                </script>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<footer class="main-footer font-xs">
  <div class="row pb-30 pt-15">
    <div class="col-sm-6">
      <script>
        document.write(new Date().getFullYear());
      </script>
      &copy;, Ecom - HTML Ecommerce Template .
    </div>
    <div class="col-sm-6">
      <div class="text-sm-end">All rights reserved</div>
    </div>
  </div>
</footer>
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