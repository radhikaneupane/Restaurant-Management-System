<?php
session_start();
include('config/config.php');
include('config/code-generator.php');

if (isset($_POST['addBooking'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["name"]) || empty($_POST["phone"]) || empty($_POST['date']) || empty($_POST['time']) || empty($_POST['guests'])) {
    $err = "Blank Values Not Accepted";
  } else {
    $name = $_POST['name'];
    $phone  = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $guests = $_POST['guests'];
    $special = $_POST['special'];
	
    //Insert Captured information to a database table
    $postQuery = "INSERT INTO rpos_bookings (name, phone, date, time, guests, special) VALUES (?, ?, ?, ?, ?, ?)";
    $postStmt = $mysqli->prepare($postQuery);
    //bind parameters
    $rc = $postStmt->bind_param('ssssis', $name, $phone, $date, $time, $guests, $special);
    $postStmt->execute();
    //declare a variable which will be passed to alert function
    if ($postStmt) {
        $success = "Successfully Booked";
        header("refresh:1; url=tablebooking.php");
    } else {
      $err = "Please Try Again Or Try Later";
    }
  }
}
require_once('partials/_head.php');
?>

<body>
  <!-- Sidenav -->
  <?php
  require_once('partials/_sidebar.php');
  ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    ?>

<div style="background-image: url(assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
  <span class="mask bg-gradient-dark opacity-8"></span>
  <div class="container-fluid">
    <div class="header-body">
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--8">
  <!-- Table -->
  <div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header border-0">
          <h3>Please Fill All Fields</h3>
        </div>
        <div class="card-body">
          <form method="POST">
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control">
              </div>
              <div class="col-md-6 mb-3">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control">
              </div>
              <div class="col-md-6 mb-3">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" class="form-control">
              </div>
              <div class="col-md-6 mb-3">
                <label for="time">Time</label>
                <input type="time" id="time" name="time" class="form-control">
              </div>
              <div class="col-md-6 mb-3">
                <label for="guests">Number of Guests</label>
                <input type="number" id="guests" name="guests" class="form-control">
              </div>
              <div class="col-md-6 mb-3">
                <label for="special">Special Request</label>
                <input type="text" id="special" name="special" class="form-control">
              </div>
            </div>
            <hr>
            <div class="form-row">

            </div>
            <br>
            <div class="form-row">
              <div class="col-md-6">
                <input type="submit" name="addBooking" value="Add Booking" class="btn btn-success" value="">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <?php
  require_once('partials/_footer.php');
  ?>
</div>