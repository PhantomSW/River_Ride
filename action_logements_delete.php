<?php
include('includes/bdd.php');

$q = 'DELETE FROM Logement WHERE id_logement = :id_logement';
$req = $bdd->prepare($q);
$reponse = $req->execute([
	'id_logement' => $_GET['id_logement']
]);

if($reponse == 0){
	$msg = 'Erreur lors de la suppression en base de données.';
	header('location: admin_logements.php?type=danger&message=' . $msg);
	exit();
}

$msg = 'Intervenant supprimé avec succès !';
header('location: admin_logements.php?type=success&message=' . $msg);
exit();

?>