
<?php
	if(isset($_GET['idp']))
		$idp=$_GET['idp'];
		$categoria=$_GET['cat'];
?>
         <div class="modificaprodotto">
		<form class="opzioniadmin" action="php/eliminaprodottoproc.php" method="POST">
			<h1> Elimina prodotto</h1>
			<label>
				<p>Prodotto:</p>
				<select name="prodotto">
					<?php
						$results=mysqli_query($db_server, "SELECT Nome FROM prodotti inner join categoria on idcategoria = categoria  WHERE NomeCategoria='$categoria'");
						while($row= mysqli_fetch_array($results, MYSQLI_ASSOC)) {
					?>
							<option value="<?php echo $row["Nome"] ?>" > <?php echo $row["Nome"] ?> </option>
					<?php
						}
					?>
				</select>
			</label><br>
			<input type="submit" class="tasti" name="elimina" value="Elimina" style="margin-top: 10%;">
		</form>
		</div>