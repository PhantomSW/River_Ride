<?php session_start(); 
if(!isset($_SESSION['admin'])){
    header('location: index.php');
    exit;
}
?>
<?php
$title = 'Pack';
include('includes/head.php');
?>
<style>
    main {
        padding-left: 100px;
    }
    h3 {
        color:black;
    }
    
</style>
	<body class="color-mode">
		<?php include('includes/header.php'); ?>

		<main>
        <div class="container">
			<h1>Ajouter un pack :</h1>
			<?php include('includes/message.php'); ?>
            <?php include('includes/bdd.php'); ?>
            
                <form enctype="multipart/form-data" method="POST" action="verif_packs_create.php" class="rounded" style="background-color: #FFFAFA; max-width: 1300px;">
                        <div class="row mb-3">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4">
                                <h3>Nom du pack :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="nom" class="form-control" name="nom"/>
                                </div>
                                <div class="form-outline mb-4">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Départ :</h3>
                                <div class="form-outline mb-4">
                                    <select id="depart" class="form-control" name="depart">
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
                            <div class="col-lg-4">
                                <h3>Etape :</h3>
                                <div class="form-outline mb-4">
                                    <select id="etape" class="form-control" name="etape">
                                        <option value="">Aucune</option>
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
                            <div class="col-lg-4">
                                <h3>Arrivée :</h3>
                                <div class="form-outline mb-4">
                                    <select id="arrivee" class="form-control" name="arrivee">
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
                                <h3>Prix :</h3>
                                <div class="form-outline mb-4">
                                    <input type="number" id="prix" class="form-control" name="prix"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>Promotion :</h3>
                                <div class="form-outline mb-4">
                                    <input type="number" id="promo" class="form-control" name="promo"/>
                                    <small id="promoHelp" class="form-text text-muted">En pourcent</small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>Logement :</h3>
                                <div class="form-outline mb-4">
                                    <?php echo '<select id="logement" class="form-control" name="logement">';
                                        $q = 'SELECT nom FROM Logement';
                                        $req = $bdd->query($q);
                                        $results = $req->fetchAll(PDO::FETCH_ASSOC);
                                        
                                        foreach($results as $maison) {
                                        echo '<option value="'.$maison['nom'].'">'.$maison['nom'].'</option>';
                                        }
                                    echo '</select>;' ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Nombre personnes :</h3>
                                <div class="form-outline mb-4">
                                    <input type="number" id="personne" class="form-control" name="personne"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>Bagages :</h3>
                                <div class="form-outline mb-4">
                                    <input type="number" id="bagage" class="form-control" name="bagage"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>Dates de départ :</h3>
                                <div class="form-outline mb-4">
                                    <input type="date" id="date" class="form-control" name="date"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                        <div class="text-center pt-1 mt-5 pb-1">
                            <input type="submit" value="Créer">
                        </div>
                        </div>
                        <a class="btn btn-sm btn-danger" href="admin_packs.php">Retour</a>
                    </form>
            </div>
		</main>

		<?php include('includes/footer.php'); ?>
	</body>
</html>