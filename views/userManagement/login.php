<?php 
  session_start();
  $_SESSION['prefix'] = "../../";
  $_SESSION['currentPage'] = "login";
	include_once '../header.php';
?>

<section class="container">
  <h2 class="h2 text-center">Prisijungti</h2>
  <form method="post" action="../../controllers/userManagement/proc_login.php">
    <div class="text-center" style="margin-right:30%; margin-left:30%">
      <div class="form-group">
        <label for="email">El. paštas</label>
        <input type="email" class="form-control" name="email" placeholder="El. paštas">
      </div>
      <div class="form-group">
          <label for="pass">Slaptažodis</label>
          <input type="password" class="form-control" name="pass" placeholder="Slaptažodis">
      </div>
      <button type="submit" name="submit" class="btn btn-primary form-control">Prisijungti</button>
    </div>
  </form>
</section>

<?php 
	include_once '../footer.php';
?>