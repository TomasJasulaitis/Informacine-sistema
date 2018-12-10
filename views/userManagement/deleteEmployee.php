<?php 
  session_start();
  
  // Access control
  include_once '../../inc/accessControl.php';
  allowLogedIn("../../views/userManagement/login.php");
  allowAccess(true, false, "../../index.php");

  include_once '../../inc/dbconn.php';
  $sql = "SELECT * FROM employees";
  $employees = mysqli_query($conn, $sql);

	$_SESSION['prefix'] = "../../";
	$_SESSION['currentPage'] = "userActions";
	include_once '../header.php';
?>

<section class="container">
  <h1 class="h2 text-center">Darbuotojo šalinimas</h1>
  <div class="text-center" style="margin-right:30%; margin-left:30%">
    <form method="post" action="../../controllers/userManagement/proc_deleteEmployee.php">
      <label for="DelEmployeeId">Pasirinkite darbuotoją</label>
      <select class="form-control" name="DelEmployeeId">
        <?php 
        while ($employee = mysqli_fetch_assoc($employees)) {
          echo '<option value="'.$employee['id'].'">
            '.$employee['id'].' '.$employee['firstName'].' '.$employee['lastName'].
            '</option>';
        }
        ?>
      </select>
      <button type="submit" name="submit" class="btn btn-success form-control mt-2">Patvirtinti</button>
      <a href="adminPanel.php" class="btn btn-secondary btn-md form-control mt-2" role="button" aria-pressed="true">Atgal</a>
    </form>
  </div>
</section>

<?php 
	include_once '../footer.php';
?>