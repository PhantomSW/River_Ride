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
    h3 {
        color:black;
    }
    
</style>
	<body class="color-mode">
		<?php include('includes/header.php'); ?>

		<main>
        <div class="container">
			<h1>Ajouter un Logement :</h1>
			<?php include('includes/message.php'); ?>
            <?php include('includes/bdd.php'); ?>
            
                <form enctype="multipart/form-data" method="POST" action="verif_logements_create.php" class="rounded" style="background-color: #FFFAFA; max-width: 1300px;">
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Nom du logement :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="nom" class="form-control" name="nom"/>
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
                                    <input type="number" id="place" class="form-control" name="place"/>
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
                                    <input type="text" id="description" class="form-control" name="description"/>
                                </div>
                            </div>

                        <div class="row mb-3">
                        <div class="text-center pt-1 mt-5 pb-1">
                            <input type="submit" value="Créer">
                        </div>
                        </div>
                        <a class="btn btn-sm btn-danger" href="admin_logements.php">Retour</a>
                    </form>
            </div>
		</main>

		<?php include('includes/footer.php'); ?>
	</body>
</html>