<?php 
  session_start();
  
  // Access control here
  // Code...

	$_SESSION['prefix'] = "../../";
	$_SESSION['currentPage'] = "addContacts";
	include_once '../header.php';
?>

<section class="container">
  <h1 class="h2 text-center">Kontaktu pridėjimas</h1>
  <form method="post" action="../../controllers/support/proc_addContacts.php">
    <div class="text-center" style="margin-right:30%; margin-left:30%">
      <div class="form-group">
        <label for="first_name">Vardas</label>
        <input type="text" class="form-control" name="first_name">
      </div>
      <div class="form-group">
        <label for="last_name">Pavardė</label>
        <input type="text" class="form-control" name="last_name">
      </div>
      <div class="form-group">
        <label for="phone_number">Telefono numeris</label>
        <input type="text" class="form-control" name="phone_number">
      </div>
      <div class="form-group">
        <label for="location">Vietove</label>
        <input type="text" class="form-control" name="location">
      </div>
	<div class="form-group">
        <label for="work_hours_start">Darbo valandu pradzia</label>
        <input type="time" class="form-control" name="work_hours_start">
      </div>
	<div class="form-group">
        <label for="work_hours_finish">Darbo valandu pabaiga</label>
        <input type="time" class="form-control" name="work_hours_finish">
      </div>
      <button type="submit" name="submit" class="btn btn-success form-control">Patvirtinti</button>
      <a href="adminPanel.php" class="btn btn-secondary btn-md form-control mt-2" role="button" aria-pressed="true">Atgal</a>
    </div>
  </form>
</section>

<?php 
	include_once '../footer.php';
?>