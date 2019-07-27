<div class="login">
  
<?php
	if(isset($_SESSION['utente'])){
		$nomeutente=$_SESSION['utente'];
		$query = "SELECT* FROM users WHERE Utente = '".$nomeutente."'";
		$result=mysqli_query($db_server,$query);
		$dati=mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
?>
	<h1>Contattaci</h1>
	<form id="cont" class="registrati" method="POST">
		<label>
			
			<input type="text" value="<?php if(isset($_SESSION['utente'])) echo $dati['Nome'] ?>"   name="nomme" placeholder="Nome" pattern="[a-zA-Z\s]+" required>
		</label> <br>
		<label>
			
			<input type="text" value="<?php if(isset($_SESSION['utente'])) echo $dati['Cognome']?>" name="coggnome" placeholder="Cognome" pattern="[a-zA-Z\s]+" required>
		</label> <br>
		<label>
			
			<input  type="email" value="<?php if(isset($_SESSION['utente']))echo $dati['Email']?>" name="emmail" placeholder="Email" size="25" required>
		</label> <br>

		<textarea form="cont" name="note" placeholder="Scrivici" style="margin-top: 50px;" required></textarea> <br>
        <div id="msg" ></div> 
		<input type="submit" class="tasti" name="invia"  value="Invia">
        
	</form>
     
</div>
