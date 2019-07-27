<?php
session_start();


$db_hostname = 'localhost' ;
$db_username ='root' ;
$db_password ='' ;
$db_name ='dressrobe' ;

$db_server = mysqli_connect($db_hostname,$db_username,$db_password,$db_name)
or die("Impossibile connettersi".mysql_error());
 




?>