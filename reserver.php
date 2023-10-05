<?php session_start(); 
if(!isset($_SESSION['client'])){
    $msg = 'Vous devez être connecté pour réserver.';
	header('location: index.php?type=danger&message=' . $msg);
	exit();
}
?>
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
           
            
            

                <form enctype="multipart/form-data" method="POST" action="verif_reserver.php" class="rounded" style="border: 0px; max-width: 1300px;">
                
                        
                        <div class="row mb-4">
                            <div class="col-lg-4">
                                <h3>Départ :</h3>
                                <p>Choisissez votre point de départ !</p>
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
                                <p>Prolonger la virée !</p>
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
                                <p>Terminez votre trajet.</p>
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
                            <div class="text-center pt-1 mt-5 pb-1">
                                <input type="submit" value="Poursuivre la réservation">
                            </div>
                        </div>
                    </form>
            </div>
		</main>

		<?php include('includes/footer.php'); ?>
	</body>
</html>