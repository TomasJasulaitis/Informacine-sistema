<?php 
	session_start();
	$_SESSION['prefix'] = "";
	$_SESSION['currentPage'] = "index";
	include_once 'views/header.php';
?>

<section class="container">
	<h1 class="h2 text-center">Mobiliųjų Telefonų Centras</h1>

</section>

<?php 
	include_once 'views/footer.php';
?>