<?php 
session_start();
include('includes/bdd.php');

if( !isset($_POST['password'])
	|| !isset($_POST['new'])
	|| !isset($_POST['confirm'])
	|| empty($_POST['password'])
	|| empty($_POST['new'])
	|| empty($_POST['confirm'])
){
		$msg = 'Vous devez remplir tous les champs.';
		header('location: user_change_pwd.php?type=warning&message=' . $msg);
		exit();
}

if (strlen($_POST['new']) < 6) {
	$msg = 'Le nouveau mot de passe ne fait pas 6 caractères ou plus.';
	header('location: user_change_pwd.php?type=info&message=' . $msg);
	exit();
}

if($_POST['new'] != $_POST['confirm']) {
	$msg = 'Le nouveau mot de passe n\'a pas été correctement réécrit.';
	header('location: user_change_pwd.php?type=info&message=' . $msg);
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
	header('location: user_change_pwd.php?type=danger&message=' . $msg);
	exit();
} else {
	$q = 'UPDATE Utilisateur SET 
	pwd = :password
 	WHERE id_utilisateur = :id_utilisateur';

$req = $bdd->prepare($q);
$reponse = $req->execute([
	'password' => hash('sha256', $_POST['new']),
	'id_utilisateur' => $_GET['id_utilisateur']
]);
}


if($reponse == 0){
	$msg = 'Erreur lors de la mise à jour en base de données.';
	header('location: user_change_pwd.php?type=danger&message=' . $msg);
	exit();
}

$msg = 'Mot de passe mis à jour avec succès !';
header('location: user_change_pwd.php?type=success&message=' . $msg);
exit();


?>




