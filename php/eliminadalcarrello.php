<?php
include("database.php");
if(isset($_POST['rimuovi'])){



$utente = $_SESSION['utente'];

  $query = "SELECT * FROM carrello inner join Prodotti on IDProdotto = Prodotto WHERE Account = '".$utente."' ";
    
    
    $result = mysqli_query($db_server , $query);
    while($row= mysqli_fetch_array($result, MYSQLI_ASSOC)){

     $nometarget= $row['Nome'];
    $prezzotarget = $row['Prezzo'];
    $quantitatarget = $row['Quantita'];
    $idtarget = $row['IDCarrello'];
   
  
?> 

    
    
 


<?php
     }{
      
                 if(mysqli_query($db_server ,  "DELETE FROM carrello  WHERE   IDCarrello = '$idtarget' ")){

                       $query2 = "SELECT * FROM carrello WHERE Account = '".$utente."' ";
                        $result2 = mysqli_query($db_server , $query2); 
                           $numero2 = mysqli_num_rows($result2);
                       if ($numero2>0) {
                         $_SESSION['numero'] = $numero2;
                       }else{
                           $_SESSION['numero'] = 0;
                       }

        header('Location: ../index.php?p=home3');
      }
      else {
        echo "Errore nella query: " ; echo mysqli_error($db_server);
      }

 }



}

?>







 
?>


