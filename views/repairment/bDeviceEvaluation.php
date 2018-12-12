<?php 
  session_start();
  
  // Access control here
 // include_once '../../inc/accessControl.php';
 // allowLogedIn("../../views/userManagement/login.php");
 // allowAccess(true, false, "../../index.php");

	$_SESSION['prefix'] = "../../";
	$_SESSION['currentPage'] = "bDeviceEvaluation";
	include_once '../header.php';
?>
<section class="container">
    <h1 class="h2 text-center">Sugedusios prekės įvertinimas</h1>
    <form method="post" action="../../controllers/repairment/proc_bDeviceEvaluation.php">
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="id">Prekės nr.</label>
          <input type="text" class="form-control" name="id" placeholder="Nr">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="evaluation">Įvertinimas</label>
          <input type="text" class="form-control" name="evaluation" placeholder="įvertinimas">
        </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="comments">Komentarai</label>
            <textarea class="form-control" rows="5" name="comments"></textarea>
          </div>
          <button type="submit" name="submit" class="btn btn-primary form-control">Įvertinti prekę</button>
		<a href="repairmentMain.php" class="btn btn-secondary btn-md form-control mt-2" role="button" aria-pressed="true">Atgal</a>
      </div>
    </form>
  </section>
<?php 
	include_once '../footer.php';
?>