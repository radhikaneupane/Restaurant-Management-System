<style>
  /* Style for body */
body {
    background-color: #f2f2f2;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }
  
  /* Style for heading */
  h1 {
    text-align: center;
    color: #333;
  }
  
  /* Style for form */
  form {
    max-width: 300px;
    margin: 0 auto;
    padding: 10px;
    background-color: #fff;
    box-shadow: 0 0 5px #999;
    border-radius: 10px;
  }
  
  /* Style for form label */
  form label {
    display: block;
    margin-bottom: 10px;
    color: #333;
  }
  
  form input[type="text"],
  form input[type="tel"],
  form input[type="date"],
  form input[type="time"],
  form input[type="number"],
  form textarea {
    padding: 2px;
    margin-bottom: 5px;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
    font-size: 16px;
  }
  
  /* Style for form submit button */
  form input[type="submit"] {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 16px;
  }
  
  /* Style for form submit button on hover */
  form input[type="submit"]:hover {
    background-color: #555;
  }

  body {
    background: url('https://assets.hyatt.com/content/dam/hyatt/hyattdam/images/2022/06/07/1756/KATHM-P0428-Entrance-Porch.jpg/KATHM-P0428-Entrance-Porch.16x9.jpg');
    background-size: cover;
    overflow: hidden;
    height: 50vh;
    font-family: 'Poppins', sans-serif;
    background-color: #f2f2f2;
  }
   
  /* Style for container div */
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

/* Style for form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: #fff;
  box-shadow: 0 0 5px #999;
  border-radius: 10px;
}

                                                                           
</style>

<?php

session_start();
// define database connection variables
$dbuser="root";
$dbpass="";
$host="localhost:3307";
$db="rposystem";

// create database connection
$conn = mysqli_connect($host,$dbuser, $dbpass, $db);

// check if connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // get form data
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $guests = $_POST['guests'];
  $special = $_POST['special'];

  // prepare and execute SQL query to insert data into table
$stmt = mysqli_prepare($conn, "INSERT INTO rpos_bookings (name, phone, date, time, guests, special) VALUES (?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, 'ssssis', $name, $phone, $date, $time, $guests, $special);

if (mysqli_stmt_execute($stmt)) {
  echo '<script>alert("Booking added successfully!");</script>';
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


  // close database connection
  mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Restaurant Table Booking</title>
</head>
<body>
  
  <h1>Table Booking</h1>
  <form method="POST" action="booking.php">

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