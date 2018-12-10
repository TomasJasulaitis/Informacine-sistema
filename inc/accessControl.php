<?php

function allowAccess($allowAdmin, $allowEployee, $redirect) {
  $allow = false;

  if ($allowAdmin == true && (isset($_SESSION['isAdmin'])) && $_SESSION['isAdmin'] == 1) {
    $allow = true;
  }
  if ($allowEployee == true && (isset($_SESSION['isEmployee'])) && $_SESSION['isEmployee'] == 1) {
    $allow = true;
  }

  if (!$allow) {
    header("Location: ".$redirect);
    exit();
  }
}

function allowLogedIn($redirect) {
  if(!isset($_SESSION['email'])) {
    header("Location: ".$redirect);
    exit();
  }
}