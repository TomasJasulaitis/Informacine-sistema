<?php
session_start();
if (isset($_GET["token"])) {
  include_once '../../inc/dbconn.php';

  $token = escape($conn, $_GET["token"]);

  $sql = "SELECT * FROM users WHERE passwordRecoveryToken='$token' AND emailVerified=0";
  //die($sql);
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);
  if ($resultCheck < 1) {
    header("Location: ../../views/userManagement/passwordRecovery.php?message=badToken");
    exit();
  } else {
    include_once '../../views/header.php';
    echo '
    <section class="container">
      <h1 class="h2 text-center">Slaptažodžio atkūrimas</h1>
      <form method="post" action="proc_passwordRecovery3.php?token='.$token.'">
        <div class="text-center" style="margin-right:30%; margin-left:30%">
          <div class="form-group">
              <label for="pass1">Naujas slaptažodis</label>
              <input type="password" class="form-control" name="pass1">
          </div>
          <div class="form-group">
              <label for="pass2">Pakartoti slaptažodį</label>
              <input type="password" class="form-control" name="pass2">
          </div>
          <button type="submit" name="submit" class="btn btn-success form-control">Patvirtinti</button>

        </div>
      </form>
    </section>
    ';
    include_once '../../views/footer.php';
  }

} else {
  header("Location: ../../views/userManagement/passwordRecovery.php?message=noToken");
  exit();
}