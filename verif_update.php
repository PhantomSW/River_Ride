<?php 

include('includes/bdd.php');

$q = 'UPDATE UTILISATEUR SET 
	pseudo = :username,
	email = :email,
	firstname = :firstname,
	name = :name,
	phone = :phone,
	address = :address,
	gender = :gender,
	age = :age
 	WHERE user_id = :user_id';

$req = $bdd->prepare($q);
$reponse = $req->execute([
	'username' => $_POST['username'],
	'email' => $_POST['email'], 
	'firstname' => $_POST['firstname'],
	'name' => $_POST['name'],
	'phone' => $_POST['phone'],
	'address' => $_POST['address'],
	'gender' => $_POST['gender'],
	'age' => $_POST['age'],
	'user_id' => $_GET['user_id']
]);


if($reponse == 0){
	$msg = 'Erreur lors de la mise à jour en base de données.';
	header('location: admin_utilisateurs.php?type=danger&message=' . $msg);
	exit();
}

$msg = 'Compte mis à jour avec succès !';
header('location: admin_utilisateurs.php?type=success&message=' . $msg);
exit();


?>




