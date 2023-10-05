<?php 

function writeLogLine($success, $admin){
	$log = fopen('logs/log_admin.txt', 'a+');
	$line = date('Y/m/d - H:i:s') . ' - Tentative de connexion ' . ($success ? 'réussie' : 'échouée') . ' de : ' . $admin . "\n";
	fputs($log, $line);
	fclose($log);
}

if(empty($_POST['admin']) || empty($_POST['pwd'])){
		$msg = 'Vous devez remplir les 2 champs.';
		header('location: admin_connexion.php?type=warning&message=' . $msg);
		exit();
}

if($_POST['admin'] == 'Toi&Moi' && $_POST['pwd'] == 'Etoile0710'){
	writeLogLine(true, $_POST['admin']);
	session_start();
	$_SESSION['admin'] = $_POST['admin'];
	header('location: admin_utilisateurs.php');
	exit();
} else {
	if ($_POST['admin'] == 'azerty' && $_POST['pwd'] != 'azerty') {
		$msg = 'Mot de passe incorrect.';
		header('location: admin_connexion.php?type=danger&message=' . $msg);
		exit();
	} else {
		$msg = 'Compte inexistant.';
		header('location: admin_connexion.php?type=danger&message=' . $msg);
		exit();
	}
}
?>