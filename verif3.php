<?php
session_start();
if($_POST['confirm'] != $_SESSION['verification']){
	$msg = 'Le code est incorrect.';
	header('location: email-check.php?type=danger&message=' . $msg);
	exit();
}

if($_POST['confirm'] == $_SESSION['verification']){

include('includes/bdd.php');

$q = 'INSERT INTO Utilisateur (pseudo, email, pwd, prenom, nom, tel, age, ban, reduc) VALUES (:username, :email, :password, :firstname, :name, :phone, :age, :ban, :reduc)';
$req = $bdd->prepare($q);
$reponse = $req->execute([
	'username' => $_SESSION['username'],
	'email' => $_SESSION['email'], 
	'password' => hash('sha256', $_SESSION['password']),
	'firstname' => $_SESSION['firstname'],
	'name' => $_SESSION['name'],
	'phone' => $_SESSION['phone'],
	'age' => $_SESSION['age'],
	'ban' => 0,
	'reduc' => 1
]);

if($reponse == 0){
	$msg = 'Erreur lors de l\'inscription en base de données.';
	header('location: inscription.php?type=danger&message=' . $msg);
	exit();
}

$msg = 'Compte créé avec succès !';
header('location: connexion.php?type=success&message=' . $msg);
exit();

}

?>