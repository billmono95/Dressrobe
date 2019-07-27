<?php
	include("database.php");
	if(isset($_POST['invia'])){
		$nome = isset($_POST['nome'])?(($_POST['nome'])): false;
		$prodottoimmagine = isset($_POST['immagineprodotto'])?($_POST['immagineprodotto']):false;
		$descrizione = isset($_POST['descrizione']) ? (($_POST['descrizione'])): false;
		$prezzo = isset($_POST['prezzo']) ? ($_POST['prezzo']): false;
		$categoria = isset($_POST['categoria']) ?(($_POST['categoria'])): false;
		
		
		 {
			$query = "INSERT INTO prodotti(Nome, ProdottoImmagine,Descrizione, Prezzo, Categoria) VALUES ('$nome', '$prodottoimmagine','$descrizione', '$prezzo', '$categoria')";

          			 if(mysqli_query($db_server , $query)){
				header('Location: ../index.php?p=pannelloadmin&h=aggiungiprodotto');
			}
			else {
				echo "Errore nella query: " ; echo mysqli_error($db_server);
			}
		}
	}
?>