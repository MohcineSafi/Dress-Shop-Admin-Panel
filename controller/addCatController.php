<?php
include_once "../config/dbconnect.php";

if (isset($_POST['upload'])) {
    // Sanitize user input to prevent SQL injection
    $catname = mysqli_real_escape_string($conn, $_POST['c_name']);

    // Check if the category name is not empty
    if (empty($catname)) {
        header("Location: ../dashboard.php?category=error");
        exit(); // Stop script execution to prevent further processing
    }

    // Perform the SQL insertion with parameterized query to prevent SQL injection
    $query = "INSERT INTO category (category_name) VALUES (?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $catname);
        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            echo mysqli_stmt_error($stmt);
            header("Location: ../dashboard.php?category=error");
        } else {
            header("Location: ../dashboard.php?category=success");
        }

        mysqli_stmt_close($stmt);
    } else {
        echo mysqli_error($conn);
        header("Location: ../dashboard.php?category=error");
    }
}
?>
