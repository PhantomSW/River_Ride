<?php 

include('includes/bdd.php');

$q = 'UPDATE Prix SET 
	traversee = :traversee,
	etape = :etape,
	bagage = :bagage,
	logement = :logement,
	prem_achat = :prem_achat
 	WHERE id_prix = :id_prix';

$req = $bdd->prepare($q);
$reponse = $req->execute([
	'traversee' => $_POST['traversee'],
	'etape' => $_POST['etape'], 
	'bagage' => $_POST['bagage'],
	'logement' => $_POST['logement'],
	'prem_achat' => $_POST['prem_achat'],
	'id_prix' => 1
]);


if($reponse == 0){
	$msg = 'Erreur lors de la mise à jour en base de données.';
	header('location: admin_utilisateurs.php?type=danger&message=' . $msg);
	exit();
}

$msg = 'Prix mis à jour avec succès !';
header('location: admin_prix.php?type=success&message=' . $msg);
exit();


?>




