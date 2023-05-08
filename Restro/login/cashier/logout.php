<?php
session_start();
unset($_SESSION['cashier_id']);
session_destroy();
header("Location: ../../login/index.php");
exit;
?>
