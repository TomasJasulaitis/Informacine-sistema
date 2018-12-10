<?php 
  session_start();
  
  // Access control
  include_once '../../inc/accessControl.php';
  allowLogedIn("../../views/userManagement/login.php");

  include_once '../../inc/dbconn.php';
  $sql = "";
  if(isset($_SESSION['isEmployee']) && $_SESSION['isEmployee'] == 1) {
    $sql = "SELECT * FROM employees WHERE id='".$_SESSION['id']."'";
    //die($sql);
  } else {
    $sql = "SELECT * FROM users WHERE id=".$_SESSION['id'];
    //die($sql);
  }
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

	$_SESSION['prefix'] = "../../";
	$_SESSION['currentPage'] = "userActions";
	include_once '../header.php';
?>

<section class="container">
  <h1 class="h2 text-center">Vartotojo duomenų keitimas</h1>
  <form method="post" action="../../controllers/userManagement/proc_changeUserData.php">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="firstName">Vardas</label>
        <?php echo '
        <input type="text" class="form-control" name="firstName" placeholder="Vardas" 
        value="'.$row['firstName'].'">
        '; ?>
      </div>
      <div class="form-group col-md-6">
        <label for="lastName">Pavardė</label>
        <?php echo '
        <input type="text" class="form-control" name="lastName" placeholder="Pavardė" 
        value="'.$row['lastName'].'">
        '; ?>
      </div>
    </div>
    <div class="form-row">
      <?php 
      if(!(isset($_SESSION['isEmployee']) && $_SESSION['isEmployee'] == 1)) {
        echo '
        <div class="form-group col-md-6">
          <label for="phoneNr">Telefono numeris</label>
          <input type="tel" class="form-control" name="phoneNr" placeholder="Telefono numeris" 
          value="'.$row['phoneNumber'].'">
        </div>
      ';} ?>
      <button type="submit" name="submit" class="btn btn-success form-control">Patvirtinti</button>
      <a href="userActions.php" class="btn btn-secondary btn-md form-control mt-2" role="button" aria-pressed="true">Atgal</a>
    </div>
  </form>
</section>

<?php 
	include_once '../footer.php';
?>