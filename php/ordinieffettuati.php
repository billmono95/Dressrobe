
<?php
	if(!isset($_SESSION['loggato'])){
		


?> <div id="nonconnesso">
<label id="buttonaccount" ><p>Non sei connesso
			 </p> <br>

		
		
		</label>
		<a href="index.php?p=login" ><button class="tasti">ACCEDI</button></a>
       </div>
<?php
	}elseif(isset($_SESSION['loggato'])){

		
?>


<div class="ordinitotali" onmouseover="beginordine();">
 <h1 id="ordinespacing">ordini effettuati</h1>
 <div id="dataordine">
<?php


$utente = $_SESSION['utente'];


		$query = "SELECT * FROM ordine  WHERE AccountUser = '$utente' ORDER BY Data DESC LIMIT 6 ";
		
		
		$result = mysqli_query($db_server , $query);
		while($row= mysqli_fetch_array($result, MYSQLI_ASSOC)){
	
	
	
?> 

 	  
	 <div id="ordineeffettuato">

    <a><?php echo $row['NomeProdotto']?>
    <?php echo $row['Prezzo']?><?php echo "€"?>
    <?php echo $row['Taglia']?>
    <?php echo "effettuato il:"?>
    <?php echo $row['Data']?>
    </a>
    
    </div>
    
   
    
   
    
    
     
 

<?php
     }

} 
?>
 
</div>
</div>