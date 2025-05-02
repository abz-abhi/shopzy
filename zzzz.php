<?php

// product gallery image uploading
$uploadsDir = "uploads/products/gallery/";
$allowedFileType = array('jpg', 'png', 'jpeg');
// Velidate if files exist
if (!empty(array_filter($_FILES['fileUpload']['name']))) {
    // Loop through file items
    foreach ($_FILES['fileUpload']['name'] as $id => $val) {
        // Get files upload path
        $fileName1        = $_FILES['fileUpload']['name'][$id];
        $tempLocation    = $_FILES['fileUpload']['tmp_name'][$id];
        //$photoExt1 = @end(explode('.', $fileName)); // explode the image name to get the extension
        //  $phototest1 = strtolower($photoExt1);                
        $cat_banner = time() . '.' . $fileName1;
        $targetFilePath  = $uploadsDir . $cat_banner;
        $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        $uploadDate      = date('Y-m-d H:i:s');
        $uploadOk = 1;
        if (in_array($fileType, $allowedFileType)) {
            //if( compressedImage( $tempLocation, $targetFilePath, 60)){
            if (move_uploaded_file($tempLocation, $targetFilePath)) {
                $sqlVal = "('$pro_id','" . $targetFilePath . "', '" . $uploadDate . "')";
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
        // Add into MySQL database
        if (!empty($sqlVal)) {
            $pro_gallery = "INSERT INTO product_img_gallery (pro_id, img, created_on) VALUES $sqlVal";
            $insert = mysqli_query($con, $pro_gallery);
            //$insert = $conn->query("INSERT INTO product_img_gallery (pro_id, img, created_on) VALUES $sqlVal");
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
// product gallery image uploading end
