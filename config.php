<?php
$hostname = "localhost:3307";
$username = "root";
$password = "";
$dbname = "rms";

$con = mysqli_connect($hostname, $username, $password, $dbname);

if (mysqli_connect_errno()) {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>
