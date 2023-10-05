<?php session_start(); 
if(!isset($_SESSION['admin'])){
    header('location: index.php');
    exit;
}
?>
<?php
$title = 'Logement';
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
			<h1>Mettre à jour le logement :</h1>
			<?php include('includes/message.php'); ?>
            <?php
                include('includes/bdd.php');
            
                $q= 'SELECT * FROM Logement WHERE id_logement = :id_logement';
                $req = $bdd->prepare($q);
                $req->execute([
                    'id_logement' => $_GET['id_logement']
                ]);
                $result = $req->fetch(PDO::FETCH_ASSOC);

                if($result){
                    echo '<form enctype="multipart/form-data" method="POST" action="verif_logements_update.php?id_logement='.$_GET['id_logement'].'" class="rounded" style="background-color: #FFFAFA; max-width: 1300px;">';
                    echo '            
                    <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Nom du logement :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="nom" value="'.$result['nom'].'" class="form-control" name="nom"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Nom du point de passage :</h3>
                                <div class="form-outline mb-4">
                                    <select id="destination" class="form-control" name="destination">
                                        <option value="Baie Tranquille">Baie Tranquille</option>
                                        <option value="Rocher Emeraude">Rocher Emeraude</option>
                                        <option value="Anse Sereine">Anse Sereine</option>
                                        <option value="Goulet Aventurier">Goulet Aventurier</option>
                                        <option value="Îlot Paisible">Îlot Paisible</option>
                                        <option value="Crique Mystique">Crique Mystique</option>
                                        <option value="Havre Ecume">Havre Ecume</option>
                                        <option value="Passage Aquatique">Passage Aquatique</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Nombre de places :</h3>
                                <div class="form-outline mb-4">
                                    <input type="number" id="place" value="'.$result['place'].'" class="form-control" name="place"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>Statut :</h3>
                                <div class="form-outline mb-4">
                                    <select id="statut" class="form-control" name="statut">
                                        <option value="Ouvert">Ouvert</option>
                                        <option value="Ferme">Fermé</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <h3>Description :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="description" value="'.$result['description'].'" class="form-control" name="description"/>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                        <div class="text-center pt-1 mt-5 pb-1">
                            <input type="submit" value="Mettre à jour">
                        </div>
                        </div>
                        <a class="btn btn-sm btn-danger" href="admin_logements.php">Retour</a>
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