<?php
	$erroreu=$errorep=$erroree="";
	if(isset($_GET['erru']))
		$erroreu="Utente già in uso";
	if(isset($_GET['erre']))
		$erroree="Email già in uso";
	if(isset($_GET['errp']))
		$errorep="Le password non coincidono";
	
?>

<nav class="menulogin">
		<ul>
			<li><a href="index.php?p=login">Login</a></li><li><a href="index.php?p=signin">Registrati</a>
		</ul>
	</nav>
<div class="login" style="height: 195%;" onmouseover="beginsignin();">
	<h1 id="signinspacing" style="font-size: 25px;">Registrazione</h1>

<p>Inserire tutti i dati per completare l'operazione di registrazione</p>

<form name="signin" id="signin" action="php/signinproc.php "   method="post">
<label>
	

<input type="text" name="nome" id="nome" placeholder="Nome" pattern="[a-zA-Z\s]+">
</label><br>	

<label>
	

<input type="text" name="cognome" id="cognome" placeholder="Cognome" pattern="[a-zA-Z\s]+" >
</label><br>	

<label>
	
	
	<input type="text"  name="email" id="email" placeholder="Email" pattern=".{5,}" >
</label><br>


		

<label>
  

<input type="text" name="utente"  id="utente" placeholder="Utente" pattern="[a-zA-Z\s]+" >
</label><br>



<label>
	
<input type="text" name="telefono" id="telefono" placeholder="Telefono"Telefono maxlength="10" pattern="[0-9]{9,10}">

</label><br>


<label>
	
<input type="text" name="indirizzo" id="indirizzo" placeholder="Indirizzo" pattern="[a-zA-Z\s]+" >

</label><br> 

<label>
	
<input type="text" name="civico" id="civico"placeholder="Civico"  size="1" style="width: 35px;" >

</label><br>


<label>
 

<input type="password" name="password" id="pass" placeholder="Password"  >
</label><br> 

<label>
	 
		<input type="password" name="confermapassword"  id="confermapassword" placeholder="Conferma password"  >
	
	</label><br>

	

<div id="error" style="margin-top: 50px;">
	<span class="error"><?php echo $erroreu ?></span>
	<span class="error"><?php echo $erroree ?></span>

</div>

<input type="submit" class="tasti" id="accedi" name="accedi" onclick ="return register();" value="Registrati" >
    


</form>
</div>