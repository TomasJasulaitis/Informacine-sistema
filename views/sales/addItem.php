<?php
session_start();
  // Access control here
 // include_once '../../inc/accessControl.php';
 // allowLogedIn("../../views/userManagement/login.php");
 // allowAccess(true, false, "../../index.php");
	
	//$dbc = mysqli_connect('localhost', 'stud', 'stud', 'informacines_sistemos');
	//$sql = "SELECT * FROM contacts";
	//$result = mysqli_query($dbc, $sql);
	//session_start();
	$_SESSION['prefix'] = "../../";
	$_SESSION['currentPage'] = "userActions";
	include_once '../header.php';
?>

    
    <h1 class="h2 text-center">Prekės įvedimas</h1>
	<br>
	<section class="container">
    <form method="post" action="../../controllers/sales/proc_item.php">
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="lastName">Prekės Pavadinimas</label>
          <input type="text" class="form-control" name="lastName" placeholder="Pavadinimas">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="phoneNr">Prekės Tipas</label>
          <input type="text" class="form-control" name="phoneNr" placeholder="Tipas">
        </div>
        <div class="form-group col-md-6">
          <label for="email">Prekės Kaina</label>
          <input type="text" class="form-control" name="email" placeholder="Kaina">
        </div>
		<button type="submit" name="submit" class="btn btn-primary form-control">Pridėti prekę</button>
		<a href="salesMain.php" class="btn btn-secondary btn-md form-control mt-2" role="button" aria-pressed="true">Atgal</a>
      </div>
    </form>
  
  </section>
<?php 
	include_once '../footer.php';
?>