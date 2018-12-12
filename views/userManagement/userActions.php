<?php 
  session_start();
  // Access control
  include_once '../../inc/accessControl.php';
  allowLogedIn("../../views/userManagement/login.php");

	$_SESSION['prefix'] = "../../";
	$_SESSION['currentPage'] = "userActions";
	include_once '../header.php';
?>

<section class="container">
  <h1 class="h2 text-center">Vartotojo duomenys</h1>
  <?php 
  if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) {
    echo '<p class="h4">Administratorius</p>';
  } else if (isset($_SESSION['isEmployee']) && $_SESSION['isEmployee'] == 1) {
    echo '<p class="h4">Darbuotojas</p>';
  }
  echo '
  <p class="h5">'.$_SESSION['firstName'].' '.$_SESSION['lastName'].'</p>
  <p class="h5">'.$_SESSION['email'].'</p>';
  if (isset($_SESSION['phoneNumber'])) {
    echo '
    <p class="h5">'.$_SESSION['phoneNumber'].'</p>';
  }
  ?>
  <!-- Bendri vartotojų veiksmai -->
  <a href="changeUserData.php" class="btn btn-secondary btn-md active" role="button" aria-pressed="true">Keisti duomenis</a>
  <a href="changePassword.php" class="btn btn-secondary btn-md active" role="button" aria-pressed="true">Keisti slaptažodį</a>
  <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) { ?>
  <!-- Admino veiksmai -->
  <a href="adminPanel.php" class="btn btn-secondary btn-md active" role="button" aria-pressed="true">Administratoriaus panelė</a>

  <?php } else if (isset($_SESSION['isEmployee']) && $_SESSION['isEmployee'] == 1) { ?>
  <!-- Darbuotojo veiksmai -->


  <?php } ?>
</section>

<?php 
	include_once '../footer.php';
?>