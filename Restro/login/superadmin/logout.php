<?php
session_start();
unset($_SESSION['superadmin_id']);
session_destroy();
header("Location: ../../login/index.php");
exit;
?>