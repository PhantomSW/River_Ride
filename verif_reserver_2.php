<?php 
if( !isset($_POST['nom'])
|| !isset($_POST['prenom'])
|| !isset($_POST['date'])
|| !isset($_POST['bagages'])
|| !isset($_POST['personne'])
|| empty($_POST['nom'])
|| empty($_POST['prenom'])
|| empty($_POST['date'])
|| empty($_POST['bagages'])
|| empty($_POST['personne'])
){
	$msg = 'Vous devez remplir tous les champs.';
	header('location: reserver_2.php?type=warning&message=' . $msg);
	exit();
}

if ($_POST['bagages'] < 0) {
	$msg = 'Les valeurs négatives de bagages n\'existent pas.';
	header('location: reserver_2.php?type=danger&message=' . $msg);
	exit();
}

session_start();
$_SESSION['res_nom'] = $_POST['nom'];
$_SESSION['res_prenom'] = $_POST['prenom'];
$_SESSION['res_date'] = $_POST['date'];
$_SESSION['res_bagages'] = $_POST['bagages'];
$_SESSION['res_logement'] = $_POST['logement'];
$_SESSION['res_personne'] = $_POST['personne'];

header('location: commande.php');
exit();

?>




