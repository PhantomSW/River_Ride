<?php
include('includes/bdd.php');

$q = 'UPDATE Utilisateur SET ban = 0 WHERE id_utilisateur = :id_utilisateur';
$req = $bdd->prepare($q);
$reponse = $req->execute([
	'id_utilisateur' => $_GET['id_utilisateur']
]);

if($reponse == 0){
	$msg = 'Erreur lors du déban en base de données.';
	header('location: admin_banned_users.php?type=danger&message=' . $msg);
	exit();
}

$msg = 'Compte débanni avec succès !';
header('location: admin_banned_users.php?type=success&message=' . $msg);
exit();


?>