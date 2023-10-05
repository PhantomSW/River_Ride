<?php
$title = 'Packs';
include('includes/head.php');
?>
<body class="color-mode">

    <?php include('includes/header.php'); ?>

    <main class="bg-alert">
        <h1 style = "text-align:center">Nos packs</h1>
        <p style="margin-left:50px;">Retrouver nos quelques packs, avec des prix plus abordable et des chemins déjà tracés !</p>
        
        <?php include('includes/message.php'); ?>
        
        <?php include('includes/bdd.php');

				$q = 'SELECT * FROM Pack';
				$req = $bdd->query($q);
				$results = $req->fetchAll(PDO::FETCH_ASSOC);
				?>
			
           
						<?php 
                        if($results) {
                            echo '<div class="row mb-3">';
						foreach ($results as $packRes)  {
                            $exp = explode("-", $packRes['date']);
                            $jour = intval($exp[2]);

                            if(empty($packRes['destination_2'])) {
                                $dest2 = '<i>Aucune étape</i>';
                            } else {
                                $dest2 = $packRes['destination_2'];
                            }

                            if(isset($packRes['logement'])) {
                                $jour = $jour + 1;
                            }
                           
							echo '
                            <div class="col-lg-6">
                            <a class="packs" href="commande_pack.php?id_pack='.$packRes['id_pack'].'"><div class="card" style="margin:30px;">
                                <h5 class="card-header">Pack #'.$packRes['id_pack'].'</h5>
                                <div class="card-body">
                                    <h5 class="card-title">'.$packRes['nom'].'</h5>
                                    <h6 class="card-title">Réalisée pour '.$packRes['personne'].' personnes</h6>
                                    <br>
                                    <div class="row mb-3">
                                        <div class="col-lg-6">
                                            <h6>Traversée suivie :</h6> 
                                            <ul>
                                                <li class="card-text">Départ : '.$packRes['destination_1'].'</li>
                                                <li class="card-text">Etape : '.$dest2.'</li>
                                                <li class="card-text">Arrivée : '.$packRes['destination_3'].'</li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6">
                                            <h6>Dates :</h6>
                                            <p class="card-text" style="margin-bottom:0;">Du '.$exp[2].'/'.$exp[1].'/'.$exp[0].'</p>
                                            <p class="card-text">Au '.$jour.'/'.$exp[1].'/'.$exp[0].'</p>
                                        </div>';

                                        if(isset($packRes['logement'])) {
                                        echo '
                                        <div class="col-lg-6 mt-4">
                                            <h6>Logement :</h6>
                                            <p class="card-text">'.$packRes['logement'].'</p>
                                        </div>'; }

                                        echo '
                                        <div class="col-lg-6 mt-4">
                                            <h6>Bagages :</h6>
                                            <p class="card-text">Total des bagages : '.$packRes['bagage'].'</p>
                                        </div>
                                        <div class="col-lg-12">
                                            <br><br>
                                            <h6>Montant :</h6>
                                            <p class="card-text">Somme totale : '.$packRes['prix'].' €</p>
                                        </div>
                                    </div>
                                    
                                </div>
                                </div></a>
                                </div>';
                        }
                    } else {
                        echo '
                        <div style="text-align:center; padding:40px; margin-bottom:105px;">
                            <h5>Oh, il semblerait que vous n\'ayez passé aucune commande pour le moment !</h5>
                        </div>';
                    }
                    echo '</div>';
    
            ?>
        
    </main>
    <?php include('includes/footer.php'); ?>
    </body>
</html>

