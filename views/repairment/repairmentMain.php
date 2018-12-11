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
    <h1 class="h2 text-center">Remontas</h1>
    
    <a href="addBrokenDevice.php" class="btn btn-secondary btn-md active" role="button" aria-pressed="true" width="auto">Registruoti sugedusią prekę</a>
	<a href="bDeviceEvaluation.php" class="btn btn-secondary btn-md active" role="button" aria-pressed="true" width="auto">Prekės Įvertinimas</a>
  <a href="selectEmploee.php" class="btn btn-secondary btn-md active" role="button" aria-pressed="true" width="auto">Prekės priskirimas specialistui</a>
  <a href="selectState.php" class="btn btn-secondary btn-md active" role="button" aria-pressed="true" width="auto">Būsenos Nustatymas</a>
  <a href="checkState.php" class="btn btn-secondary btn-md active" role="button" aria-pressed="true" width="auto">Būsenos tikrinimas</a>


	<a href="AddBrokenItem.html" class="btn btn-secondary btn-md active" role="button" aria-pressed="true" width="auto">Pridėti prekę</a>

    <!-- Čia dedam savo -->
  </div>
  <?php 
	include_once '../footer.php';
?>