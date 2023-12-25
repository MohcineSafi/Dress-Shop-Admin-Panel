<?php

include_once "../config/dbconnect.php";

// Retrieve data from the POST request
$v_id = mysqli_real_escape_string($conn, $_POST['v_id']);
$product = mysqli_real_escape_string($conn, $_POST['product']);
$size = mysqli_real_escape_string($conn, $_POST['size']);
$qty = mysqli_real_escape_string($conn, $_POST['qty']);

// Update the product size variation in the database
$updateItem = mysqli_query($conn, "UPDATE product_size_variation SET 
    product_id='$product', 
    size_id='$size',
    quantity_in_stock='$qty' 
    WHERE variation_id='$v_id'");

// Check if the update was successful
if ($updateItem) {
    echo "true";
} else {
    echo "Error updating product size variation: " . mysqli_error($conn);
}
?>
