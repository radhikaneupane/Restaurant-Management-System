<?php
session_start();
unset($_SESSION['waiter_id']);
session_destroy();
header("Location: ../../login/index.php");
exit;
?>
