<?php 
  session_start();
  // Access control
  include_once '../../inc/accessControl.php';
  allowLogedIn("../../views/userManagement/login.php");

	$_SESSION['prefix'] = "../../";
	$_SESSION['currentPage'] = "userActions";
	include_once '../header.php';
?>

<section class="container">
  <h1 class="h2 text-center">Slaptažodžio keitimas</h1>
  <form method="post" action="../../controllers/userManagement/proc_changePassword.php">
    <div class="text-center" style="margin-right:30%; margin-left:30%">
      <div class="form-group">
          <label for="pass">Dabartinis slaptažodis</label>
          <input type="password" class="form-control" name="pass">
      </div>
      <div class="form-group">
          <label for="pass1">Naujas slaptažodis</label>
          <input type="password" class="form-control" name="pass1">
      </div>
      <div class="form-group">
          <label for="pass2">Pakartoti slaptažodį</label>
          <input type="password" class="form-control" name="pass2">
      </div>
      <button type="submit" name="submit" class="btn btn-success form-control">Patvirtinti</button>
      <a href="userActions.php" class="btn btn-secondary btn-md form-control mt-2" role="button" aria-pressed="true">Atgal</a>
    </div>
  </form>
</section>

<?php 
	include_once '../footer.php';
?>