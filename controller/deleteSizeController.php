<?php

include_once "../config/dbconnect.php";

// Sanitize user input to prevent SQL injection
$id = mysqli_real_escape_string($conn, $_POST['record']);

// Check if size ID is provided
if (empty($id)) {
    echo "Size ID is missing.";
    exit();
}

// Use parameterized query to prevent SQL injection
$query = "DELETE FROM sizes WHERE size_id = ?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Size Deleted";
    } else {
        echo "Not able to delete";
    }

    mysqli_stmt_close($stmt);
} else {
    echo mysqli_error($conn);
}
?>
