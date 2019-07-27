<?php
	 if(isset($_GET['id'])) 
		$id=$_GET['id'];
?>
<div class="modificaprodotto">
<form class="opzioniadmin" action="php/eliminaprodottoproc.php" method="POST">
	<h1> Scegli la categoria</h1>
	<label>
		<p>Categoria:</p>
		<select name="categoria">
			<?php
				$results=mysqli_query($db_server, "SELECT DISTINCT NomeCategoria FROM categoria ");
				while($row= mysqli_fetch_array($results, MYSQLI_ASSOC)) {
			?>
					<option value="<?php echo $row["NomeCategoria"] ?>" > <?php echo $row["NomeCategoria"] ?> </option>
			<?php
				}
			?>
		</select>
	</label><br>
	<input type="submit" class="tasti" name="inviac" value="Cerca" style="margin-top: 15%">
</form>
</div>
