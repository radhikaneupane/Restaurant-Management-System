<?php
session_start();
include('config/config.php');
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = sha1($_POST['password']);

  $admin_query = "SELECT admin_email, admin_password, admin_id FROM rpos_admin WHERE admin_email = ?";
  $stmt = $mysqli->prepare($admin_query);
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    $admin_password = "";
    $admin_id = "";
    $stmt->bind_result($admin_email, $admin_password, $admin_id);
    $stmt->fetch();

    if ($password == $admin_password) {
      $_SESSION['admin_id'] = $admin_id;
      $_SESSION['user_type'] = 'admin';
      header("Location: admin/dashboard.php");
      exit();
    } else {
      $err = "Incorrect Password";
    }
  } else {
    // check if user is super admin
    $superadmin_query = "SELECT superadmin_email, superadmin_password, superadmin_id FROM rpos_super_admin WHERE superadmin_email = ?";
    $stmt = $mysqli->prepare($superadmin_query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
      $superadmin_password = "";
      $superadmin_id = "";
      $stmt->bind_result($superadmin_email, $superadmin_password, $superadmin_id);
      $stmt->fetch();

      if ($password == $superadmin_password) {
        $_SESSION['superadmin_id'] = $superadmin_id;
        $_SESSION['user_type'] = 'superadmin';
        header("Location: superadmin/dashboard.php");
        exit();
      } else {
        $err = "Incorrect Password";
      }
    } else {

      $cashier_query = "SELECT cashier_email, cashier_password, cashier_id FROM rpos_cashier WHERE cashier_email = ?";
      $stmt = $mysqli->prepare($cashier_query);
      $stmt->bind_param('s', $email);
      $stmt->execute();
      $stmt->store_result();

      if ($stmt->num_rows > 0) {
        $cashier_password = "";
        $cashier_id = "";
        $stmt->bind_result($cashier_email, $cashier_password, $cashier_id);
        $stmt->fetch();

        if ($password == $cashier_password) {
          $_SESSION['cashier_id'] = $cashier_id;
          $_SESSION['user_type'] = 'cashier';
          header("Location: cashier/dashboard.php");
          exit();
        } else {
          $err = "Incorrect Password";
        }
      } else {
        $err = "Incorrect Email";
      }
    }

    $waiter_query = "SELECT waiter_email, waiter_password, waiter_id FROM rpos_waiter WHERE waiter_email = ?";
    $stmt = $mysqli->prepare($waiter_query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    
      if ($stmt->num_rows > 0) {
        $waiter_password = "";
        $waiter_id = "";
        $stmt->bind_result($waiter_email, $waiter_password, $waiter_id);
        $stmt->fetch();
    
        if ($password == $waiter_password) {
          $_SESSION['waiter_id'] = $waiter_id;
          $_SESSION['user_type'] = 'waiter';
          header("Location: waiter/dashboard.php");
          exit();
        } else {
          $err = "Incorrect Password";
        }
      } else {
        $err = "Incorrect Email";
      }
    }

  } 




require_once('partials/_head.php');

?>



<body  class="bg-dark">
  <div class="main-content">
    <div class="header bg-gradient-primar py-7">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">LOGIN PAGE</h1>
            </div>
          </div>
        </div>
      </div>
    </div> 
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">

            <?php if(isset($err)) { ?>
              <div class="alert alert-danger"><?php echo $err; ?></div>
              <?php } ?>

              <form method="post" role="form">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" required name="email" placeholder="Email" type="email">
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" required name="password" placeholder="Password" type="password">
                  </div>
                </div>

                
                
                <div class="text-center">
                  <button type="submit" name="login" class="btn btn-primary my-4">Log In</button>
                </div>
              </form>

            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <!-- <a href="forgot_pwd.php" class="text-light"><small>Forgot password?</small></a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <style>
        html,
        body {
            background: url('https://assets.hyatt.com/content/dam/hyatt/hyattdam/images/2022/06/07/1756/KATHM-P0428-Entrance-Porch.jpg/KATHM-P0428-Entrance-Porch.16x9.jpg');
            background-size: cover;
            background-color: #fff;
            font-weight: bold;
            color: white;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        </style>
  <?php
  require_once('partials/_footer.php');
  ?>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>
 
</html>