<?php
include ('database.php');


if(isset($_POST['accedi'])) {
	 $utente = isset($_POST['utente'])?mysql_real_escape_string(($_POST['utente'])):false;
     $nome = isset($_POST['nome'])?mysql_real_escape_string(($_POST['nome'])):false;
     $cognome = isset($_POST['cognome'])?mysql_real_escape_string(($_POST['cognome'])):false;
     $email = isset($_POST['email'])?mysql_real_escape_string(($_POST['email'])):false;
     $telefono = isset($_POST['telefono'])?($_POST['telefono']):false;
     $indirizzo = isset($_POST['indirizzo'])?mysql_real_escape_string(($_POST['indirizzo'])):false;
     $civico = isset($_POST['civico'])?($_POST['civico']):false;
     $password = isset($_POST['password'])?($_POST['password']):false;
     $confermapassword = isset($_POST['confermapassword'])?($_POST['confermapassword']):false;
	 
	 if(mysqli_num_rows(mysqli_query($db_server, "SELECT * FROM users WHERE Utente LIKE '".$utente."'")) > 0) {
			header('Location: ../index.php?p=signin&erru=1');
		}

     elseif(mysqli_num_rows(mysqli_query($db_server, "SELECT * FROM users WHERE Email LIKE '".$email."'")) > 0) {
			header('Location: ../index.php?p=signin&erre=1');
		}


 
			
      else{
       $password = md5($password);

		$query = "INSERT INTO users(Utente , Nome , Cognome , Email , Telefono  , Indirizzo , Civico ,Pwd , Admin ) VALUES ('$utente' , '$nome' , '$cognome', '$email' , '$telefono'  , '$indirizzo' , '$civico' ,'$password', 0 )";
		
		if(mysqli_query($db_server , $query)){
			$_SESSION['utente'] = $utente;
				$risultato=mysqli_query($conn, "SELECT * FROM users WHERE Utente LIKE '$utente'");
				$read=mysqli_fetch_array($risultato, MYSQLI_ASSOC);
				
				$_SESSION['nome'] = $read["Nome"];
		        $_SESSION['cognome'] = $read["Cognome"];
		        $_SESSION['admin'] = $read["Admin"];
				$_SESSION['loggato'] = 1;


				header('Location: ../index.php?p=home2');
		}
		else {
				header("location: ../index.php?p=descrizione"); 
	die();
	
			}
		 }
         
		}
?>