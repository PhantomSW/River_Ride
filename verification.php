<?php 

function writeLogLine($success, $email){
	$log = fopen('logs/log.txt', 'a+');
	$line = date('Y/m/d - H:i:s') . ' - Tentative de connexion ' . ($success ? 'réussie' : 'échouée') . ' de : ' . $email . "\n";
	fputs($log, $line);
	fclose($log);
}

if(isset($_POST['email']) && !empty($_POST['email'])){
	setcookie('email', $_POST['email'], time() + 24 * 3600);
}

if( !isset($_POST['email']) 
	|| !isset($_POST['pwd'])
	|| empty($_POST['email'])
	|| empty($_POST['pwd'])
){
		$msg = 'Vous devez remplir les 2 champs.';
		header('location: connexion.php?type=warning&message=' . $msg);
		exit();
}

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	$msg = 'Email invalide.';
	header('location: connexion.php?type=danger&message=' . $msg);
	exit();
}

include('includes/bdd.php');
$q = 'SELECT id_utilisateur FROM Utilisateur WHERE email = :email AND pwd = :password';
$req = $bdd->prepare($q);
$req->execute([
	'email' => $_POST['email'],
	'password' => hash('sha256', $_POST['pwd'])
]);

$results = $req->fetchAll(PDO::FETCH_ASSOC);

if(!$results) {
	$msg = 'Mot de passe ou identifiant incorrect.';
	header('location: connexion.php?type=danger&message=' . $msg);
	exit();
} else {
	session_start();
	$_SESSION['client'] = $_POST['email'];

	$a = 'SELECT * FROM Utilisateur WHERE email = :email';
	$requ = $bdd->prepare($a);
    $requ->execute([
        'email' => $_SESSION['client']
    ]);
    $res = $requ->fetch(PDO::FETCH_ASSOC);

	$_SESSION['id_utilisateur'] = $res['id_utilisateur'];
	writeLogLine(true, $_POST['email']);
	header('location: index.php');
	exit();
}

?>