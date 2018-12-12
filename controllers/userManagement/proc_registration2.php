<?php
session_start();
if (isset($_GET["token"])) {
  include_once '../../inc/dbconn.php';

  $token = escape($conn, $_GET["token"]);

  $sql = "SELECT * FROM users WHERE emailVerificationToken='$token' AND emailVerified=0";
  //die($sql);
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);
  if ($resultCheck < 1) {
    header("Location: ../../views/userManagement/registration.php?message=badToken");
    exit();
  } else {
    $row = mysqli_fetch_assoc($result);
    $sql = "UPDATE users SET emailVerified=1 WHERE id=".$row['id'];
    mysqli_query($conn, $sql);

    // Logging in
    $_SESSION['id'] = $row['id'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['firstName'] = $row['firstName'];
    $_SESSION['lastName'] = $row['lastName'];
    $_SESSION['phoneNumber'] = $row['phoneNumber'];
    $_SESSION['isAdmin'] = $row['isAdmin'];

    header("Location: ../../index.php");
    exit();
  }

} else {
  header("Location: ../../views/userManagement/registration.php?message=noToken");
  exit();
}