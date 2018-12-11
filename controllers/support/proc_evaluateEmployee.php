<?php

session_start();
include_once '../../inc/accessControl.php';
allowLogedIn("../../views/userManagement/login.php");
allowAccess(true, false, "../../index.php");

if (isset($_POST["submit"])) {
  include_once '../../inc/dbconn.php';


  $id = escape($conn, $_POST["employeeId"]);

  // Error handling
  // Check for empty fields
  if (empty($id)){
    header("Location: ../../views/support/evaluateEmployee.php?message=empty");
    exit();
  } else {

    // Check if employee exists
    $sql = "SELECT * FROM employees WHERE id='$id'"; 
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck < 1) {
      header("Location: ../../views/support/evaluateEmployee.php?message=error");
      exit();
    }
   $stars = escape($conn, $_POST["stars"]);
  $comment = escape($conn, $_POST["comment"]);

   $sql = "INSERT INTO evaluateEmployee 
    (stars, comment) VALUES
    ('$stars','$comment')";
  //  die($sql);
    
    header("Location: ../../views/support/evaluateEmployee.php?message=success");
    exit();
  }

} else {
  header("Location: ../../views/support/evaluateEmployee.php");
  exit();
}