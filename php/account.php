
<?php
	if(!isset($_SESSION['loggato'])) {
		
?><div id="nonconnesso">
 <label id="buttonaccount" ><p>Non sei connesso
			 </p> <br>

		
		
		</label>
		<a href="index.php?p=login" ><button class="tasti">ACCEDI</button></a>
       </div>







<?php
      }elseif(isset($_SESSION['loggato'])){

		$erroree="";
		
		if(isset($_GET['erre']))
			$erroree="Email già in uso";

      $nomeutente=$_SESSION['utente'];
		$query = "SELECT* FROM users WHERE Utente = '".$nomeutente."'";
		$result=mysqli_query($db_server,$query);
		$dati = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>		

<div class="login" style="height: 195%">

	<h1>IL TUO ACCOUNT</h1>
     
<form name="modifica" id="modifica" action="php/modificaccount.php "   method="post"  >
<label>
	
<input type="text" name="nome"  value="<?php if(isset($_SESSION['utente'])) echo $dati['Nome'] ?>" placeholder="Nome" id="nome" pattern="[a-zA-Z\s]+">
</label><br>	

<label>

	<input type="text" name="cognome"    value="<?php if(isset($_SESSION['utente'])) echo $dati['Cognome'] ?>" placeholder="Cognome" id="cognome" pattern="[a-zA-Z\s]+" >
</label><br>	

<label>
	
	<input type="text"  name="email" value="<?php if(isset($_SESSION['utente'])) echo $dati['Email'] ?>" placeholder="Email" id="email" pattern=".{5,}" >
</label><br>

<label>
	
<input type="text" name="telefono" value="<?php if(isset($_SESSION['utente'])) echo $dati['Telefono'] ?>" placeholder="Telefono" id="telefono" maxlength="10" pattern="[0-9]{9,10}">

</label><br>

<label>
	
<input type="text" name="indirizzo" value="<?php if(isset($_SESSION['utente'])) echo $dati['Indirizzo'] ?>" placeholder="Indirizzo" id="indirizzo" pattern="[a-zA-Z\s]+" >

</label><br>

<label>
	
<input type="text" name="civico"  value="<?php if(isset($_SESSION['utente'])) echo $dati['Civico'] ?>" placeholder="Civico" id="civico" size="1" >

</label><br>


<label>
<input type="password" name="nuovapassword" value="" id="newpass" placeholder="Nuova password " required  >
</label><br>

<label>
	
		<input type="password" name="confermapassword"  id="conferpassword" placeholder="Conferma password " required >
		
	</label><br>

<div id="error" style="margin-top: 50px;">
	<span class="error"><?php echo $erroree ?></span>
</div>

<input type="submit" class="tasti" name="invia"  value="invia" onclick="return modificadati();">
    


</form>


<?php

	}

?>
</div>