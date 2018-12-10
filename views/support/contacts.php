<?php 

	$dbc = mysqli_connect('localhost', 'stud', 'stud', 'informacines_sistemos');
	$sql = "SELECT * FROM contacts";
	$result = mysqli_query($dbc, $sql);
	session_start();
	$_SESSION['prefix'] = "../../";
	$_SESSION['currentPage'] = "contacts";
	include_once '../header.php';
?>

<section class="container">
  <h1 class="h2 text-center">Kontaktai</h1>
  <?php 
  if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) {
    echo '<p class="h4">Adminas</p>';
  } else if (isset($_SESSION['isEmployee']) && $_SESSION['isEmployee'] == 1) {
    echo '<p class="h4">Darbuotojas</p>';
  }

  while($row = mysqli_fetch_assoc($result))
		{
  echo '

  <p class="h5">'.$row['first_name'].' '.$row['last_name'].'</p>
  <p class="h5">'.$row['phone_number'].'</p>
  <p class="h5">'.$row['location'].'</p>
  <p class="h5">'.$row['work_hours_start'].'</p>
  <p class="h5">'.$row['work_hours_finish'].'</p>
	';
  };
 
  ?>


  <h1 class="h2 text-center">Pagalba</h1>
  <br>
  <section class="container">
  <form method="post" action="../../controllers/support/proc_support.php">
   <div class="text-center" style="margin-right:30%; margin-left:30%">
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="first_name">Vardas</label>
        <input type="text" class="form-control" name="first_name" placeholder="Vardas">
      </div>
      <div class="form-group col-md-12">
        <label for="last_name">Pavardė</label>
        <input type="text" class="form-control" name="last_name" placeholder="Pavardė">
      </div>
   
      <div class="form-group col-md-12">
        <label for="phone_number">Telefono numeris</label>
        <input type="tel" class="form-control" name="phone_number" placeholder="Telefono numeris">
      </div>
      <div class="form-group col-md-12">
        <label for="email">El. paštas</label>
        <input type="text" class="form-control" name="email" placeholder="E-mail">
      </div>
	<div class="form-group col-md-12">
        <label for="question">Klausimas</label>
        <input type="text" class="form-control" name="question" placeholder="Klausimas">
      </div>
    </div>

      <button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
</div>
  </form>



  
  <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) { ?>
  <!-- Admino veiksmai -->

  <?php } else if (isset($_SESSION['isEmployee']) && $_SESSION['isEmployee'] == 1) { ?>
  <!-- Darbuotojo veiksmai -->


  <?php } ?>
</section>

<?php 
	include_once '../footer.php';
?>