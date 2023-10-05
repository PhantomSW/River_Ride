<?php 
if (!isset($_POST['depart'])) {
	$msg = 'Veuillez renseigner un point de départ.';
	header('location: admin_logements.php?type=danger&message=' . $msg);
	exit();
}
if (!isset($_POST['arrivee'])) {
	$msg = 'Veuillez renseigner un point d\'arrivée.';
	header('location: admin_logements.php?type=danger&message=' . $msg);
	exit();
}


include('includes/bdd.php');

$q = 'INSERT INTO Pack (nom, destination_1, destination_2, destination_3, prix, promotion, logement, bagage, personne, date) VALUES (:nom, :destination_1, :destination_2, :destination_3, :prix, :promotion, :logement, :bagage, :personne, :date)';
$req = $bdd->prepare($q);
$reponse = $req->execute([
	'nom' => $_POST['nom'],
	'destination_1' => $_POST['depart'], 
	'destination_2' => $_POST['etape'],
	'destination_3' => $_POST['arrivee'],
	'promotion' => $_POST['promo'],
	'logement' => $_POST['logement'],
	'prix' => $_POST['prix'],
	'bagage' => $_POST['bagage'],
	'personne' => $_POST['personne'],
	'date' => $_POST['date']
]);


if($reponse == 0){
	$msg = 'Erreur lors de la création en base de données.';
	header('location: admin_logements.php?type=danger&message=' . $msg);
	exit();
}

$msg = 'Pack ajouté avec succès !';
header('location: admin_packs.php?type=success&message=' . $msg);
exit();

?>




