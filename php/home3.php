
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

<div id="vedere">
 <h1>Carrello</h1>
<?php

$ordine = 0.00;
$totale = 0.00;
$numero = 0;

$utente = $_SESSION['utente'];


		$query = "SELECT * FROM carrello inner join Prodotti on IDProdotto = Prodotto WHERE Account = '$utente' LIMIT 7 ";
		
		
		$result = mysqli_query($db_server , $query);
		while($row= mysqli_fetch_array($result, MYSQLI_ASSOC)){
	
	 $query2 =  "SELECT * FROM carrello inner join Prodotti on IDProdotto = Prodotto WHERE Account = '$utente'  ";
                        $result2 = mysqli_query($db_server , $query2); 
                           $numero = mysqli_num_rows($result2);	
                           $_SESSION['numarticoli'] = $numero;
                           $ordine = $ordine + $row['Prezzo'];
                          
                           $totale = $ordine;
                            $_SESSION['totalecosto'] = $totale;
?> 
 <div id="vedereleft">
 	  <div id="imgcorretto">
	<img " src="immagini/<?php echo $row["ProdottoImmagine"]?>" class="immaginecarrello">
	</div >
	 <div id="nomecorretto">
    <a><?php echo $row['Nome']?><?php echo " "?><?php echo $row['Prezzo']?><?php echo "€"?><?php echo "   "?><?php echo $row['Taglia']?></a>
    
    </div>
    
   
    
   
    
    </div>
     
 

<?php
     }


?>

<div id="totaleordine">
<p class="ordinescritta" style="color: white">TOTALE ORDINE :<a><?php echo "$totale"?><?php echo "€"?></a></p>
<p class="ordinescritta" style="font-weight: lighter;font-size: 15px; color: white;" >numero articoli:<a><?php echo "$numero"?></a></p>
<form name="procediacquisto" class="ordinescritta" action="php/procediacquisto.php" method="post">
			 
			
			<input type="submit"  name="finisciacquisto"  value="PROCEDI ALL' ACQUISTO" class="tasti" style="width: 230px; height: 40px;">
			
			
				</form>
				<form name="acquista" class="ordinerimuovi" action="php/eliminadalcarrello.php" method="post">
			 
			
				<input type="submit" name="rimuovi" class="tasti" value="RIMUOVI ULTIMO ARTICOLO" style="width: 250px; height: 40px;">
			
			
				</form>

    </div>

</div>

<?php
}
?>