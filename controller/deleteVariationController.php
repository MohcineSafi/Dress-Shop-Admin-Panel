<?php

include_once "../config/dbconnect.php";

// Sanitize user input to prevent SQL injection
$id = mysqli_real_escape_string($conn, $_POST['record']);

// Check if variation ID is provided
if (empty($id)) {
    echo "Variation ID is missing.";
    exit();
}

// Use parameterized query to prevent SQL injection
$query = "DELETE FROM product_size_variation WHERE variation_id = ?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Variation Deleted";
    } else {
        echo "Not able to delete";
    }

    mysqli_stmt_close($stmt);
} else {
    echo mysqli_error($conn);
}
?>
