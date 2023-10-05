<?php
$title = 'Admnistration';
include('includes/head.php');
?>
<style>
    main {
        padding-left: 200px;
    }
    
</style>
<body class="color-mode">
    <?php 
    include('includes/header.php'); 
    if(!isset($_SESSION['admin'])){
        $msg = 'Vous n\'êtes pas identifié en tant qu\'administrateur.';
	    header('location: index.php?type=danger&message=' . $msg);
	    exit();
    }
    ?>
  
    <main class="admin_main">
        <h1> Gestion des logements </h1>
		<?php include('includes/message.php'); ?>
        <?php include('includes/bdd.php');
		if(isset($_GET['order'])) {
			$order = $_GET['order'];
		} else {
			$order = 'id_logement';
		}
				$q = 'SELECT * FROM Logement ORDER BY '. $order;
				$req = $bdd->query($q);
				$results = $req->fetchAll(PDO::FETCH_ASSOC);
				?>
				<a class="mt-4 btn btn-sm btn-success" href="action_logements_create.php">Nouveau logement</a>
										
				<table class="table table-dark table-striped mt-2" style="max-width:1100px;">
						<tr>
							<th scope="col">ID<a href="?order=id_logement" style="text-decoration:none; color:white;">&nbsp;↓</a></th>
							<th scope="col">Nom<a href="?order=nom" style="text-decoration:none; color:white;">&nbsp;↓</a></th>
							<th scope="col">Actions</th>
						</tr>

						<?php
						foreach ($results as $user)  {
							echo '<tr>
									<td>' .$user['id_logement'] . '</td>
									<td>' .$user['nom'] . '</td>
									<td>
										<a class="btn btn-sm btn-secondary" href="action_logements_read.php?id_logement=' .$user['id_logement'] . '">Consulter</a>
										<a class="btn btn-sm btn-primary" href="action_logements_update.php?id_logement=' .$user['id_logement'] . '">Modifier</a>
										<a class="btn btn-sm btn-danger" href="action_logements_delete.php?id_logement=' .$user['id_logement'] . '">Supprimer</a>
									</td>
								</tr>';
						}
            echo '</table>';
            echo '</main>';
            include('includes/footer.php'); ?>
    </body>
</html>

