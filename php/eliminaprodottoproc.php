<?php
	include("database.php");
	
	if(isset($_POST['inviac'])){
		$categoria=mysql_real_escape_string(($_POST['categoria']));
		$id=$_SESSION['idp'];
		$_SESSION['categoria']=$_POST['categoria'];
		header('Location: ../index.php?p=pannelloadmin&h=eliminaprodotti&idp='.$id.'&cat='.$categoria);
	}
	if(isset($_POST['elimina'])){
		
		
		$nome=$_POST['prodotto'];
		
		
		if(	mysqli_query($db_server, "DELETE FROM prodotti WHERE  Nome='$nome'"))
			
			header('Location: ../index.php?p=pannelloadmin&h=eliminacategoria');
		else
			echo "".mysql_error();
	}
?>