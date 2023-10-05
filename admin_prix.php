<?php session_start(); 
if(!isset($_SESSION['admin'])){
    header('location: index.php');
    exit;
}
?>
<?php
$title = 'Prix';
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
			<h1>Mettre à jour les prix :</h1>
			<?php include('includes/message.php'); ?>
            <?php
                include('includes/bdd.php');
            
                $q= 'SELECT * FROM Prix WHERE id_prix = :id';
                $req = $bdd->prepare($q);
                $req->execute([
                    'id' => 1
                ]);
                $result = $req->fetch(PDO::FETCH_ASSOC);

                if($result){
                    echo '<form enctype="multipart/form-data" method="POST" action="verif_prix.php" class="rounded" style="background-color: #FFFAFA; max-width: 1300px;">';
                    echo '            
                    <div class="row mb-3">
                            <div class="col-lg-3">
                                <h3>Traversée :</h3>
                                <div class="form-outline mb-4">
                                    <input type="number" id="traversee" value="'.$result['traversee'].'" class="form-control" name="traversee"/>
                                </div>
                            </div>
                            <div class="col-lg-3">
                            <h3>Etape :</h3>
                            <div class="form-outline mb-4">
                                <input type="number" id="etape" value="'.$result['etape'].'" class="form-control" name="etape"/>
                            </div>
                        </div>
                        <div class="col-lg-3">
                        <h3>Bagage :</h3>
                        <div class="form-outline mb-4">
                            <input type="number" id="bagage" value="'.$result['bagage'].'" class="form-control" name="bagage"/>
                            <small id="bagageHelp" class="form-text text-muted">Prix à l\'unité</small>
                        </div>
                    </div>
                    <div class="col-lg-3">
                    <h3>Logement :</h3>
                    <div class="form-outline mb-4">
                        <input type="number" id="logement" value="'.$result['logement'].'" class="form-control" name="logement"/>
                    </div>
                </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col-lg-3">
                        <h3>Réduction :</h3>
                        <div class="form-outline mb-4">
                            <input type="number" id="reduction" value="'.$result['prem_achat'].'" class="form-control" name="prem_achat"/>
                            <small id="reducHelp" class="form-text text-muted">La valeur est en pourcentage</small>
                        </div>
                    </div>
                </div>

                        <div class="row mb-3">
                        <div class="text-center pt-1 mt-5 pb-1">
                            <input type="submit" value="Mettre à jour">
                        </div>
                        </div>
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