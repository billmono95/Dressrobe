<?php
include("database.php");
if(isset($_POST['finisciacquisto']) && empty($_SESSION['numero'])){
    header('Location: ../index.php?p=ordina');

    }elseif(isset($_POST['finisciacquisto']) && !empty($_SESSION['numero'])) {
      # code...
     header('Location: ../index.php?p=datiperacquisto');
   
}
   
  
?> 

    
    
 
