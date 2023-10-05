<?php
$title = 'Changement de mot de passe';
include('includes/head.php');
?>
<style>
    h3 {
        font-size: 25px;
    }
</style>
	<body class="color-mode">
		<?php include('includes/header.php'); ?>

		<main>
        <div class="container">
			<h1>Modifier votre mot de passe :</h1>
			<?php include('includes/message.php'); ?>
            <?php
                include('includes/bdd.php');
            
                $q= 'SELECT * FROM Utilisateur WHERE email = :client';
                $req = $bdd->prepare($q);
                $req->execute([
                    'client' => $_SESSION['client']
                ]);
                $result = $req->fetch(PDO::FETCH_ASSOC);

                if($result){
                    echo '<form enctype="multipart/form-data" method="POST" action="verif_user_pwd.php?id_utilisateur='.$result['id_utilisateur'].'" class="rounded" style="background-color: #FFFAFA; max-width: 1000px; margin-bottom:50px;">';
                   echo '            
                        <div class="row mb-3">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <h3>Mot de passe :</h3>
                                <div class="form-outline mb-4">
                                    <input type="password" id="password" class="form-control" name="password"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <h3>Nouveau mot de passe :</h3>
                                <div class="form-outline mb-4">
                                    <input type="password" id="new" class="form-control" name="new"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <h3>Confirmez le nouveau mot de passe :</h3>
                                <div class="form-outline mb-4">
                                    <input type="password" id="confirm" class="form-control" name="confirm"/>
                                </div>
                            </div>
                        </div>

                        <div class="text-center row mb-3">
                            <div class="col-lg-4"></div>
                                <div class="pt-1 mt-2 pb-1 col-lg-4">
                                    <input type="submit" value="Mettre à jour">
                                </div>
                        </div>
                        <a class="btn btn-sm btn-danger" href="user_profil.php?id_utilisateur=' .$result['id_utilisateur'] . '">Retour</a>
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