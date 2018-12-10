<?php 
  session_start();
  
  // Access control
  include_once '../../inc/accessControl.php';
  allowLogedIn("../../views/userManagement/login.php");
  allowAccess(true, false, "../../index.php");

	$_SESSION['prefix'] = "../../";
	$_SESSION['currentPage'] = "userInfo";
	include_once '../header.php';
?>

<section class="container">
  <h1 class="h2 text-center">Administratoriaus panelė</h1>
  <h2 class="h4 "><u>Administratoriaus veiksmai</u></h2>
  <br>
  <ul>
    <li><a href="addEmployee.php" class="text-secondary">Pridėti darbuotoją</a></li>
    <li><a href="deleteEmployee.php" class="text-secondary">Pašalinti darbuotoją</a></li>
    <li><a href="../support/addContacts.php" class="text-secondary">Pridėti kontaktą</a></li>
    <li><a href="changeContacts.php" class="text-secondary">Pakeisti kontaktus</a></li>
    <li><a href="userActions.php" class="text-secondary">Atgal</a></li>
  </ul>
</section>

<?php 
	include_once '../footer.php';
?>