<?php
//Global variables
// $booking_id = $_SESSION['booking_id'];

//1. My Orders
$query = "SELECT COUNT(*) FROM `rpos_orders`  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($orders);
$stmt->fetch();
$stmt->close();

//3. Available Products
$query = "SELECT COUNT(*) FROM `rpos_products` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($products);
$stmt->fetch();
$stmt->close();

//4.My Payments
$query = "SELECT SUM(pay_amt) FROM `rpos_payments`  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($sales);
$stmt->fetch();
$stmt->close();
?>