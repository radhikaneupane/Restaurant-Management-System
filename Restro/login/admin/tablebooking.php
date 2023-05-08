<?php
session_start();
include('config/config.php');
if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
  $adn = "DELETE FROM rpos_bookings WHERE id = ?";
  $stmt = $mysqli->prepare($adn);
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $stmt->close();
  if ($stmt) {
    $success = "Booked" && header("refresh:1; url=tablebooking.php");
  } else {
    $err = "Try again later.";
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
    <!-- Header -->
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
              <a href="addbooking.php" class="btn btn-outline-success">
                <i class="fas fa-table"></i>
                Add Booking
              </a>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Guests</th>
                    <th scope="col">Special Request</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $ret = "SELECT * FROM  rpos_bookings ";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($book = $res->fetch_object()) {
                  ?>
                    <tr>
                      <td><?php echo $book->name; ?></td>
                      <td><?php echo $book->phone; ?></td>
                      <td><?php echo $book->date; ?></td>
                      <td><?php echo $book->time; ?></td>
                      <td><?php echo $book->guests; ?></td>
                      <td><?php echo $book->special; ?></td>
                   
                      
                      
                      <td>

                       </a><a href="tablebooking.php?delete=<?php echo $book->id; ?>">
                       <button class="btn btn-sm btn-danger">
                       <i class="fas fa-check"></i>
                        Booked
                       </button>
                       </a>

                        </a>
                      </td>
                    </tr>
                  <?php
                 } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php
      require_once('partials/_footer.php');
      ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>