<?php 
  session_start();
  $_SESSION['prefix'] = "../../";
  $_SESSION['currentPage'] = "supportMain";
	include_once '../header.php';
?>



<section class="container">
  <h2 class="h2 text-center">Aptarnavimas</h2>
<ul>
    <li><a href="contacts.php" class="text-secondary">Kontaktai</a></li>
    <li><a href="support.php" class="text-secondary">Pagalba</a></li>
    <li><a href="faq.php" class="text-secondary">Dazniausiai uzduodami klausimai</a></li>
    <li><a href="evaluateEmployee.php" class="text-secondary">Ivertinti darbuotoja</a></li>
    <li><a href="orderInfo.php" class="text-secondary">Uzsakymo informacija</a></li>
    <li><a href="index.php" class="text-secondary">Atgal</a></li>
  </ul>
</section>

<?php 
	include_once '../footer.php';
?>