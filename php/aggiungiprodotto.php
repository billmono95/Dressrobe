<?php
	if(!isset($_SESSION['admin'])) {
?>
		
<?php
	} 
	else {
		$errorep="";
		if(isset($_GET['errp']))
			$errorep="Prodotto già esistente ";
		
?>

<div class="modificaprodotto">
<form id="aggiungiprodotto" class="opzioniadmin" action="php/aggiungiprodottoproc.php" method="POST">
	<h1> Aggiungi prodotto</h1>
	
	<label>
		<p>Nome:</p>
		<input type="text" value="<?php if(isset($n)) echo $n ?>" name="nome" required>
	</label><br>
<label>
		<p>ProdottoImmagine:</p>
		<input type="text" value="" name="immagineprodotto" accept = "image/png,image/gif,image/jpeg,image/jpg" required>
	</label><br>

	
  
   <label>
		<p>Categoria:</p>
		<input type="text" value="" name="categoria" size="1" pattern="[1-5]{1,1}" required >
	</label><br>


		<p>Descrizione:	</p>
	<textarea form="aggiungiprodotto" name="descrizione" required placeholder="DESCRIZIONE" style="text-align: center;"></textarea>
	<br>
	<label>
		<p>Prezzo:</p>
		<input type="text" size="10" value="<?php if(isset($n)) echo $pr ?>" maxlength="10" name="prezzo" pattern="[0-9]{0,9}.[0-9]{1,2}" required>
	</label><br>


	
	<input type="submit" class="tasti" name="invia" value="Aggiungi">
</form>
</div>
<?php
	}
?>