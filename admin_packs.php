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
        <h1> Gestion des packs </h1>
		<?php include('includes/message.php'); ?>
        <?php include('includes/bdd.php');
		if(isset($_GET['order'])) {
			$order = $_GET['order'];
		} else {
			$order = 'id_pack';
		}
				$q = 'SELECT * FROM Pack ORDER BY '. $order;
				$req = $bdd->query($q);
				$results = $req->fetchAll(PDO::FETCH_ASSOC);
				?>
				<a class="mt-4 btn btn-sm btn-success" href="action_packs_create.php">Nouveau pack</a>
										
				<table class="table table-dark table-striped mt-2" style="max-width:1100px;">
						<tr>
							<th scope="col">ID<a href="?order=id_pack" style="text-decoration:none; color:white;">&nbsp;↓</a></th>
							<th scope="col">Nom<a href="?order=nom" style="text-decoration:none; color:white;">&nbsp;↓</a></th>
							<th scope="col">Actions</th>
						</tr>

						<?php
						foreach ($results as $user)  {
							echo '<tr>
									<td>' .$user['id_pack'] . '</td>
									<td>' .$user['nom'] . '</td>
									<td>
										<a class="btn btn-sm btn-secondary" href="action_packs_read.php?id_pack=' .$user['id_pack'] . '">Consulter</a>
										<a class="btn btn-sm btn-primary" href="action_packs_update.php?id_pack=' .$user['id_pack'] . '">Modifier</a>
										<a class="btn btn-sm btn-danger" href="action_packs_delete.php?id_pack=' .$user['id_pack'] . '">Supprimer</a>
									</td>
								</tr>';
						}
            echo '</table>';
            echo '</main>';
            include('includes/footer.php'); ?>
    </body>
</html>

