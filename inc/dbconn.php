<?php 

$dbServerName = "localhost";
$dbUsername = "stud";
//$dbUsername = "root";
$dbPassword = "stud";
//$dbPassword = "";
$dbName = "informacines_sistemos";

$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

if (mysqli_connect_errno()) {
  printf("Nepavyko prisijungti prie duomenų bazės: %s\n", mysqli_connect_error());
  exit();
}

function escape($conn, $string) {
  return mysqli_real_escape_string($conn, $string);
}