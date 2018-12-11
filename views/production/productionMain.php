<?php 
  session_start();
  $_SESSION['prefix'] = "../../";
  $_SESSION['currentPage'] = "productionMain";
	include_once '../header.php';
?>
<div class="container">
<h1 class="h2 text-center">Gamyba</h1>
    <div class="jumbotron">

    <a href="assemblySelection.php" class="btn btn-secondary btn-md active" role="button" aria-pressed="true">Telefono komplektacijos pasirinkimas</a>
    <hr>
    <p>
    <h2 class="text-center" style="margin:20px;">Jūsų užsakymai:</h2>
    <a href="assemblySelectionEdit.php" class="btn btn-secondary btn-md active" role="button" aria-pressed="true">Komplektacijos redagavimas</a>
    <a class="btn btn-secondary btn-md active" role="button" aria-pressed="true">Užsakymo ištrynimas</a>
    
    </p>
  </div>
</div>

<?php 
	include_once '../footer.php';
?>

