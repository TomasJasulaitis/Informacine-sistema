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
    
    <h1 class="h2 text-center">Užsakymo atšaukimas</h1>

	<table id="customers">
		<tr>
			<th colspan="4">
			Prekės:
			</th>
		</tr>
		<tr>
			<th>
			Prekės ID
			</th>
			<th>
			Prekės Pavadinimas
			</th>
			<th>
			Prekės Tipas
			</th>
			<th>
			Prekės Kaina
			</th>
		</tr>
	</table>
	
	<button type="submit" class="btn btn-success form-control">Patvirtinti</button>
    <a href="salesMain.php" class="btn btn-secondary btn-md form-control mt-2" role="button" aria-pressed="true">Atgal</a>

    <!-- Čia dedam savo -->


  </div>
<?php 
	include_once '../footer.php';
?>