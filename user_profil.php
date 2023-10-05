<?php
$title = 'Profil';
include('includes/head.php');
?>
	<body class="color-mode">
		<?php include('includes/header.php'); ?>

		<main>
        <div class="container">
			<h1>Votre profil :</h1>
			<?php include('includes/message.php'); ?>

            <?php include('includes/bdd.php');

                $q= 'SELECT * FROM Utilisateur WHERE email = :client';
                $req = $bdd->prepare($q);
                $req->execute([
                    'client' => $_SESSION['client']
                ]);
                $result = $req->fetch(PDO::FETCH_ASSOC);

                if($result){
                    echo '<form enctype="multipart/form-data" method="POST" action="verif_user_update.php?id_utilisateur='.$result['id_utilisateur'].'" class="rounded" style="background-color: #FFFAFA; max-width: 1300px; margin-bottom:50px;">';
                    echo '
                     
                    <div class="row mb-3">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-4">
                                <h3>Prénom :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="prenom" value="'.$result['prenom'].'" class="form-control" name="prenom"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>Nom :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="nom" value="'.$result['nom'].'" class="form-control" name="nom"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-4">
                                <h3>Pseudo :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="pseudo" value="'.$result['pseudo'].'" class="form-control" name="pseudo"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>E-mail :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="email" value="'.$result['email'].'" class="form-control" name="email"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-4">
                                <h3>Age :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="age" value="'.$result['age'].'" class="form-control" name="age"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>Téléphone :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="tel" value="'.$result['tel'].'" class="form-control" name="tel"/>
                                </div>
                            </div>
                        </div>

                        <div class="text-center row mb-3">
                            <div class="col-lg-4"></div>
                                <div class="pt-1 mt-2 pb-1 col-lg-4">
                                    <h3 style="font-size: 20px;">Confirmez votre mot de passe</h3>
                                    <input type="password" id="password" class="form-control" name="password"/><br>
                                    <input type="submit" value="Mettre à jour">
                                </div>
                        </div>
                        <a class="btn btn-sm btn-danger" href="user_change_pwd.php?id_utilisateur=' .$result['id_utilisateur'] . '">Changer le mot de passe</a>
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