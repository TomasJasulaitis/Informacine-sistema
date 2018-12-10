<?php 
  session_start();
  $_SESSION['prefix'] = "../../";
  $_SESSION['currentPage'] = "registration";
	include_once '../header.php';
?>

<section class="container">
  <h1 class="h2 text-center">Registracija</h1>
  <form method="post" action="../../controllers/userManagement/proc_registration.php">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="firstName">Vardas</label>
        <input type="text" class="form-control" name="firstName" placeholder="Vardas">
      </div>
      <div class="form-group col-md-6">
        <label for="lastName">Pavardė</label>
        <input type="text" class="form-control" name="lastName" placeholder="Pavardė">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="phoneNr">Telefono numeris</label>
        <input type="tel" class="form-control" name="phoneNr" placeholder="Telefono numeris">
      </div>
      <div class="form-group col-md-6">
        <label for="email">El. paštas</label>
        <input type="email" class="form-control" name="email" placeholder="El. paštas">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="pass1">Slaptažodis</label>
        <input type="password" class="form-control" name="pass1">
      </div>
      <div class="form-group col-md-6">
        <label for="pass2">Pakartoti slaptažodį</label>
        <input type="password" class="form-control" name="pass2">
      </div>
      <button type="submit" name="submit" class="btn btn-primary form-control">Registruotis</button>
    </div>
  </form>
</section>

<?php 
	include_once '../footer.php';
?>