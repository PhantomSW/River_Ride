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
        <h1> Gestion des utilisateurs </h1>
		<?php include('includes/message.php'); ?>
        <?php include('includes/bdd.php'); 
				if(isset($_GET['order'])) {
					$order = $_GET['order'];
				} else {
					$order = 'id_utilisateur';
				}
				$q = 'SELECT * FROM Utilisateur WHERE ban = 0 ORDER BY '. $order;
				$req = $bdd->query($q);
				$results = $req->fetchAll(PDO::FETCH_ASSOC);
				?>
				
				<input type="text" class="rounded" style="border:none; height:35px; width: 300px;" id="ajaxInput" oninput="search()" placeholder=" Rechercher un pseudo">
				
				<div id="tab">
				<table class="table table-dark table-striped mt-4" style="max-width:1100px;">
						<tr>
							<th scope="col">ID<a href="?order=id_utilisateur" style="text-decoration:none; color:white;">&nbsp;↓</a></th>
							<th scope="col">Pseudo<a href="?order=pseudo" style="text-decoration:none; color:white;">&nbsp;↓</a></th></th>
							<th scope="col">Email<a href="?order=email" style="text-decoration:none; color:white;">&nbsp;↓</a></th></th>
							<th scope="col">Actions</th>
						</tr>

						<?php
						foreach ($results as $user)  {
							echo '<tr>
									<td>' .$user['id_utilisateur'] . '</td>
									<td>' .$user['pseudo'] . '</td>
									<td>' .$user['email'] . '</td>
									<td>
										<a class="btn btn-sm btn-secondary" href="action_read.php?id_utilisateur=' .$user['id_utilisateur'] . '">Consulter</a>
										<a class="btn btn-sm btn-primary" href="action_update.php?id_utilisateur=' .$user['id_utilisateur'] . '">Modifier</a>
                    					<a class="btn btn-sm btn-warning" href="action_ban.php?id_utilisateur=' .$user['id_utilisateur'] . '">Bannir</a>
										<a class="btn btn-sm btn-danger" href="action_delete.php?id_utilisateur=' .$user['id_utilisateur'] . '">Supprimer</a>
									</td>
								</tr>';
						}
            echo '</table>';
			echo '</div>';
            echo '</main>';
            include('includes/footer.php'); ?>
    </body>
</html>

