<?php 
if( !isset($_POST['depart'])
|| !isset($_POST['etape'])
|| !isset($_POST['arrivee'])
|| empty($_POST['depart'])
|| empty($_POST['arrivee'])
){
	$msg = 'Vous devez remplir tous les champs.';
	header('location: reserver.php?type=warning&message=' . $msg);
	exit();
}

session_start();
$_SESSION['res_depart'] = $_POST['depart'];
$_SESSION['res_etape'] = $_POST['etape'];
$_SESSION['res_arrivee'] = $_POST['arrivee'];

header('location: reserver_2.php');
exit();

?>




