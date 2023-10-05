<?php
try{
	$bdd = new PDO('mysql:host=123.123.123.123;dbname=RIVER', 'username', 'password', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch(Exception $e){
	die('Erreur PDO : ' . $e->getMessage());
}
?>