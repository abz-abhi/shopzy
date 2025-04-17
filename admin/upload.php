<?php
if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["avatar"]["name"]);

    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetFile)) {
        echo "File uploaded successfully!";
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "No file uploaded or an error occurred.";
}
