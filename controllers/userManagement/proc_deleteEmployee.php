<?php

session_start();
include_once '../../inc/accessControl.php';
allowLogedIn("../../views/userManagement/login.php");
allowAccess(true, false, "../../index.php");

if (isset($_POST["submit"])) {
  include_once '../../inc/dbconn.php';

  $id = escape($conn, $_POST["DelEmployeeId"]);

  // Error handling
  // Check for empty fields
  if (empty($id)){
    header("Location: ../../views/userManagement/deleteEmployee.php?message=empty");
    exit();
  } else {

    // Check if employee exists
    $sql = "SELECT * FROM employees WHERE id='$id'"; 
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck < 1) {
      header("Location: ../../views/userManagement/deleteEmployee.php?message=error");
      exit();
    }

    // Delete the employee
    $sql = "DELETE FROM employees WHERE id='$id'";
    mysqli_query($conn, $sql);
    header("Location: ../../views/userManagement/deleteEmployee.php?message=success");
    exit();
  }

} else {
  header("Location: ../../views/userManagement/deleteEmployee.php");
  exit();
}