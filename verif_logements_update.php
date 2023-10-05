<?php 
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

include('includes/bdd.php');

	$q = 'UPDATE Logement SET 
	nom = :nom,
	destination = :destination,
	place = :place,
	description = :description,
	statut = :statut 
	WHERE id_logement = :id_logement';

$req = $bdd->prepare($q);
$reponse = $req->execute([
	'nom' => $_POST['nom'],
	'destination' => $_POST['destination'], 
	'place' => $_POST['place'],
	'description' => $_POST['description'],
	'statut' => $_POST['statut'],
	'id_logement' => $_GET['id_logement']
]);



if($reponse == 0){
	$msg = 'Erreur lors de la mise à jour en base de données.';
	header('location: admin_logements.php?type=danger&message=' . $msg);
	exit();
}

$msg = 'Logement mis à jour avec succès !';
header('location: admin_logements.php?type=success&message=' . $msg);
exit();


?>




