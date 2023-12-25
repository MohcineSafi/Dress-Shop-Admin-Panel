<?php
include_once "../config/dbconnect.php";

if (isset($_POST['upload'])) {
    // Sanitize user input to prevent SQL injection
    $size = mysqli_real_escape_string($conn, $_POST['size']);

    // Check if the size is not empty
    if (empty($size)) {
        echo "Please provide a size.";
        exit();
    }

    // Perform the SQL insertion with parameterized query to prevent SQL injection
    $query = "INSERT INTO sizes (size_name) VALUES (?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $size);
        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            echo mysqli_stmt_error($stmt);
        } else {
            echo "Records added successfully.";
            header("Location: ../index.php?size=success");
        }

        mysqli_stmt_close($stmt);
    } else {
        echo mysqli_error($conn);
    }
}
?>
