<?php 
  session_start();
  
  // Access control here
 // include_once '../../inc/accessControl.php';
 // allowLogedIn("../../views/userManagement/login.php");
 // allowAccess(true, false, "../../index.php");

	$_SESSION['prefix'] = "../../";
	$_SESSION['currentPage'] = "userActions";
	include_once '../header.php';
?>
  <div class="container">
    <h1 class="h2 text-center">Pardavimai</h1>
	
	<a href="orderConfirm.php" class="btn btn-secondary btn-md active" role="button" aria-pressed="true" width="auto">Patvirtinti užsakymą</a>
	<a href="orderReject.php" class="btn btn-secondary btn-md active" role="button" aria-pressed="true" width="auto">Atšaukti užsakymą</a>
	
	<table id="customers">
		<tr>
			<th colspan="4">
			Prekės:
			</th>
		</tr>
		<tr>
			<th>
			Prekės ID
			</th>
			<th>
			Prekės Pavadinimas
			</th>
			<th>
			Prekės Tipas
			</th>
			<th>
			Prekės Kaina
			</th>
		</tr>
	</table>
	
	<?php 
	include_once '../../inc/dbconn.php';
	
	$sql = "SELECT name, type, price FROM sales";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"]. " Type: " . $row["type"]. " Price: " . $row["price"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

	<a href="addItem.php" class="btn btn-secondary btn-md active" role="button" aria-pressed="true" width="auto">Pridėti prekę</a>

    <!-- Čia dedam savo -->


  </div>
<?php 
	include_once '../footer.php';
?>