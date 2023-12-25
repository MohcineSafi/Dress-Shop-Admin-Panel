<?php
include_once "../config/dbconnect.php";

if (isset($_POST['upload'])) {
    // Sanitize user input to prevent SQL injection
    $ProductName = mysqli_real_escape_string($conn, $_POST['p_name']);
    $desc = mysqli_real_escape_string($conn, $_POST['p_desc']);
    $price = mysqli_real_escape_string($conn, $_POST['p_price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    // Check if required fields are not empty
    if (empty($ProductName) || empty($desc) || empty($price) || empty($category)) {
        echo "Please fill in all required fields.";
        exit();
    }

    // Upload image
    $name = $_FILES['file']['name'];
    $temp = $_FILES['file']['tmp_name'];

    $location = "./uploads/";
    $image = $location . $name;

    $target_dir = "../uploads/";
    $finalImage = $target_dir . $name;

    move_uploaded_file($temp, $finalImage);

    // Perform the SQL insertion with parameterized query to prevent SQL injection
    $query = "INSERT INTO product (product_name, product_image, price, product_desc, category_id) 
              VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssdss", $ProductName, $image, $price, $desc, $category);
        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            echo mysqli_stmt_error($stmt);
        } else {
            echo "Records added successfully.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo mysqli_error($conn);
    }
}
?>
