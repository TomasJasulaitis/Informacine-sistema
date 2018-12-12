<?php


if (isset($_POST["submit"])) {
  //include_once 'dbconn.php';
  include_once '../../inc/dbconn.php';
  $id = escape($conn, $_POST["id"]);
  $state = escape($conn, $_POST["state"]);

  if (empty($id) || empty($state)){
    header("Location: ../../views/repairment/selectState.php?message=empty");
    exit();
  } else {

    $sql = "UPDATE brokenitems 
    SET state = '$state'
    WHERE id='$id'";

    mysqli_query($conn, $sql);
    header("Location: ../../views/repairment/selectState.php?message=success");
    exit();
  }

} else {
  header("Location: ../../views/repairment/selectState.php");
  exit();
}
