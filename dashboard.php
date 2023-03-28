<?php
// session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
 
  <style>

    .success-message {
      background-color: #4CAF50;
      color: white;
      padding: 10px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <?php
  // session_start();
  if (isset($_SESSION['message'])) {
    echo '<div class="success-message">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);
  }
  ?>
  <h1>Welcome to your dashboard</h1>

</body>
</html>
