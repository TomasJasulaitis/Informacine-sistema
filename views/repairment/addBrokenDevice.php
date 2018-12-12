<?php 
  session_start();
  
  // Access control here
  include_once '../../inc/accessControl.php';
  allowLogedIn("../../views/userManagement/login.php");
 // allowAccess(true, false, "../../index.php");

	$_SESSION['prefix'] = "../../";
	$_SESSION['currentPage'] = "addBrokenDevice";
  include_once '../header.php';
    
?>
 <section class="container">
    <h1 class="h2 text-center">Sugedusios prekės įvedimas</h1>
    <form method="post" action="../../controllers/repairment/proc_addBrokenDevice.php">
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="brand">Prekės Pavadinimas</label>
          <input type="text" class="form-control" name="brand" placeholder="Pavadinimas">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="model">Prekės Modelis</label>
          <input type="text" class="form-control" name="model" placeholder="Modelis">
        </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="faults">Gedimai</label>
            <textarea class="form-control" rows="5" name="faults"></textarea>
          </div>
		<button type="submit" name="submit" class="btn btn-primary form-control">Pridėti prekę</button>
		<a href="repairmentMain.php" class="btn btn-secondary btn-md form-control mt-2" role="button" aria-pressed="true">Atgal</a>
      </div>
    </form>
  </section>
<?php 
	include_once '../footer.php';
?>