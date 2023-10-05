<?php 

if(isset($_POST['email']) && !empty($_POST['email'])){
	setcookie('email', $_POST['email'], time() + 24 * 3600);
}

if( !isset($_POST['username']) 
	|| !isset($_POST['email'])
	|| !isset($_POST['password'])
	|| !isset($_POST['confirm-password'])
	|| empty($_POST['username'])
	|| empty($_POST['email'])
	|| empty($_POST['password'])
	|| empty($_POST['confirm-password'])
){
		$msg = 'Vous devez remplir tous les champs.';
		header('location: inscription.php?type=warning&message=' . $msg);
		exit();
}

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	$msg = 'Email invalide.';
	header('location: inscription.php?type=danger&message=' . $msg);
	exit();
}

if($_POST['password'] != $_POST['confirm-password']){
	$msg = 'Les mots de passe ne correspondent pas.';
	header('location: inscription.php?type=danger&message=' . $msg);
	exit();
}

if(strlen($_POST['password']) < 6){
	$msg = 'Le mot de passe doit contenir au minimum 6 caractères.';
	header('location: inscription.php?type=warning&message=' . $msg);
	exit();

}

include('includes/bdd.php');

session_start();
$_SESSION['username'] = $_POST['username'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['password'] = $_POST['password'];	
header('location: inscription_2.php');
exit();

?>




