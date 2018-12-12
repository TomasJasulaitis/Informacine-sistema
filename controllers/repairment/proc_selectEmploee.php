<?php


if (isset($_POST["submit"])) {
  //include_once 'dbconn.php';
  include_once '../../inc/dbconn.php';
  $id = escape($conn, $_POST["id"]);
  $emploee = escape($conn, $_POST["emploee"]);

  if (empty($id) || empty($state)){
    header("Location: ../../views/repairment/selectEmploee.php?message=empty");
    exit();
  } else {

    $sql = "UPDATE brokenitems 
    SET emploee = '$emploee'
    WHERE id='$id'";

    mysqli_query($conn, $sql);
    header("Location: ../../views/repairment/selectEmploee.php?message=success");
    exit();
  }

} else {
  header("Location: ../../views/repairment/selectEmploee.php");
  exit();
}
