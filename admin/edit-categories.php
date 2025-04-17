<?php
include("session.php");
include('common/header.php');
include('include/db_config.php');

if ($_GET['id'] != '') {

    $select = " SELECT * FROM `categories` WHERE `id` = '" . $_GET['id'] . "'";
    $result = mysqli_query($con, $select);

    if (mysqli_num_rows($result) == true) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header('location:404.php');
        die();
    }
} else {
    header('location:tables.php');
    die();
}

if (isset($_POST['update'])) {

    $updateName =  mysqli_real_escape_string($con, $_POST['name']);
    $date_time = date("Y-m-d H:i:s");

    if ($_FILES['upImage']['name'] != '') {
        $imageName = $_FILES['upImage']['name'];
        $imageTmp = $_FILES['upImage']['tmp_name'];
        $uploadDir = 'uploads/';
        $targetPath = $uploadDir . basename($imageName);

        if (move_uploaded_file($imageTmp, $targetPath)) {
            $targetPath1 = $targetPath;
        } else {
            echo "updation faild!";
        }
    } else {
        $targetPath1 = $row['image'];
    }




    $query = "UPDATE `categories` SET 
    `name`= '$updateName' ,
    `image` = '$targetPath1',
    `updated_on` = '$date_time' 
WHERE  `id` ='" . $_GET['id'] . "'";
mysqli_query($con, $query);
}
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Categories</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Categories</li>
            </ol>
            <div class="card mb-4">
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Edit Categories
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row mb-3" style="gap: 40px;">
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="name" value="<?php echo $row['name'];  ?>" />
                                    <label for="inputFirstName">User Name</label>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="product_image">Current Image</label><br>
                                <img src="<?php echo $row['image']; ?>" alt="Current Image" style="max-width: 100px; max-height: 100px;">
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="product_image">Upload New Image</label>
                                <div class="input-upload">
                                    <input class="form-control" type="file" name="upImage" />
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                <!-- <button name="update" type="submit" class="btn btn-primary btn-block">Update</button> -->
                                <input type="submit" name="update" value="Update">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2023</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="assets/js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="assets/js/datatables-simple-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>