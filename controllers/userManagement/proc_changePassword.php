<?php

session_start();
include_once '../../inc/accessControl.php';
allowLogedIn("../../views/userManagement/login.php");

if (isset($_POST["submit"])) { 
  include_once '../../inc/dbconn.php';

  $pass = escape($conn, $_POST["pass"]);
  $pass1 = escape($conn, $_POST["pass1"]);
  $pass2 = escape($conn, $_POST["pass2"]);

  if ($pass1 !== $pass2) {
    header("Location: ../../views/userManagement/changePassword.php?message=passwordMismatch");
    exit();
  }

  // Error handling
  // Check for empty fields
  if (empty($pass) || empty($pass1) || empty($pass2)){
    header("Location: ../../views/userManagement/changePassword.php?message=empty");
    exit();
  } else {
    if (isset($_SESSION['isEmployee']) && $_SESSION['isEmployee']) {
      // Employee

      $sql = "SELECT * FROM employees WHERE id='".$_SESSION['id']."'";
      $result = mysqli_query($conn, $sql);
      if ($row = mysqli_fetch_assoc($result)) {
        $passCheck = password_verify($pass, $row['password']);
        if ($passCheck === false) {
          header("Location: ../../views/userManagement/changePassword.php?message=badPassword");
          exit();
        } elseif ($passCheck === true) {
          // Hashing the password
          $hashedPass = password_hash($pass1, PASSWORD_DEFAULT);
          $sql = "UPDATE employees 
                  SET password='$hashedPass'
                  WHERE id='".$_SESSION['id']."'";
          mysqli_query($conn, $sql);
          header("Location: ../../views/userManagement/changePassword.php?message=success");
          exit();
        }
      } else {
        header("Location: ../../views/userManagement/changePassword.php?message=error");
        exit();
      }
    } else {
      // Admin/user

      $sql = "SELECT * FROM users WHERE id=".$_SESSION['id'];
      $result = mysqli_query($conn, $sql);
      if ($row = mysqli_fetch_assoc($result)) {
        $passCheck = password_verify($pass, $row['password']);
        if ($passCheck === false) {
          header("Location: ../../views/userManagement/changePassword.php?message=badPassword");
          exit();
        } elseif ($passCheck === true) {
          // Hashing the password
          $hashedPass = password_hash($pass1, PASSWORD_DEFAULT);
          $sql = "UPDATE users 
                  SET password='$hashedPass'
                  WHERE id=".$_SESSION['id'];
          mysqli_query($conn, $sql);
          header("Location: ../../views/userManagement/changePassword.php?message=success");
          exit();
        }
      } else {
        header("Location: ../../views/userManagement/changePassword.php?message=error");
        exit();
      }
    }
  }
} else {
  header("Location: ../../views/userManagement/changePassword.php");
  exit();
}