<?php


if (isset($_POST["submit"])) {
  //include_once 'dbconn.php';
  include_once '../../inc/dbconn.php';
  $brand = escape($conn, $_POST["brand"]);
  $model = escape($conn, $_POST["model"]);
  $faults = escape($conn, $_POST["faults"]);
  $state = "Laukiama patvirtinimo";
  $user = '3';
  $emploee = "#pukis2";
  $date = date("Y/m/d");


  if (empty($brand) || empty($model) || empty($faults)){
    header("Location: ../../views/repairment/addBrokenDevice.php?message=empty");
    exit();
  } else {

    $sql = "INSERT INTO brokenitems 
    (brand, model, faults, state, user, emploee, date) VALUES
    ('$brand','$model','$faults','$state','$user','$emploee', '$date')";
  //  die($sql);

    mysqli_query($conn, $sql);
    header("Location: ../../views/repairment/addBrokenDevice.php?message=success");
    exit();
  }

} else {
  header("Location: ../../views/repairment/addBrokenDevice.php");
  exit();
}
