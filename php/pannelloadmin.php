<?php
	if(!isset($_SESSION['admin'])) //se non sei l'admin torni alla schermata iniziale
		header('Location: ../home2.php');
	else{
?>
	<nav class="menuadmin">
		<ul>
			<li><a href="index.php?p=pannelloadmin&h=aggiungiprodotto">Aggiungi prodotto</a></li><li><a href="index.php?p=pannelloadmin&h=scegliprodottodamodificare">Modifica Prodotto</a></li><li><a href="index.php?p=pannelloadmin&h=eliminacategoria">Elimina Prodotto</a></li>
		</ul>
	</nav>
	<?php
		if (isset($_GET['h']))
	      	{
	      		$pagina = $_GET['h'];
		include "php/".$pagina.".php";
					}
				else
					{
					$pagina = "aggiungiprodotto";
					include "php/".$pagina.".php";
					}
			?>
	
<?php
	}
?>