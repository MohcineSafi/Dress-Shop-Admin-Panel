<?php

include_once "../config/dbconnect.php";

// Retrieve data from the POST request
$order_id = mysqli_real_escape_string($conn, $_POST['record']);

// Fetch the current order status from the database
$sql = "SELECT order_status FROM orders WHERE order_id='$order_id'";
$result = $conn->query($sql);

if (!$result) {
    echo "Error fetching order status: " . mysqli_error($conn);
    exit();
}

$row = $result->fetch_assoc();

// Toggle the order status between 0 and 1
$new_order_status = ($row["order_status"] == 0) ? 1 : 0;

// Update the order status in the database
$update = mysqli_query($conn, "UPDATE orders SET order_status='$new_order_status' WHERE order_id='$order_id'");

// Check if the update was successful
if ($update) {
    echo "success";
} else {
    echo "Error updating order status: " . mysqli_error($conn);
}
?>
