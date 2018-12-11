<?php 
/*include_once '../../inc/accessControl.php';
allowLogedIn("../../views/userManagement/login.php");
allowAccess(true, false, "../../index.php");*/

  $_SESSION['prefix'] = "../../";
  $_SESSION['currentPage'] = "productionMain";
  include_once '../header.php';
  include_once '../../inc/dbconn.php';
  $sql = "";
  $sql = "SELECT * FROM orders";
  $result = mysqli_query($conn, $sql);
  //$row = mysqli_fetch_assoc($result);
  /*session_start();
  $_SESSION['prefix'] = "../../";
  $_SESSION['currentPage'] = "productionMain";
    include_once '../header.php';*/
  /*  session_start();
include_once '../../inc/accessControl.php';
allowLogedIn("../../views/userManagement/login.php");
allowAccess(true, false, "../../index.php");*/
?>
                                         
<div class="container">
<h1 class="h2 text-center">Gamyba</h1>
    <div class="jumbotron">

    <a href="assemblySelection.php" class="btn btn-secondary btn-md active" role="button" aria-pressed="true">Telefono komplektacijos pasirinkimas</a>
    <hr>
    
    <h2 class="text-center" style="margin:20px;">Jūsų užsakymai:</h2>
    
    <?php
    
     echo '
    <table style="width:90%; text-align: center;">
    <tr>
      <th>Marke</th>
      <th>Modelis</th> 
      <th>Spalva</th>
      <th>Atminties dydis</th>
      <th>RAM</th>
      <th>Redaguoti</th>
      <th>Pasalinti</th>

    </tr>
    ';
    while($row = mysqli_fetch_assoc($result)){
    echo '
    <tr>
      <td>'.$row['brand'].' </td>
      <td>'.$row['model'].' </td> 
      <td>'.$row['color'].'</td>
      <td>'.$row['memory_size'].'</td>
      <td>'.$row['ram_size'].'</td>
      <td>
        <a href="assemblySelectionEdit.php" class="btn btn-warning btn-sm active" role="button">Redaguoti</a>
      </td>
      <td>
      <a href="assemblySelectionEdit.php" class="btn btn-danger btn-sm active" role="button">Salinti</a>
      </td>
    </tr>
';}
  echo '</table>'
 ?>
  </div>
</div>

<?php 
	include_once '../footer.php';
?>

