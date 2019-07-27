
<div class="modificaprodotto">

	<h1>DATI PER LA CONFERMA DELL'ORDINE</h1>


<?php
      if(isset($_SESSION['loggato'])){
      $nomeutente=$_SESSION['utente'];
		$query = "SELECT* FROM users WHERE Utente = '".$nomeutente."'";
		$result=mysqli_query($db_server,$query);
		$dati = mysqli_fetch_array($result, MYSQLI_ASSOC);
	}	
?>

     
<form name="modifica" id="modifica" action="php/datiperacquistoproc.php "   method="post">
<label>
	
<input type="text" name="nome"  value="<?php if(isset($_SESSION['utente'])) echo $dati['Nome'] ?>" placeholder="Nome" id="nome" pattern="[a-zA-Z\s]+">
</label>	<br>

<label>

	<input type="text" name="cognome"    value="<?php if(isset($_SESSION['utente'])) echo $dati['Cognome'] ?>" placeholder="Cognome" id="cognome" pattern="[a-zA-Z\s]+" >
</label><br>	

<label>
	
	<input type="text"  name="email" value="<?php if(isset($_SESSION['utente'])) echo $dati['Email'] ?>" placeholder="Email" id="email" pattern=".{5,}" >
</label> <br>

<label>
	
<input type="text" name="telefono" value="<?php if(isset($_SESSION['utente'])) echo $dati['Telefono'] ?>" placeholder="Telefono" id="telefono" maxlength="10" pattern="[0-9]{9,10}">

</label> <br>

<label>
	
<input type="text" name="indirizzo" value="<?php if(isset($_SESSION['utente'])) echo $dati['Indirizzo'] ?>" placeholder="Indirizzo" id="indirizzo" pattern="[a-zA-Z\s]+" >

</label> <br>

<label>
	
<input type="text" name="civico"  value="<?php if(isset($_SESSION['utente'])) echo $dati['Civico'] ?>" placeholder="Civico" id="civico" size="1" >

</label> <br>




<div id="error" ></div>

<input type="submit" class="tasti" name="conferma"  value="conferma" style="margin-top: 50px;" onclick="return ordine();">
    


</form>
</div>

