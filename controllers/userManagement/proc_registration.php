<?php


if (isset($_POST["submit"])) {
  //include_once 'dbconn.php';
  include_once '../../inc/dbconn.php';

  $firstName = escape($conn, $_POST["firstName"]);
  $lastName = escape($conn, $_POST["lastName"]);
  $phoneNr = escape($conn, $_POST["phoneNr"]);
  $email = escape($conn, $_POST["email"]);
  $pass1 = escape($conn, $_POST["pass1"]);
  $pass2 = escape($conn, $_POST["pass2"]);

  // Error handling
  // Check for empty fields
  if (empty($firstName) || empty($lastName) || empty($phoneNr) || empty($email) || empty($pass1) || empty($pass2)){
    header("Location: ../../views/userManagement/registration.php?message=empty");
    exit();
  } else {
    // Check if input characters are valid 54:30 and 1:05:30
    // code...

    // Check if passwords matches
    if ($pass1 !== $pass2) {
      header("Location: ../../views/userManagement/registration.php?message=passdontmatch");
      exit();
    }

    // Check if user exists
    $sql = "SELECT * FROM users WHERE email='$email'"; 
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
      header("Location: ../../views/userManagement/registration.php?message=usertaken");
      exit();
    }

    // All checks passed
    // Hashing the password
    $hashedPass = password_hash($pass1, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users 
    (email, password, emailVerified, emailVerificationToken, firstName, lastName, phoneNumber) VALUES
    ('$email','$hashedPass','1','000','$firstName','$lastName','$phoneNr')";
    //die($sql);
    mysqli_query($conn, $sql);
    header("Location: ../../views/userManagement/login.php?message=registration-success");
    exit();
  }

} else {
  header("Location: ../../views/userManagement/registration.php");
  exit();
}