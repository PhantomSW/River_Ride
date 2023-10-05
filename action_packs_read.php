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
    
</style>
	<body class="color-mode">
		<?php include('includes/header.php'); ?>

		<main>
        <div class="container">
			<?php include('includes/message.php'); ?>
            <?php
                include('includes/bdd.php');
            
                $q= 'SELECT * FROM Pack WHERE id_pack = :id_pack';
                $req = $bdd->prepare($q);
                $req->execute([
                    'id_pack' => $_GET['id_pack']
                ]);
                $result = $req->fetch(PDO::FETCH_ASSOC);

                if($result){
                    $exp = explode("-", $result['date']);
                    echo '<h1>Pack : '.$result['nom'].'</h1>
                   
                        
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Départ :</h3>
                                <p>➼ '.$result['destination_1'].'</p>
                            </div>
                            <div class="col-lg-4">
                                <h3>Etape :</h3>
                                <p>➼ '.$result['destination_2'].'</p>
                            </div>
                            <div class="col-lg-4">
                                <h3>Arrivée :</h3>
                                <p>➼ '.$result['destination_3'].'</p>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Prix :</h3>
                                <p>➼ '.$result['prix'].' €</p>
                            </div>
                            <div class="col-lg-4">
                                <h3>Promotion :</h3>
                                <p>➼ -'.$result['promotion'].'%</p>
                            </div>
                            <div class="col-lg-4">
                                <h3>Logement attribué :</h3>
                                <p>➼ '.$result['logement'].'</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Nombre personnes :</h3>
                                <p>➼ '.$result['personne'].' personnes</p>
                            </div>
                            <div class="col-lg-4">
                                <h3>Bagages :</h3>
                                <p>➼ '.$result['bagage'].'</p>
                            </div>
                            <div class="col-lg-4">
                                <h3>Date de départ :</h3>
                                <p>➼ Le '.$exp[2].'/'.$exp[1].'/'.$exp[0].'</p>
                            </div>
                        </div>

                        <a class="btn btn-sm btn-danger" href="admin_packs.php">Retour</a>';
                } else {
                    echo '<h2 style="color:red;">Impossible d\'afficher les informations</h2>';
                }
            ?>
            </div>
		</main>

		<?php include('includes/footer.php'); ?>
	</body>
</html>