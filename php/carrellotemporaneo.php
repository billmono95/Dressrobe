<?php
include("database.php");
if(isset($_POST['manda']) && !isset($_SESSION['loggato'])){

  $_SESSION['compra'] = $_GET['idp'];
  header('Location: ../index.php?p=login');

?>


<?php 
     }elseif(isset($_POST['manda']) && isset($_SESSION['loggato'])){



$taglia =($_POST['tagliaprod']);

$idprodotto = $_SESSION['IDProd'];
$prezzo = $_SESSION['PrezzoProd'];
$utente = $_SESSION['utente'];








 {
			$query = "INSERT INTO carrello(Account , Prodotto , Prezzo,Taglia ) VALUES ('$utente','$idprodotto','$prezzo','$taglia' )";
          			 if(mysqli_query($db_server , $query)){

                       $query2 = "SELECT * FROM carrello WHERE Account = '".$utente."' ";
                        $result2 = mysqli_query($db_server , $query2); 
                           $numero2 = mysqli_num_rows($result2);
                           if ($numero2==0) {
                           	$_SESSION['numero'] = 0;
                           }else
                           $_SESSION['numero'] = $numero2;
                       

				header('Location: ../index.php?p=home3');
			}
			else {
				echo "Errore nella query2: " ; echo mysqli_error($db_server);
			}

 }



}
?>


