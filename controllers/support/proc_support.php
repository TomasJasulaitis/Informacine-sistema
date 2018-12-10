<?php


if (isset($_POST["submit"])) {
  //include_once 'dbconn.php';
  include_once '../../inc/dbconn.php';

  $firstName = escape($conn, $_POST["first_name"]);
  $lastName = escape($conn, $_POST["last_name"]);
  $phoneNr = escape($conn, $_POST["phone_number"]);
  $email = escape($conn, $_POST["email"]);
  $question = escape($conn, $_POST["question"]);


  // Error handling
  // Check for empty fields
  if (empty($firstName) || empty($lastName) || empty($phoneNr) || empty($email) || empty($question)){
    header("Location: ../../views/support/contacts.php?message=empty");
    exit();
  } else {
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
    $sql = "INSERT INTO support 
    (first_name, last_name, phone_number, email, question) VALUES
    ('$firstName','$lastName','$phoneNr','$email','$question')";
    //die($sql);
    mysqli_query($conn, $sql);
    header("Location: ../../views/support/contacts.php?message=success");
    exit();
  }

} else {
  header("Location: ../../views/support/contacts.php");
  exit();
}