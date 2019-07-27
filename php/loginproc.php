<?php
include ('database.php');
if(isset($_POST['accedi'])){



		$utente = (isset($_POST['username']))?mysql_real_escape_string(($_POST['username'])):false;
		$password = (isset($_POST['password']))?($_POST['password']):false;
		$tmp=md5($password);
        

$query = "SELECT* FROM users WHERE Utente = '".$utente."' AND Pwd = '".$tmp."'";
$result = mysqli_query($db_server , $query); 
$numero = mysqli_num_rows($result);



if($numero > 0){
	    
	   
        if(mysqli_query($db_server , $query)) {
		$query = "SELECT* FROM users WHERE Utente = '".$utente."'";
        $result = mysqli_query($db_server , $query);
		$row = mysqli_fetch_array($result);
		$_SESSION['utente'] = $row["Utente"];
		$_SESSION['nome'] = $row["Nome"];
		$_SESSION['cognome'] = $row["Cognome"];
	    $_SESSION['email'] = $row["Email"];
		$_SESSION['password'] = $row["Pwd"];
		
		$_SESSION['loggato'] = 1;
       

		$queryadmin = "SELECT* FROM users WHERE Utente = '".$utente."' AND Admin = '1' ";
		$resultadmin = mysqli_query($db_server , $queryadmin);
		$numeroadmin = mysqli_num_rows($resultadmin);
		if($numeroadmin > 0){
			$_SESSION['admin'] = 1;
			header('location: ../index.php?p=home2');
		}
		else{
			$_SESSION['admin'] = 0;
		
        }
		header('location: ../index.php?p=home2');
		die();
	
  }
}elseif ($numero == 0){

	header("location: ../index.php?p=login&err=1'"); 
	die();
	
	}
   }
   
?>


