<?php
include_once "../config/dbconnect.php";

if (isset($_POST['upload'])) {
    // Sanitize user inputs to prevent SQL injection
    $product = mysqli_real_escape_string($conn, $_POST['product']);
    $size = mysqli_real_escape_string($conn, $_POST['size']);
    $qty = mysqli_real_escape_string($conn, $_POST['qty']);

    // Check if any input is empty
    if (empty($product) || empty($size) || empty($qty)) {
        echo "Please provide all necessary information.";
        exit();
    }

    // Perform the SQL insertion with parameterized query to prevent SQL injection
    $query = "INSERT INTO product_size_variation (product_id, size_id, quantity_in_stock) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "iii", $product, $size, $qty);
        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            echo mysqli_stmt_error($stmt);
            header("Location: ../dashboard.php?variation=error");
        } else {
            echo "Records added successfully.";
            header("Location: ../dashboard.php?variation=success");
        }

        mysqli_stmt_close($stmt);
    } else {
        echo mysqli_error($conn);
    }
}
?>
