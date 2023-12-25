<?php

include_once "../config/dbconnect.php";

// Retrieve data from the POST request
$order_id = mysqli_real_escape_string($conn, $_POST['record']);

// Fetch the current payment status from the database
$sql = "SELECT pay_status FROM orders WHERE order_id='$order_id'";
$result = $conn->query($sql);

if (!$result) {
    echo "Error fetching payment status: " . mysqli_error($conn);
    exit();
}

$row = $result->fetch_assoc();

// Toggle the payment status between 0 and 1
$new_pay_status = ($row["pay_status"] == 0) ? 1 : 0;

// Update the payment status in the database
$update = mysqli_query($conn, "UPDATE orders SET pay_status='$new_pay_status' WHERE order_id='$order_id'");

// Check if the update was successful
if ($update) {
    echo "success";
} else {
    echo "Error updating payment status: " . mysqli_error($conn);
}
?>
