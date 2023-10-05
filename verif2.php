<?php 

if( !isset($_POST['firstname'])
	|| !isset($_POST['name'])
	|| !isset($_POST['phone'])
	|| !isset($_POST['age'])
	|| empty($_POST['firstname'])
	|| empty($_POST['name'])
	|| empty($_POST['phone'])
	|| empty($_POST['age'])
){
		$msg = 'Vous devez remplir tous les champs.';
		header('location: inscription_2.php?type=warning&message=' . $msg);
		exit();
}

if(strlen($_POST['phone']) < 10 || strlen($_POST['phone']) > 10){
	$msg = 'Indiquez un numéro de téléphone sous la forme 0611223344.';
	header('location: inscription_2.php?type=info&message=' . $msg);
	exit();
}

if(strlen($_POST['age']) > 2){
	$msg = 'Donnez un âge correct.';
	header('location: inscription_2.php?type=info&message=' . $msg);
	exit();
}

include('includes/bdd.php');

$q = 'SELECT id_utilisateur FROM Utilisateur WHERE tel = :tel';
$req = $bdd->prepare($q);
$req->execute([
				'tel' => $_POST['phone']
]);
$reponse = $req->fetch();
if ($reponse != false){
	$msg = 'Le numéro de téléphone est déjà utilisé.';
	header('location: inscription_2.php?type=danger&message=' . $msg);
	exit();
}

session_start();
$_SESSION['firstname'] = $_POST['firstname'];
$_SESSION['name'] = $_POST['name'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['address'] = $_POST['address'];
$_SESSION['age'] = $_POST['age'];
header('location: email-confirm.php');
exit();

?>




