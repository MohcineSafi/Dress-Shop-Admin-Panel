<?php

include_once "../config/dbconnect.php";

// Sanitize user input to prevent SQL injection
$p_id = mysqli_real_escape_string($conn, $_POST['record']);

// Check if product ID is provided
if (empty($p_id)) {
    echo "Product ID is missing.";
    exit();
}

// Use parameterized query to prevent SQL injection
$query = "DELETE FROM product WHERE product_id = ?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $p_id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Product Item Deleted";
    } else {
        echo "Not able to delete";
    }

    mysqli_stmt_close($stmt);
} else {
    echo mysqli_error($conn);
}
?>
