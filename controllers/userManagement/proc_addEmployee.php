<?php
session_start();
include_once '../../inc/accessControl.php';
allowLogedIn("../../views/userManagement/login.php");
allowAccess(true, false, "../../index.php");

if (isset($_POST["submit"])) {
  //include_once 'dbconn.php';
  include_once '../../inc/dbconn.php';

  $firstName = escape($conn, $_POST["firstName"]);
  $lastName = escape($conn, $_POST["lastName"]);
  $id = escape($conn, $_POST["id"]);
  $email = escape($conn, $_POST["email"]);
  $pass1 = escape($conn, $_POST["pass1"]);
  $pass2 = escape($conn, $_POST["pass2"]);

  // Error handling
  // Check for empty fields
  if (empty($firstName) || empty($lastName) || empty($id) || empty($email) || empty($pass1) || empty($pass2)){
    header("Location: ../../views/userManagement/addEmployee.php?message=empty");
    exit();
  } else {
    // Check if input characters are valid 54:30 and 1:05:30
    // code...

    // Check if passwords matches
    if ($pass1 !== $pass2) {
      header("Location: ../../views/userManagement/addEmployee.php?message=passdontmatch");
      exit();
    }

    // Check if user exists
    $sql = "SELECT * FROM employees WHERE email='$email'"; 
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
      header("Location: ../../views/userManagement/addEmployee.php?message=usertaken");
      exit();
    }

    // All checks passed
    // Hashing the password
    $hashedPass = password_hash($pass1, PASSWORD_DEFAULT);
    $sql = "INSERT INTO employees 
    (id, email, password, firstName, lastName, workingSince) VALUES
    ('$id','$email','$hashedPass','$firstName','$lastName','2018-12-10')";
    //die($sql);
    mysqli_query($conn, $sql);
    header("Location: ../../views/userManagement/addEmployee.php?message=success");
    exit();
  }

} else {
  header("Location: ../../views/userManagement/addEmployee.php");
  exit();
}