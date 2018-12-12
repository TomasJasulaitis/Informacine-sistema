<?php


if (isset($_POST["submit"])) {
  //include_once 'dbconn.php';
  include_once '../../inc/dbconn.php';
  $id = escape($conn, $_POST["id"]);
  $evaluation = escape($conn, $_POST["evaluation"]);
  $comments = escape($conn, $_POST["comments"]);


  if (empty($id) || empty($evaluation) || empty($comments)){
    header("Location: ../../views/repairment/addBrokenDevice.php?message=empty");
    exit();
  } else {

    $sql = "INSERT INTO brokendeviceeevaluation
    (id, evaluation, comments) VALUES
    ('$id','$evaluation','$comments')";
        mysqli_query($conn, $sql);  

        $sql = "UPDATE brokenitems 
        SET evaluation = '$id'
        WHERE id='$id'";
    
        mysqli_query($conn, $sql);
        header("Location: ../../views/repairment/selectState.php?message=success");
        exit();
  }

} else {
  header("Location: ../../views/repairment/bDeviceEvaluatfion.php");
  exit();
}
