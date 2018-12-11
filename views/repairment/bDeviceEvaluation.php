<?php 
  session_start();
  
  // Access control here
 // include_once '../../inc/accessControl.php';
 // allowLogedIn("../../views/userManagement/login.php");
 // allowAccess(true, false, "../../index.php");

	$_SESSION['prefix'] = "../../";
	$_SESSION['currentPage'] = "userActions";
	include_once '../header.php';
?>
 <div class="container">
    <h1 class="h2 text-center">Sugedusios prekės įvedimas</h1>
    <form method="post" action="#">
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="lastName">Prekės</label>
          <input type="text" class="form-control" id="lastName" placeholder="Pavadinimas">
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
              <label for="lastName">Prekė Įvertinimas</label>
              <input type="text" class="form-control" id="lastNames" placeholder="Įvertinimas">
            </div>
        <div class="form-group col-md-6">
          <label for="email">Papildomi Komentarai</label>
          <input type="email" class="form-control" id="email" placeholder="Komentarai">
        </div>
		<button type="submit" class="btn btn-primary form-control">Įvertinti</button>
		<a href="repairmentMain.php" class="btn btn-secondary btn-md form-control mt-2" role="button" aria-pressed="true">Atgal</a>
      </div>
    </form>
  </div>
  <?php 
	include_once '../footer.php';
?>