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
  <title>Contact Us</title>
  <link rel="stylesheet" href="design.css">
</head>
<body>
  <header>
    <h1>Contact Us</h1>
  </header>
  <main>
    <form action="submit-form.php" method="POST">
      <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div>
        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>
      </div>
      <button type="submit">Submit</button>
    </form>
  </main>
  <footer>
    <!-- footer content here -->
  </footer>
</body>
</html>
