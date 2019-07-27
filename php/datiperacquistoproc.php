<?php
include("database.php");
if(isset($_POST['conferma'])){
   


      
  
   

$utente = $_SESSION['utente'];

  $query = "SELECT * FROM carrello inner join Prodotti on IDProdotto = Prodotto WHERE Account = '".$utente."' ";
   
   
                       $query2 = "SELECT * FROM carrello inner join Prodotti on IDProdotto = Prodotto WHERE Account = '".$utente."' ";
                        $result2 = mysqli_query($db_server , $query2); 
                           $numero2 = mysqli_num_rows($result2); 
    
    $result = mysqli_query($db_server , $query);
    while($row= mysqli_fetch_array($result, MYSQLI_ASSOC)){

     $nometarget= $row['Nome'];
    $prezzotarget = $row['Prezzo'];
    $tagliatatarget = $row['Taglia'];
   
  
?> 

    
    
 


<?php
    
      
                 

                      $query = "INSERT INTO ordine(AccountUser , NomeProdotto , Prezzo,Taglia) VALUES ('$utente','$nometarget','$prezzotarget','$tagliatatarget' )";
                 if(mysqli_query($db_server , $query)){

                      
                            $_SESSION['numero'] = 0;
                           

                          $query3 =  "DELETE FROM carrello  WHERE Account = '$utente' ";
                       if(mysqli_query($db_server , $query3)){
           
           
        header('Location: ../index.php?p=home2');
      }
}
  
      else {
        echo "Errore nella query: " ; echo mysqli_error($db_server);
      }

 

  }

}

?>





