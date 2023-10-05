<?php session_start(); 
if(!isset($_SESSION['admin'])){
    header('location: index.php');
    exit;
}
?>
<?php
$title = 'Mettre à jour';
include('includes/head.php');
?>
<style>
    main {
        padding-left: 100px;
    }
    
</style>
	<body class="color-mode">
		<?php include('includes/header.php'); ?>

		<main>
        <div class="container">
			<h1>Profil à mettre à jour :</h1>
			<?php include('includes/message.php'); ?>
            <?php
                include('includes/bdd.php');
            
                $q= 'SELECT * FROM Utilisateur WHERE id_utilisateur = :id_utilisateur';
                $req = $bdd->prepare($q);
                $req->execute([
                    'id_utilisateur' => $_GET['id_utilisateur']
                ]);
                $result = $req->fetch(PDO::FETCH_ASSOC);

                if($result){
                    echo '<form method="POST" action="verif_update.php?id_utilisateur='.$_GET['id_utilisateur'].'" class="rounded" style="background-color: #FFFAFA; max-width: 1300px;">
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Prénom :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="firstname" value="'.$result['prenom'].'" class="form-control" name="firstname"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>Nom :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="name" value="'.$result['nom'].'" class="form-control" name="name"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Pseudonyme :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="username" value="'.$result['pseudo'].'" class="form-control" name="username"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>Age :</h3>
                                <div class="form-outline mb-4">
                                    <input type="number" id="age" value="'.$result['age'].'" class="form-control" name="age"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>E-mail :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="email" value="'.$result['email'].'" class="form-control" name="email"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>Téléphone :</h3>
                                <div class="form-outline mb-4">
                                    <input type="number" id="phone" value="'.$result['tel'].'" class="form-control" name="phone"/>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                        <div class="text-center pt-1 mt-5 pb-1">
                            <input type="submit" value="Mettre à jour">
                        </div>
                        </div>
                        <a class="btn btn-sm btn-danger" href="admin_utilisateurs.php">Retour</a>
                        </form>';
                } else {
                    echo '<h2 style="color:red;">Impossible d\'afficher les informations</h2>';
                }
            ?>
            </div>
		</main>

		<?php include('includes/footer.php'); ?>
	</body>
</html>