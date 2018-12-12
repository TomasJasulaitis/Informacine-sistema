<?php 

	
	session_start();
	$_SESSION['prefix'] = "../../";
	$_SESSION['currentPage'] = "faq";
	include_once '../header.php';
?>

<section class="container">
  <h1 class="h2 text-center">Dazniausiai uzduodami klausimai</h1>

               
                 <table style="border-width: 2px; border-style: dotted;"><tr><td>
                      Atgal į [<a href="../../index.php">Pradžia</a>]</td></tr>
				    </table>   
                    	<table> <tr>
  			<p style="text-align:left;"><strong>Ar si svetaine veikia?<br></strong>	
			<?php echo "Taip, si svetaine veikia</br>";	?>
			<p style="text-align:left;"><strong>Ka sioje svetaineje galima veikti?<br></strong>		
			<?php echo "Svetaine turi daug funkciju.</br>";	?>
			<p style="text-align:left;"><strong>Ar prisijungimas veikia?<br></strong>		
			<?php echo "Taip, prisijungimas veikia</br>";	?>
			<p style="text-align:left;"><strong>Kur rasti pagalbos?<br></strong>		
			<?php echo "Eiti i aptarnavimo puslapi ir spausti ant kontaktu.</br>";	?>
		         </tr>
		</table>
      </div>
</section>