<div id="nomeprodotto">
	<?php
		if(!isset($_SESSION['idp'])){
			$_SESSION['idp']=$_GET['id'];
		} else {
			unset($_SESSION['idp']);
			$_SESSION['idp']=$_GET['id'];
		}
		$id=$_SESSION['idp'];
		$risultato=mysqli_query($db_server, "SELECT * FROM categoria WHERE IDCategoria='$id'");
		$riga=mysqli_fetch_array($risultato, MYSQLI_ASSOC);
	?>

<h1><?php echo $riga['NomeCategoria']?></h1>


	<?php
		$results=mysqli_query($db_server, "SELECT DISTINCT IDProdotto,Nome, Descrizione,ProdottoImmagine,Prezzo FROM prodotti WHERE Categoria='$id'  ");
		while($categorie=mysqli_fetch_array($results, MYSQLI_ASSOC)) {
			
	?>

        <div class="prodotto">

    <img " src="immagini/<?php echo $categorie["ProdottoImmagine"]?>" class="logoimm">
	<a><?php echo $categorie['Nome']?></a>
    <a><?php echo $categorie['Descrizione']?></a>
    <a><?php echo $categorie['Prezzo']?></a>
    <?php echo "€"?>
    </div>
  
<a href="index.php?p=acquistoprodotti&nome=<?php echo str_replace(" ", "_", $categorie['Nome'])?>&prezzo=<?php echo $categorie['Prezzo']?>&idp=<?php echo $categorie['IDProdotto']?>" class = "formrimuovi"><button class="tasti" style="width: 120px; padding: 4px;"> acquista</button></a>
	<?php
		} 
?>
</div>


