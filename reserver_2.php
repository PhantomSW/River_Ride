<?php
$title = 'Réserver';
include('includes/head.php');
?>
<style>
    h3 {
        color:black;
    }
    
</style>
	<body class="color-mode">
		<?php include('includes/header.php'); ?>

		<main>
        <div class="container">
			<h1>Réservez votre itinéraire sur mesure !</h1>
            <p> Ici vous pouvez conféctionner votre propre itinéraire sur mesure.<br>
            Des passages aux logements, façonnez votre virée solo ou familiale !</p>
			<?php include('includes/message.php'); ?>
            

                <form enctype="multipart/form-data" method="POST" action="verif_reserver_2.php" class="rounded" style="border: 0px; max-width: 1300px;">
                        
                        

                        <div class="row mb-3">
                            <div class="col-lg-8">
                                <h2 style="text-decoration:underline;">Les informations :</h2>
                                <p>Quelques informations supplémentaires nécessaire pour votre réservation  !<br>
                                Mais ne vous inquiétez pas, chaque data est conservée et non partagée.</p>
                            </div>
                        </div>

                        <div class="row mb-4">
                            
                            <div class="col-lg-4">
                                <h3>Nom :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="nom" class="form-control" name="nom"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>Prénom :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="prenom" class="form-control" name="prenom"/>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-lg-4">
                                <h3>Dates :</h3>
                                <p>Quelles sont vos dates ?</p>
                                <div class="form-outline mb-4">
                                    <input type="date" id="date" class="form-control" name="date"/>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-lg-4">
                                <h3>Nombre personnes :</h3>
                                <p>Combien serez-vous ?</p>
                                <div class="form-outline mb-4">
                                    <input type="number" id="personne" class="form-control" name="personne"/>
                                </div>
                            </div>
                        </div>

                        <?php if((strlen($_SESSION['res_etape'])) > 2) {
                        echo '
                        <div class="row mb-4">
                            <div class="col-lg-4">
                                <h3>Logement :</h3>
                                <p>Souhaitez vous faire une pause d\'une nuit ?</p>
                                <div class="form-outline mb-4">
                                    <select id="logement" class="form-control" name="logement">';
                                        include('includes/bdd.php');
                                        $q = 'SELECT nom FROM Logement';
                                        $req = $bdd->query($q);
                                        $results = $req->fetchAll(PDO::FETCH_ASSOC);
                                        
                                        foreach($results as $maison) {
                                        echo '<option value="'.$maison['nom'].'">'.$maison['nom'].'</option>';
                                        }
                                    echo '</select>
                                </div>
                            </div>
                        </div>';
                        } else {
                            echo '<i><h3 style="color:grey; padding-bottom:30px;">Logement indisponible sans étape séléctionnée.</h3></i>';
                        }
                        
                        ?>

                        <div class="row mb-4">
                            <div class="col-lg-4">
                                <h3>Bagages :</h3>
                                <p>Des bagages additionnelles ?</p>
                                <div class="form-outline mb-4">
                                    <input type="number" id="bagages" class="form-control" name="bagages"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="text-center pt-1 mt-5 pb-1">
                                <input type="submit" value="Passer la commande">
                            </div>
                        </div>

                        <a class="btn btn-sm btn-danger" href="reserver.php">Revenir en arrière</a>
                    </form>
            </div>
		</main>

		<?php include('includes/footer.php'); ?>
	</body>
</html>