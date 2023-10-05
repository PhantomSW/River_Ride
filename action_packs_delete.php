<?php
include('includes/bdd.php');

$q = 'DELETE FROM Pack WHERE id_pack = :id_pack';
$req = $bdd->prepare($q);
$reponse = $req->execute([
	'id_pack' => $_GET['id_pack']
]);

if($reponse == 0){
	$msg = 'Erreur lors de la suppression en base de données.';
	header('location: admin_packs.php?type=danger&message=' . $msg);
	exit();
}

$msg = 'Intervenant supprimé avec succès !';
header('location: admin_packs.php?type=success&message=' . $msg);
exit();

?>