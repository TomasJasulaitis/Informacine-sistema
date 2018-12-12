<?php

session_start();

if (isset($_POST["submit"])) { 
  include_once '../../inc/dbconn.php';

  $token = escape($conn, $_GET['token']);
  $pass1 = escape($conn, $_POST["pass1"]);
  $pass2 = escape($conn, $_POST["pass2"]);

  if ($pass1 !== $pass2) {
    header("Location: ../../controllers/userManagement/proc_passwordRecovery2.php?token=$token&message=passwordMismatch");
    exit();
  }

  // Error handling
  // Check for empty fields
  if (empty($pass1) || empty($pass2) || empty($token)){
    header("Location: ../../controllers/userManagement/proc_passwordRecovery2.php?token=$token&message=empty");
    exit();
  } else {
    $sql = "SELECT * FROM users WHERE passwordRecoveryToken='$token' AND emailVerified=0";
    //die($sql);
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck < 1) {
      header("Location: ../../views/userManagement/passwordRecovery.php?message=badToken");
      exit();
    } else {
      $row = mysqli_fetch_assoc($result);
      $hashedPass = password_hash($pass1, PASSWORD_DEFAULT);
      $sql = "UPDATE users SET password='$hashedPass', emailVerified=1 WHERE id=".$row['id'];
      //die($sql);
      mysqli_query($conn, $sql);
      header("Location: ../../views/userManagement/login.php?message=success");
      exit();
    }
  } 
} else {
  header("Location: ../../views/userManagement/passwordRecovery.php");
  exit();
}