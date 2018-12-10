<?php


if (isset($_POST["submit"])) {
  //include_once 'dbconn.php';
  include_once '../../inc/dbconn.php';

  $firstName = escape($conn, $_POST["first_name"]);
  $lastName = escape($conn, $_POST["last_name"]);
  $number = escape($conn, $_POST["phone_number"]);
  $location = escape($conn, $_POST["location"]);
  $working_from = escape($conn, $_POST["work_hours_start"]);
  $working_until = escape($conn, $_POST["work_hours_finish"]);

  // Error handling
  // Check for empty fields
  if (empty($firstName) || empty($lastName) || empty($number) || empty($location)|| empty($working_from)|| empty($working_until)){
    header("Location: ../../views/support/addContacts.php?message=empty");
    exit();
  } else {

    $sql = "INSERT INTO contacts 
    (first_name, last_name, phone_number, location, work_hours_start, work_hours_finish) VALUES
    ('$firstName','$lastName','$number','$location','$working_from','$working_until')";
  //  die($sql);

    mysqli_query($conn, $sql);
    header("Location: ../../views/support/addContacts.php?message=success");
    exit();
  }

} else {
  header("Location: ../../views/support/addContacts.php");
  exit();
}