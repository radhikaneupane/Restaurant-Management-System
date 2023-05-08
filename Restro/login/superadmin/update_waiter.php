<?php
session_start();
include('config/config.php');
include('config/code-generator.php');

//Udpate waiter
if (isset($_POST['Updatewaiter'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["waiter_phoneno"]) || empty($_POST["waiter_name"]) || empty($_POST['waiter_email']) || empty($_POST['waiter_password'])) {
    $err = "Blank Values Not Accepted";
  } else {
    $waiter_phoneno = $_POST['waiter_phoneno'];
    $waiter_name = $_POST['waiter_name'];
    $waiter_email = $_POST['waiter_email'];
    $waiter_password = $_POST['waiter_password'];
    $update = $_GET['update'];

    //Insert Captured information to a database table
    $postQuery = "UPDATE rpos_waiter SET  waiter_phoneno =?, waiter_name =?, waiter_email =?, waiter_password =? WHERE waiter_id =?";
    $postStmt = $mysqli->prepare($postQuery);
    //bind paramaters
    $rc = $postStmt->bind_param('ssssi', $waiter_phoneno, $waiter_name, $waiter_email, $waiter_password, $update);
    $postStmt->execute();
    //declare a varible which will be passed to alert function
    if ($postStmt) {
      $success = "waiter Updated" && header("refresh:1; url=waiter.php");
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
    $update = $_GET['update'];
    $ret = "SELECT * FROM  rpos_waiter WHERE waiter_id = '$update' ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($waiter = $res->fetch_object()) {
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
                      <label>waiter Number</label>
                      <input type="text" name="waiter_phoneno" class="form-control" value="<?php echo $waiter->waiter_phoneno; ?>">
                    </div>
                    <div class="col-md-6">
                      <label>waiter Name</label>
                      <input type="text" name="waiter_name" class="form-control" value="<?php echo $waiter->waiter_name; ?>">
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6">
                      <label>waiter Email</label>
                      <input type="email" name="waiter_email" class="form-control" value="<?php echo $waiter->waiter_email; ?>">
                    </div>
                    <div class="col-md-6">
                      <label>waiter Password</label>
                      <input type="password" name="waiter_password" class="form-control" value="">
                    </div>
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-md-6">
                      <input type="submit" name="Updatewaiter" value="Update waiter" class="btn btn-success" value="">
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
    }
      ?>
      </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>