<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
//Update Profile
if (isset($_POST['ChangeProfile'])) {
  $admin_id = $_SESSION['admin_id'];
  $admin_name = $_POST['admin_name'];
  $admin_email = $_POST['admin_email'];
  $Qry = "UPDATE rpos_admin SET admin_name =?, admin_email =? WHERE admin_id =?";
  $postStmt = $mysqli->prepare($Qry);
  //bind paramaters
  $rc = $postStmt->bind_param('sss', $admin_name, $admin_email, $admin_id);
  $postStmt->execute();
  //declare a varible which will be passed to alert function
  if ($postStmt) {
    $success = "Account Updated" && header("refresh:1; url=dashboard.php");
  } else {
    $err = "Please Try Again Or Try Later";
  }
}
