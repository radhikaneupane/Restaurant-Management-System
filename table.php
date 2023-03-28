<?php
if (isset($_POST['table'])) {
  include "config.php";

    // Get form data
	if (isset($_POST['table'])) {
	
    $name    = $_POST['name'];
    $phone   = $_POST['phone'];
    $date    = $_POST['date'];
    $time    =  $_POST['time'];
    $guests  = $_POST['guests'];
    $special = $_POST['special'];

  

    // Validate form data
    if (empty($name) || empty($phone) || empty($date) || empty($time) || empty($guests)) {
      echo "Please fill in all required fields.";
    } else {
      // Insert data into database
      $sql = "INSERT INTO bookings (name, phone, date, time, guests, special)
              VALUES ('$name', '$phone', '$date', '$time', '$guests', '$special')";

      if (mysqli_query($con, $sql)) {
        echo "Thank you for your booking! We'll be in touch shortly to confirm.";
      } else {
        echo "Sorry, there was a problem with your booking. Please try again later.";
      }
    }
  }
  // Close database connection
  mysqli_close($con);
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Restaurant Table Booking</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>Table Booking</h1>
  <form method="POST" action="table.php">

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="phone" required><br>

    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required><br>

    <label for="time">Time:</label>
    <input type="time" id="time" name="time" required><br>

    <label for="guests">Number of Guests:</label>
    <input type="number" id="guests" name="guests" min="1" max="10" required><br>

    <label for="special">Special Requests:</label>
    <textarea id="special" name="special" rows="4"></textarea><br>

    <input type="submit" value="Book Table">
  </form>
</body>
</html>
