<?php

include_once "../config/dbconnect.php";

// Sanitize user input to prevent SQL injection
$c_id = mysqli_real_escape_string($conn, $_POST['record']);

// Check if category ID is provided
if (empty($c_id)) {
    echo "Category ID is missing.";
    exit();
}

// Use parameterized query to prevent SQL injection
$query = "DELETE FROM category WHERE category_id = ?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $c_id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Category Item Deleted";
    } else {
        echo "Not able to delete";
    }

    mysqli_stmt_close($stmt);
} else {
    echo mysqli_error($conn);
}
?>
