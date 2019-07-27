<?php
			if(isset($_GET['err'])){
				
	$errore="Username e password non corrispondono";
?>		
		
<?php		
    	}  else   $errore="";
         
?>

<nav class="menulogin" onmouseover="beginlogin();">
		<ul>
			<li><a href="index.php?p=login">Login</a></li><li><a href="index.php?p=signin">Registrati</a>
		</ul>
	</nav>
<div class="login">
	

 <h1 id="loginspacing" style="font-size: 25px;">Sono già utente Dressrobe</h1> 

<p>Inserisci il nome utente e la password per effettuare il login.</p>


<form name="login" action="php/loginproc.php" method="post">	

<label>
	
<input type="text" id="username" name="username" placeholder="Utente" >
</label> <br>
<label>
	
	<input type="password"  id="password" name="password" placeholder="Password">
</label> <br>
                                                            
<input type="submit" id="tastiaccedi" class="tasti" name="accedi" onclick="return validate();" value="Accedi">
<div id="errore" ></div>    
</form>

<span class="error" style="color: red"><?php echo $errore ?></span>
</div>





