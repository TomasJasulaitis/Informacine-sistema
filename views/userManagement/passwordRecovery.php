<?php 
  session_start();
  $_SESSION['prefix'] = "../../";
  $_SESSION['currentPage'] = "login";
	include_once '../header.php';
?>

<section class="container">
  <h1 class="h2 text-center">Slaptažodžio atkūrimas</h1>
  <form method="post" action="../../controllers/userManagement/proc_passwordRecovery.php">
    <div class="text-center" style="margin-right:30%; margin-left:30%">
      <div class="form-group">
        <label for="email">El. paštas</label>
        <input type="email" class="form-control" name="email" placeholder="El. paštas">
      </div>
      <button type="submit" name="submit" class="btn btn-success form-control">Patvirtinti</button>
      <a href="login.php" class="btn btn-secondary btn-md form-control mt-2" role="button" aria-pressed="true">Atgal</a>
    </div>
  </form>
</section>

<?php 
	include_once '../footer.php';
?>