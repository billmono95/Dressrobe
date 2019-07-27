<?php

include ('database.php');

if (isset($_POST['invia'])){
	
        $nome = isset($_POST['nome']) ? mysql_real_escape_string(($_POST['nome'])) : false;
		$cognome = isset($_POST['cognome']) ? mysql_real_escape_string(($_POST['cognome'])) : false;
		
		$email = isset($_POST['email']) ? mysql_real_escape_string(($_POST['email'])) : false;
		$telefono = isset($_POST['telefono']) ? ($_POST['telefono']) : false;
		$indirizzo = isset($_POST['indirizzo']) ? mysql_real_escape_string(($_POST['indirizzo'])) : false;
		$civico = isset($_POST['civico']) ? ($_POST['civico']) : false;
		
        $nuovapassword = isset($_POST['nuovapassword']) ? ($_POST['nuovapassword']) : false;
        $confermapassword = isset($_POST['confermapassword']) ? ($_POST['confermapassword']) : false;
        $id=$_SESSION['id'];

           $utente = $_SESSION['utente'];

           if(mysqli_num_rows(mysqli_query($db_server, "SELECT * FROM users WHERE Email LIKE '".$email."'")) > 1) {
			header('Location: ../index.php?p=account&erre=1');
		}

        




else{

$nuovapassword = md5($nuovapassword);

$query =  "UPDATE users SET  Nome='$nome', Cognome='$cognome', Email='$email', Telefono='$telefono', Indirizzo='$indirizzo', Civico='$civico', Pwd = '$nuovapassword' WHERE Utente ='".$utente."'";

	if(mysqli_query($db_server , $query)){
	$_SESSION['utente'] = $utente;
				$risultato=mysqli_query($conn, "SELECT * FROM users WHERE Utente LIKE '$utente'");
				$read=mysqli_fetch_array($risultato, MYSQLI_ASSOC);
				
				$_SESSION['nome'] = $read["Nome"];
		        $_SESSION['cognome'] = $read["Cognome"];
		        $_SESSION['admin'] = $read["Admin"];
				$_SESSION['loggato'] = 1;
	
		header('location: ../index.php?p=home2');
		die();
       


	}
	else header('location: ../index.php?p=descrizione');
		die();
   }
}
?>