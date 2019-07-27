<?php
	include("connessionedb.php");
	if(isset($_POST['invia'])) {
		header("Location: ../index.php?p=ordina");
	}
?>