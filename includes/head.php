<?php 
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
 } 
 ?>
<!DOCTYPE html>
<html>
	<head>
		<?php 
		if(isset($_GET['dark']) && $_SESSION['dark'] != 1) {
			$_SESSION['dark'] = 1;
		} else {
			if(isset($_GET['dark']) && $_SESSION['dark'] == 1) $_SESSION['dark'] = 2;
		}
		// Pour les non-connectés
		if(!isset($_SESSION['dark'])) {
			$_SESSION['dark'] = 3;
		}
		?>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?= $title ?></title>
		<link rel="shortcut icon" href="images/logo-simple-rond.png" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="includes/script.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/dark.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		<?php 
		if($_SESSION['dark'] == 1) {
			echo '<link rel="stylesheet" type="text/css" href="css/dark.css">';
		} else {
			echo '<link rel="stylesheet" type="text/css" href="css/light.css">';
		}
		?>
	</head>