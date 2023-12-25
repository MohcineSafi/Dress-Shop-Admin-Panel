<?php
include_once "../config/dbconnect.php";

// Retrieve data from the POST request
$product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
$p_name = mysqli_real_escape_string($conn, $_POST['p_name']);
$p_desc = mysqli_real_escape_string($conn, $_POST['p_desc']);
$p_price = mysqli_real_escape_string($conn, $_POST['p_price']);
$category = mysqli_real_escape_string($conn, $_POST['category']);

// Check if the 'newImage' file is set in the POST request
if (isset($_FILES['newImage'])) {
    // Process the uploaded image
    $location = "./uploads/";
    $img = $_FILES['newImage']['name'];
    $tmp = $_FILES['newImage']['tmp_name'];
    $dir = '../uploads/';
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'webp');
    $image = rand(1000, 1000000) . "." . $ext;
    $final_image = $location . $image;

    // Check if the file has a valid extension
    if (in_array($ext, $valid_extensions)) {
        // Move the uploaded file to the target directory
        move_uploaded_file($tmp, $dir . $image);
    } else {
        echo "Invalid file format.";
        exit();
    }
} else {
    // If 'newImage' is not set, use the existing image
    $final_image = mysqli_real_escape_string($conn, $_POST['existingImage']);
}

// Update the product information in the database
$updateItem = mysqli_query($conn, "UPDATE product SET 
    product_name='$p_name', 
    product_desc='$p_desc', 
    price=$p_price,
    category_id=$category,
    product_image='$final_image' 
    WHERE product_id=$product_id");

// Check if the update was successful
if ($updateItem) {
    echo "true";
} else {
    echo "Error updating product: " . mysqli_error($conn);
}
?>
