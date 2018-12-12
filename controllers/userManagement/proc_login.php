<?php

session_start();

if (isset($_POST["submit"])) {
  
  include_once '../../inc/dbconn.php';

  $email = escape($conn, $_POST['email']);
  $pass = escape($conn, $_POST['pass']);

  // Error handling
  // Check for empty fields
  if (empty($email) || empty($pass)){
    header("Location: ../../views/userManagement/login.php?message=empty");
    exit();
  } else {
    // Check if logging as user
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck < 1) {
      // Check if logging as an employee
      $sql = "SELECT * FROM employees WHERE email='$email'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);

      if ($resultCheck < 1) {
        header("Location: ../../views/userManagement/login.php?message=error");
        exit();
      } else {
        // Logging in as an employee
        if ($row = mysqli_fetch_assoc($result)) {
          $passCheck = password_verify($pass, $row['password']);
          if ($passCheck === false) {
            header("Location: ../../views/userManagement/login.php?message=error");
            exit();
          } elseif ($passCheck === true) {
            // Loging in the employee
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['lastName'] = $row['lastName'];
            $_SESSION['isEmployee'] = 1;
  
            header("Location: ../../index.php");
            exit();
          }
        }
      }
    } else {
      // Logging in as user
      $row = mysqli_fetch_assoc($result);
      if ($row['emailVerified'] == 0) {
        header("Location: ../../views/userManagement/login.php?message=notVerified");
        exit();
      }

      $passCheck = password_verify($pass, $row['password']);
      if ($passCheck === false) {
        header("Location: ../../views/userManagement/login.php?message=error");
        exit();
      } elseif ($passCheck === true) {
        // Loging in the usert
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['firstName'] = $row['firstName'];
        $_SESSION['lastName'] = $row['lastName'];
        $_SESSION['phoneNumber'] = $row['phoneNumber'];
        $_SESSION['isAdmin'] = $row['isAdmin'];

        header("Location: ../../index.php");
        exit();
      }
    }
  }
} else {
  header("Location: ../login.php");
  exit();
}