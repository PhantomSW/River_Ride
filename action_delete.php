<?php
include('includes/bdd.php');

$q = 'DELETE FROM Utilisateur WHERE id_utilisateur = :id_utilisateur';
$req = $bdd->prepare($q);
$reponse = $req->execute([
	'id_utilisateur' => $_GET['id_utilisateur']
]);

if($reponse == 0){
	$msg = 'Erreur lors de la suppression en base de données.';
	header('location: admin_utilisateurs.php?type=danger&message=' . $msg);
	exit();
}

$msg = 'Compte supprimé avec succès !';
header('location: admin_utilisateurs.php?type=success&message=' . $msg);
exit();

?>