<?php session_start(); 
if(!isset($_SESSION['admin'])){
    header('location: index.php');
    exit;
}
?>
<?php
$title = 'Logements';
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
			<h1>Logements :</h1>
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
                    echo '<div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Nom du logement :</h3>
                                <p> ➼ '.$result['nom'].'</p>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Nom du point de passage :</h3>
                                <p>➼ '.$result['destination'].'</p>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Nombre de places :</h3>
                                <p>➼ '.$result['place'].'</p>
                            </div>
                            <div class="col-lg-4">
                                <h3>Statut :</h3>
                                <p>➼ '.$result['statut'].'</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <h3>Description :</h3>
                                <p>➼ '.$result['description'].'</p>
                            </div>
                        </div>
                        <a class="btn btn-sm btn-danger" href="admin_logements.php">Retour</a>';
                } else {
                    echo '<h2 style="color:red;">Impossible d\'afficher les informations</h2>';
                }
            ?>
            </div>
		</main>

		<?php include('includes/footer.php'); ?>
	</body>
</html>