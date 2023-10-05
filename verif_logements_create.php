<?php 

include('includes/bdd.php');

if(strlen($_POST['description']) > 200) {
	$msg = 'La description entrée ne doit pas dépasser 255 caractères.';
		header('location: admin_logements.php?type=danger&message=' . $msg);
		exit();
}

if(($_POST['statut']) != 'Ferme' && ($_POST['statut']) != 'Ouvert') {
	$msg = 'Veuillez préciser si le logement est fermé ou ouvert.';
		header('location: admin_logements.php?type=danger&message=' . $msg);
		exit();
}

if((strlen($_POST['statut'])) > 6) {
	$msg = 'Veuillez entrer un statut valide.';
		header('location: admin_logements.php?type=danger&message=' . $msg);
		exit();
}

$q = 'INSERT INTO Logement (nom, place, destination, statut, description) VALUES (:nom, :place, :destination, :statut, :description)';
$req = $bdd->prepare($q);
$reponse = $req->execute([
	'nom' => $_POST['nom'],
	'place' => $_POST['place'], 
	'destination' => $_POST['destination'],
	'statut' => $_POST['statut'],
	'description' => $_POST['description']
]);


if($reponse == 0){
	$msg = 'Erreur lors de la création en base de données.';
	header('location: admin_logements.php?type=danger&message=' . $msg);
	exit();
}

$msg = 'Logement ajouté avec succès !';
header('location: admin_logements.php?type=success&message=' . $msg);
exit();

?>




