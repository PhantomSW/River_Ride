<?php 
session_start();
include('includes/bdd.php');

if( !isset($_POST['prenom'])
	|| !isset($_POST['nom'])
	|| !isset($_POST['tel'])
	|| !isset($_POST['age'])
	|| !isset($_POST['password'])
	|| !isset($_POST['pseudo'])
	|| empty($_POST['prenom'])
	|| empty($_POST['nom'])
	|| empty($_POST['tel'])
	|| empty($_POST['age'])
	|| empty($_POST['password'])
	|| empty($_POST['pseudo'])
){
		$msg = 'Vous devez remplir tous les champs.';
		header('location: user_profil.php?type=warning&message=' . $msg);
		exit();
}

if(strlen($_POST['tel']) < 10 || strlen($_POST['tel']) > 10){
	$msg = 'Indiquez un numéro de téléphone sous la forme 0611223344.';
	header('location: user_profil.php?type=info&message=' . $msg);
	exit();
}

if(strlen($_POST['age']) > 2){
	$msg = 'Donnez un âge correct.';
	header('location: user_profil.php?type=info&message=' . $msg);
	exit();
}

$q = 'SELECT id_utilisateur FROM Utilisateur WHERE email = :email AND pwd = :password';
$req = $bdd->prepare($q);
$req->execute([
	'email' => $_SESSION['client'],
	'password' => hash('sha256', $_POST['password'])
]);

$results = $req->fetchAll(PDO::FETCH_ASSOC);

if(!$results) {
	$msg = 'Le mot de passe est invalide.';
	header('location: user_profil.php?type=danger&message=' . $msg);
	exit();
} else {
	$q = 'UPDATE Utilisateur SET 
	pseudo = :pseudo,
	email = :email,
	prenom = :prenom,
	nom = :nom,
	tel = :tel,
	age = :age
 	WHERE id_utilisateur = :id_utilisateur';

$req = $bdd->prepare($q);
$reponse = $req->execute([
	'pseudo' => $_POST['pseudo'],
	'email' => $_POST['email'], 
	'prenom' => $_POST['prenom'],
	'nom' => $_POST['nom'],
	'tel' => $_POST['tel'],
	'age' => $_POST['age'],
	'id_utilisateur' => $_GET['id_utilisateur']
]);

	$_SESSION['client'] = $_POST['email'];
}


if($reponse == 0){
	$msg = 'Erreur lors de la mise à jour en base de données.';
	header('location: user_profil.php?type=danger&message=' . $msg);
	exit();
}

$msg = 'Profil mis à jour avec succès !';
header('location: user_profil.php?type=success&message=' . $msg);
exit();


?>




