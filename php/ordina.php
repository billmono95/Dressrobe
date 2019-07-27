
<div id="categoria">
 <h1>Categorie</h1>
<?php
		$query2 = "SELECT * FROM categoria ";
		
		$result2 = mysqli_query($db_server , $query2);
		while($row= mysqli_fetch_array($result2, MYSQLI_ASSOC)){
		
?> 
 <div id="categorieleft">
 	<a href="index.php?p=prodotti&id=<?php echo $row["IDCategoria"]; ?>">
  <img " src="immagini/<?php echo $row["Immagine"]?>" class="logoimm">
   <a href="index.php?p=prodotti&id=<?php echo $row["IDCategoria"]; ?>" class = "nomecategoria"> <?php echo $row['NomeCategoria'];?></a>
  
  
 
<br>
</a>
</div>

<?php
     } 
   
		
?> 


</div>