<div class="modificaprodotto">
<form class="opzioniadmin" action="php/modificaprodottoproc.php" method="POST">
	<h1> Scegli il prodotto</h1>
	<label>
		<p>Categoria:</p>
		<select name="nomeprod">
			<?php
				$results=mysqli_query($db_server, "SELECT * FROM prodotti");
				while($row= mysqli_fetch_array($results, MYSQLI_ASSOC)) {
			?>
					<option value="<?php echo $row["Nome"] ?>" > <?php echo $row["Nome"] ?> </option>
			<?php
				}
			?>
		</select>
	</label><br>
	<input type="submit" class="tasti" name="inviap" value="Cerca">
</form>
</div>