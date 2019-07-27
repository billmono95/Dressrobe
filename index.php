<!DOCTYPE html>

<html lang="it">
<head>
	<title>Dressrobe</title>
	<link rel="stylesheet" type="text/css" href="css/stile.css">
	<link rel="icon" type="image/png" href="immagini/logo.png">
	
	
	
	
    <script type="text/javascript"   src="javascript/validate.js"></script>
     <script type="text/javascript"   src="javascript/animazioni.js"></script>
     

	<meta charset="utf-8">

</head>
<body  onclick="chiama();">

<header>
	<div id="titolo">
  <a  href="index.php?p=home2"><h1>Dressrobe</h1></a>

 <?php
		include('php/database.php');
		if (isset($_SESSION['loggato'])){
?> 
     <div id = "accesso">
    
       <?php
    
     if (!isset($_SESSION['numero'])){
	 ?>
	 <a  href="index.php?p=home3" class='carrello' onmouseover="mostra_carrello();" >carrello[0]</a>
	 <?php
	}elseif(isset($_SESSION['numero'])){
	?>
	<a  href="index.php?p=home3" class='carrello' onmouseover="mostra_carrello();" >carrello[<?php echo $_SESSION['numero'];?>]</a>
	 <?php
	}
	?>
        <a ><?php echo $_SESSION['utente'];?></a>
<?php
    
     if (empty($_SESSION['numero'])){
?>
 <div id="preview_acquisti">
	<p>carrello vuoto</p>
	

	 </div>

<?php
}else if(!empty($_SESSION['numero'])){

?>	 <div id="preview_acquisti">
	 	<?php

$utente = $_SESSION['utente'];
$idprodotto = $_SESSION['IDProd'];

		$query = "SELECT * FROM carrello inner join Prodotti on IDProdotto = Prodotto WHERE Account = '".$utente."' ";
		
		
		$result = mysqli_query($db_server , $query);
		while($row= mysqli_fetch_array($result, MYSQLI_ASSOC)){
	
	 $query2 = "SELECT Account,Prodotto FROM carrello inner join Prodotti on IDProdotto = Prodotto WHERE Account = '$utente'  AND Prodotto ='$idprodotto' " ;
                        $result2 = mysqli_query($db_server , $query2); 
                           $numero = mysqli_num_rows($result2);	
?>    





 <div id="piccolodiv" >
 	
	<img " src="immagini/<?php echo $row["ProdottoImmagine"]?>" class="immaginecarrellino">
	
   
    <a><?php echo $row['Nome']?></a>
    <a><?php echo $row['Prezzo']?><?php echo "€"?></a>
    
   
  </div>
<?php
     }

?>


	 </div>
<?php
	} 
?>
</div>
<?php	
}else {
?>

<div id = "accesso">

<a  href="index.php?p=home3" class='carrello'>carrello</a>
<a  href="index.php?p=login">Login</a>
</div>
<?php
	} 
?>

 
</div>
 </header>   

			
<nav id="menu">
	
<ul>
				<?php
		
					if(isset($_SESSION['loggato']) &&($_SESSION['admin'] == 1)) {
						
				?>
						<li><a href="index.php?p=home2">Home</a></li><li><a href="index.php?p=ordinieffettuati">I miei ordini</a></li><li><a href="index.php?p=pannelloadmin">Pannello amministrativo</a></li><li><a href="index.php?p=account">Account</a></li><li><a href="index.php?p=contatti">Contatti</a></li><li><a href="index.php?p=logout">Logout</a></li>
				<?php
					} elseif(isset($_SESSION['loggato'])&&($_SESSION['admin'] == 0)) {
						
				?>
						<li><a href="index.php?p=home2">Home</a></li><li><a href="index.php?p=ordinieffettuati">I miei ordini</a></li><li><a href="index.php?p=account">Account</a></li><li><a href="index.php?p=contatti">Contatti</a></li><li><a href="index.php?p=logout">Logout</a></li>
				<?php
					}else { 
				?>	

                        <li><a href="index.php?p=home2">Home</a></li><li><a href="index.php?p=ordinieffettuati">I miei ordini</a></li><li><a href="index.php?p=account">Account</a></li><li><a href="index.php?p=contatti">Contatti</a></li>

				<?php
					} 
				?>	

				</ul>

</nav>




<div id="content">
	<?php 
	      if (isset($_GET['p']))
	      	{
	      		$pagina = $_GET['p'];
		include "php/".$pagina.".php";
					}
				else
					{
					$pagina = "home2";
					include "php/".$pagina.".php";
					}
			?>

</div>



<div>
<footer>
	
<p>All rights riserved.<br>Progettazione Web 2018-19 <a href="index.php?p=descrizione"> Info progetto</a></p>

</footer>
</div>
	
</body>
</html>
