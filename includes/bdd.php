<?php
try{
	$bdd = new PDO('mysql:host=54.36.190.19;dbname=RIVER', 'user', 'wordpass', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch(Exception $e){
	die('Erreur PDO : ' . $e->getMessage());
}
?>