<?php
$categoria= $_SESSION['nomeprod'];
?>
<div class="modificaprodotto">
<form name="opzioni" class="opzioni" action="php/modificaprodottoproc.php " method="POST">
			<h1> modifica prodotto</h1>
			
				<p>Prodotto:<p><br>
				
					<?php
						$results=mysqli_query($db_server, "SELECT * FROM prodotti where Nome = '$categoria'");
						while($row= mysqli_fetch_array($results, MYSQLI_ASSOC)) {
						
					?>

					      <label>
						<input type="text" name="idprod" value="<?php echo $row['IDProdotto']?>" readonly="readonly" >
					</label><br>
					     <label>
						<input type="text" name="nomeprodotto" value="<?php echo $row['Nome']?>">
					</label><br>
					<label>
                <input type="text" name="descprodotto" value="<?php echo $row['Descrizione']?>">
                </label><br>
                <label>
               <input type="text" name="prezzoprodotto" value="<?php echo $row['Prezzo']?>">
              
               </label><br>
               <br>
					<?php
					
						}
					?>
			
				
		 <input type="submit" class="tasti" name="modifica" value="modifica">
			
		</form>

</div>		