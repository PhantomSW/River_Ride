<?php
$title = 'Historique';
include('includes/head.php');
?>
<body class="color-mode">

    <?php include('includes/header.php'); ?>

    <main class="bg-alert">
        <h1 style = "text-align:center">Mon historique</h1>
        
        <?php include('includes/message.php'); ?>
        
        <?php include('includes/bdd.php'); 
        $user = $_SESSION['id_utilisateur'];

				$q = 'SELECT * FROM Historique WHERE id_utilisateur = '.$user;
				$req = $bdd->query($q);
				$results = $req->fetchAll(PDO::FETCH_ASSOC);
				
                        if($results) {
						foreach ($results as $cmd)  {
                            $exp = explode("-", $cmd['date']);
                            $jour = intval($exp[2]);

                            if(!isset($cmd['dest_2'])) {
                                $dest2 = '<i>Aucune étape</i>';
                            } else {
                                $dest2 = $cmd['dest_2'];
                            }
                            
                            if(isset($packRes['logement'])) {
                                $jour = $jour + 1;
                            }

							echo '
                            <div class="card" style="margin:30px;">
                                <h5 class="card-header">Commande #'.$cmd['id_historique'].'</h5>
                                <div class="card-body">
                                    <h5 class="card-title">'.$cmd['prenom'].' '.$cmd['nom'].'</h5>
                                    <h6 class="card-title">Réalisée pour '.$cmd['personne'].' personnes</h6>
                                    <br>
                                    <div class="row mb-3">
                                        <div class="col-lg-3">
                                            <h6>Traversée suivie :</h6> 
                                            <ul>
                                                <li class="card-text">Départ : '.$cmd['dest_1'].'</li>
                                                <li class="card-text">Etape : '.$dest2.'</li>
                                                <li class="card-text">Arrivée : '.$cmd['dest_3'].'</li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-2">
                                            <h6>Dates :</h6>
                                            <p class="card-text" style="margin-bottom:0;">Du '.$exp[2].'/'.$exp[1].'/'.$exp[0].'</p>
                                            <p class="card-text">Au '.$jour.'/'.$exp[1].'/'.$exp[0].'</p>
                                        </div>';

                                        if(isset($cmd['logement'])) {
                                        echo '
                                        <div class="col-lg-2">
                                            <h6>Logement :</h6>
                                            <p class="card-text">'.$cmd['logement'].'</p>
                                        </div>'; }

                                        echo '
                                        <div class="col-lg-2">
                                            <h6>Bagages :</h6>
                                            <p class="card-text">Total des bagages : '.$cmd['bagage'].'</p>
                                        </div>
                                        <div class="col-lg-2">
                                            <h6>Montant :</h6>
                                            <p class="card-text">Somme totale : '.$cmd['montant'].' €</p>
                                        </div>
                                    </div>
                                    
                                </div>
                                </div>';
                        }
                    } else {
                        echo '
                        <div style="text-align:center; padding:40px; margin-bottom:105px;">
                            <h5>Oh, il semblerait que vous n\'ayez passé aucune commande pour le moment !</h5>
                        </div>';
                    }
    
            ?>
        
    </main>
    <?php include('includes/footer.php'); ?>
    </body>
</html>