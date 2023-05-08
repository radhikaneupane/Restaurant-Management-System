<?php
session_start();
include('config/config.php');
include('config/code-generator.php');

//Add cashier
if (isset($_POST['addcashier'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["cashier_number"]) || empty($_POST["cashier_name"]) || empty($_POST['cashier_email']) || empty($_POST['cashier_password'])) {
    $err = "Blank Values Not Accepted";
  } else {
    $cashier_number = $_POST['cashier_number'];
    $cashier_name = $_POST['cashier_name'];
    $cashier_email = $_POST['cashier_email'];
    $cashier_password = sha1(md5($_POST['cashier_password']));

    //Insert Captured information to a database table
    $postQuery = "INSERT INTO rpos_cashier (cashier_number, cashier_name, cashier_email, cashier_password) VALUES(?,?,?,?)";
    $postStmt = $mysqli->prepare($postQuery);
    //bind paramaters
    $rc = $postStmt->bind_param('ssss', $cashier_number, $cashier_name, $cashier_email, $cashier_password);
    $postStmt->execute();
    //declare a varible which will be passed to alert function
    if ($postStmt) {
      $success = "cashier Added" && header("refresh:1; url=cashier.php");
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
              <h3>Please Fill All Fields</h3>
            </div>
            <div class="card-body">
              <form method="POST">
                <div class="form-row">
                  <div class="col-md-6">
                    <label>cashier Number</label>
                    <input type="text" name="cashier_number" class="form-control" value="<?php echo $alpha; ?>-<?php echo $beta; ?>">
                  </div>
                  <div class="col-md-6">
                    <label>cashier Name</label>
                    <input type="text" name="cashier_name" class="form-control" value="">
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="col-md-6">
                    <label>cashier Email</label>
                    <input type="email" name="cashier_email" class="form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>cashier Password</label>
                    <input type="password" name="cashier_password" class="form-control" value="">
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="addcashier" value="Add " class="btn btn-success" value="">
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
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>