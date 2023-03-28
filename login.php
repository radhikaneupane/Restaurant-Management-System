<?php
session_start();

if (isset($_POST['login'])) {
  include "config.php";
  
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query the database to check if the username and password are valid
  $result_query = "SELECT * FROM users WHERE Username = '$username' AND Password = '$password'";
  $user_result = mysqli_query($con, $result_query);

  if (!$user_result) {
    // Handle database query error
    echo "Error: " . mysqli_error($con);
    exit();
  }

  if (mysqli_num_rows($user_result) == 1) {
    // User has been found, log them in
    $_SESSION['username'] = $username;
    $_SESSION['user_type'] = 'admin';
    header("Location: dashboard.php");
    exit();
  } else {
    // Invalid username or password, display an error message
    $error = "Invalid username or password. Please try again.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Restaurant Management System</title>
  <link rel="stylesheet" href="design.css">
</head>
<body>
  <header class="header-section">
    <nav class="Nav-bar">
      <h1>Restaurant Management System</h1>
      <ul type="none" class="nav_link_list">
        <li><a href="aboutus.php">AboutUs</a></li>
        <li><a href="contactus.php">Contact us</a></li>
        <li><a href="table.php">Book us</a></li>
      </ul>
    </nav>
  </header>
  <center>
    <form method="POST" action="login.php">
      <div class="box">
        <h1>Login Form</h1>
        <?php if (isset($error)) : ?>
          <div style="color: red;"><?php echo $error; ?></div>
        <?php endif; ?>
        <div>
          <input type="text" placeholder="Username" name="username" required>
        </div>
        <div>
          <input type="password" placeholder="Password" name="password" required>
        </div>
        <div>
          <input type="submit" value="Login" name="login">
        </div>
      </div>
    </form>
  </center>
</body>
</html>


