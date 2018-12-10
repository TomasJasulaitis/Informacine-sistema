<?php

session_start();
include_once '../../inc/accessControl.php';
allowLogedIn("../../views/userManagement/login.php");

if (isset($_POST["submit"])) {
  include_once '../../inc/dbconn.php';

  $firstName = escape($conn, $_POST["firstName"]);
  $lastName = escape($conn, $_POST["lastName"]);
  $phoneNr = false;

  if (isset($_POST['phoneNr'])) {
    $phoneNr = escape($conn, $_POST["phoneNr"]);
    if(empty($phoneNr)) {
      header("Location: ../../views/userManagement/changeUserData.php?message=empty");
      exit();
    }
  }
  
  // Error handling
  // Check for empty fields
  if (empty($firstName) || empty($lastName)){
    header("Location: ../../views/userManagement/changeUserData.php?message=empty");
    exit();
  } else {

    if ($phoneNr == false) {
      // Employee
      $sql = "UPDATE employees 
              SET firstName='$firstName', lastName='$lastName' 
              WHERE id='".$_SESSION['id']."'";
      mysqli_query($conn, $sql);
      $_SESSION['firstName'] = $firstName;
      $_SESSION['lastName'] = $lastName;
      header("Location: ../../views/userManagement/changeUserData.php?message=success");
      exit();
    } else {
      // Admin/user
      $sql = "UPDATE users 
              SET firstName='$firstName', lastName='$lastName', phoneNumber='$phoneNr' 
              WHERE id=".$_SESSION['id'];
      mysqli_query($conn, $sql);
      $_SESSION['firstName'] = $firstName;
      $_SESSION['lastName'] = $lastName;
      $_SESSION['phoneNumber'] = $phoneNr;
      header("Location: ../../views/userManagement/changeUserData.php?message=success");
    }
  }

} else {
  header("Location: ../../views/userManagement/changeUserData.php");
  exit();
}