<?php 
  session_start();
  
  // Access control here
 // include_once '../../inc/accessControl.php';
 // allowLogedIn("../../views/userManagement/login.php");
 // allowAccess(true, false, "../../index.php");

	$_SESSION['prefix'] = "../../";
	$_SESSION['currentPage'] = "selectState";
	include_once '../header.php';
?>
  <div class="container">
    <h1 class="h2 text-center">Sugedusios prekės būsenos nustatymas</h1>
    <form method="post" action="../../controllers/repairment/proc_selectState.php">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="id">Prekės Nr.</label>
          <input type="text" class="form-control" name="id" placeholder="Nr">
        </div>
        <div class="form-group col-md-6">
            <div class="form-group col-md-12">
              <label for="state">Būsena</label>
              <input type="text" class="form-control" name="state" placeholder="Būsena">
            </div>
            <button type="submit" name="submit" class="btn btn-primary form-control">Patvritinti</button>
		<a href="repairmentMain.php" class="btn btn-secondary btn-md form-control mt-2" role="button" aria-pressed="true">Atgal</a>
      </div>
    </form>
  </div>
  <?php 
	include_once '../footer.php';
?>