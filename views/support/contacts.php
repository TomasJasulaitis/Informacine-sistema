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
    echo '<p class="h4">Darbuotojas</p>';
  } else if (isset($_SESSION['isEmployee']) && $_SESSION['isEmployee'] == 1) {
    echo '<p class="h4">Darbuotojas</p>';
  }

  while($row = mysqli_fetch_assoc($result))
		{
			echo 
			"<tr>
				<td>".$row['id']."</td>
				<td>".$row['first_name']."</td>
				<td>".$row['last_name']."</td>
				<td>".$row['phone_number']."</td>
				<td>".$row['location']."</td>
				<td>".$row['work_hours_start']."</td>
				<td>".$row['work_hours_finish']."</td>
			</tr>";
		};
 
  ?>
  
  <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) { ?>
  <!-- Admino veiksmai -->
  <a href="addContacts.php" class="btn btn-secondary btn-md active" role="button" aria-pressed="true">Prideti kontaktus</a>
     <a href="changeContacts.php" class="btn btn-secondary btn-md active" role="button" aria-pressed="true">Redaguoti kontaktus</a>

  <?php } else if (isset($_SESSION['isEmployee']) && $_SESSION['isEmployee'] == 1) { ?>
  <!-- Darbuotojo veiksmai -->


  <?php } ?>
</section>

<?php 
	include_once '../footer.php';
?>