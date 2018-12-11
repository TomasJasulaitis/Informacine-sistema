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

    <h1 class="h2 text-center">Būsena</h1>
	

	<table id="customers">
		<tr>
			<th colspan="6">
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
			Prekės Įvertinimas
      </th>
			<th>
      Specialisto Įvertinimas
      </th>
      <th>
      Būsena
      </th>
		</tr>
	</table>

    <!-- Čia dedam savo -->

    <a href="repairmentMain.php" class="btn btn-secondary btn-md form-control mt-2" role="button" aria-pressed="true">Atgal</a>
  </div>
  <?php 
	include_once '../footer.php';
?>