<?php

if (isset($_POST["submit"])) {
  //include_once 'dbconn.php';
  include_once '../../inc/dbconn.php';

  $name = escape($conn, $_POST["lastName"]);
  $type = escape($conn, $_POST["phoneNr"]);
  $price = escape($conn, $_POST["email"]);

  // Error handling
  // Check for empty fields
    // Check if input characters are valid 54:30 and 1:05:30
    // code...


    // Check if user exists
    //$sql = "SELECT * FROM users WHERE email='$email'"; 
   // $result = mysqli_query($conn, $sql);
    //$resultCheck = mysqli_num_rows($result);

    //if ($resultCheck > 0) {
    //  header("Location: ../../views/userManagement/registration.php?message=usertaken");
   //   exit();
    //}

    // All checks passed
    // Hashing the password
    //$hashedPass = password_hash($pass1, PASSWORD_DEFAULT);
    $sql = "INSERT INTO sales 
    (name, type, price) VALUES
    ('$name','$type','$price')";
    //die($sql);
    mysqli_query($conn, $sql);
    header("Location: ../../views/sales/addItem.php?message=success");
    exit();
  

} else {
  header("Location: ../../views/sales/addItem.php");
  exit();
}