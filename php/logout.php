<?php

include ('database.php');


$targetelimina = $_SESSION['utente'];

if(		mysqli_query($db_server, "DELETE FROM carrello WHERE Account = '$targetelimina'")){ //pulisce la tabella carrello
			
		 session_unset();
session_destroy();
	header('Location: index.php');
		}else{
			echo "".mysql_error();
		}
	





    exit;

?>