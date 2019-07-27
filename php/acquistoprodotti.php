
<div id="acquistoprodotti">

	
<?php

$nome = $_GET['nome'];
$idp = $_GET['idp'];

 $query ="SELECT  Nome,Descrizione,Prezzo, ProdottoImmagine,Categoria FROM prodotti WHERE IDProdotto = '$idp' ";
 $risultati=mysqli_query($db_server, $query);
 
 $results= mysqli_fetch_array($risultati, MYSQLI_ASSOC);
  $query2 ="SELECT  IDProdotto,Nome,Descrizione,Prezzo, ProdottoImmagine,Categoria FROM prodotti WHERE IDProdotto = '$idp' ";
 $risultati2=mysqli_query($db_server, $query2);
 $target = mysqli_fetch_array($risultati2);
		$_SESSION['NomeProd'] = $target["Nome"];
		$_SESSION['PrezzoProd'] = $target["Prezzo"];
		$_SESSION['IDProd'] = $target['IDProdotto'];
		$_SESSION['ImmProd'] = $target["ProdottoImmagine"];
		
 
		
?> 



  <div id="classprodotto">
   
		

    <img " src="immagini/<?php echo $results["ProdottoImmagine"]?>" class="limmagine"><br>
    <div id="scelta">
	<a class="NomeDescrizione"><?php echo $results['Nome']?></a><br>
    <a class="NomeDescrizione"><?php echo $results['Descrizione']?><?php echo $results['Prezzo']?><?php echo "€"?></a>
    
    <?php 
			if(isset($_SESSION['loggato']))
				
		?><form name="acquista"  action="php/carrellotemporaneo.php" method="post">
			<label>
			<select name="tagliaprod">
			<?php
				$results=mysqli_query($db_server, "SELECT * FROM prodotti inner join taglia on ProdottoTaglia = IDProdotto WHERE IDProdotto = '$idp'");
				while($row= mysqli_fetch_array($results, MYSQLI_ASSOC)) {
			?>
					<option  value="<?php echo $row["NomeTaglia"] ?>" > <?php echo $row["NomeTaglia"] ?> </option>

			<?php
				
				}
			?>
		</select>
		</label>	
				<input type="submit" id="acquista" name="manda"  value="ACQUISTA" class="tasti">
			 
		      
				</form>
    
     
    </div>
</div>

</div>
