<?php
//waiters
// $query = "SELECT COUNT(*) FROM `rpos_booking` ";
// $stmt = $mysqli->prepare($query);
// $stmt->execute();
// $stmt->bind_result($booking);
// $stmt->fetch();
// $stmt->close();

// Orders
$query = "SELECT COUNT(*) FROM `rpos_orders` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($orders);
$stmt->fetch();
$stmt->close();

// Orders
$query = "SELECT COUNT(*) FROM `rpos_products` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($products);
$stmt->fetch();
$stmt->close();

//Sales
$query = "SELECT SUM(pay_amt) FROM `rpos_payments` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($sales);
$stmt->fetch();
$stmt->close();
