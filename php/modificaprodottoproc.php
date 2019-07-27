<?php

include("database.php");
if (isset($_POST['inviap'])) {

$nome=mysql_real_escape_string(($_POST['nomeprod']));
		
		$_SESSION['nomeprod']=$_POST['nomeprod'];
		header('Location: ../index.php?p=pannelloadmin&h=modificaprodotto');

}


if(isset($_POST['modifica'])){
		
		
	  $nome = isset($_POST['nomeprodotto']) ? mysql_real_escape_string(($_POST['nomeprodotto'])) : false;
		$descrizione = isset($_POST['descprodotto']) ? mysql_real_escape_string(($_POST['descprodotto'])) : false;
		
		 $idprod = isset($_POST['idprod']) ? mysql_real_escape_string(($_POST['idprod'])) : false;
		$prezzo = isset($_POST['prezzoprodotto']) ? ($_POST['prezzoprodotto']) : false;
		

		$query =  "UPDATE prodotti SET  Nome='$nome', Descrizione='$descrizione',  Prezzo='$prezzo'  WHERE IDProdotto ='$idprod'";
		
		if(	mysqli_query($db_server, $query)){
			
			header('Location: ../index.php?p=pannelloadmin&h=scegliprodottodamodificare');
			die();
		}else{
			echo "".mysql_error();
		}
	}


?>