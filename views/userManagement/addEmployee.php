<?php 
  session_start();
  
  // Access control here
  include_once '../../inc/accessControl.php';
  allowLogedIn("../../views/userManagement/login.php");
  allowAccess(true, false, "../../index.php");

	$_SESSION['prefix'] = "../../";
	$_SESSION['currentPage'] = "userActions";
	include_once '../header.php';
?>

<section class="container">
  <h1 class="h2 text-center">Darbuotojo pridėjimas</h1>
  <form method="post" action="../../controllers/userManagement/proc_addEmployee.php">
    <div class="text-center" style="margin-right:30%; margin-left:30%">
      <div class="form-group">
        <label for="firstName">Vardas</label>
        <input type="text" class="form-control" name="firstName">
      </div>
      <div class="form-group">
        <label for="lastName">Pavardė</label>
        <input type="text" class="form-control" name="lastName">
      </div>
      <div class="form-group">
        <label for="id">Darbuotojo ID</label>
        <input type="text" maxlength="10" class="form-control" name="id">
      </div>
      <div class="form-group">
        <label for="email">El. paštas</label>
        <input type="email" class="form-control" name="email" placeholder="El. paštas">
      </div>
      <div class="form-group">
        <label for="pass1">Slaptažodis</label>
        <input type="password" class="form-control" name="pass1">
      </div>
      <div class="form-group">
        <label for="pass2">Pakartoti slaptažodį</label>
        <input type="password" class="form-control" name="pass2">
      </div>
      <button type="submit" name="submit" class="btn btn-success form-control">Patvirtinti</button>
      <a href="adminPanel.php" class="btn btn-secondary btn-md form-control mt-2" role="button" aria-pressed="true">Atgal</a>
    </div>
  </form>
</section>

<?php 
	include_once '../footer.php';
?>