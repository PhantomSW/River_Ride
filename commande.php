<?php
$title = 'Commande';
include('includes/head.php');
?>
<body class="color-mode">

    <?php include('includes/header.php'); ?>
    <main class="mx-2">
        <div class="row mb-3">
            <div class="col-lg-1"></div>
            <div class="col-lg-6">
                <h2>Votre commande</h2>
                <?php include('includes/message.php'); 
                
                if(!isset($_SESSION['res_personne'])) {
                    $msg = 'Vous n\'avez pas de commande pour le moment.';
                    header('location: commande_vide.php?msg=' . $msg);
	                exit();
                }
                ?>
            </div>
        </div>

        
        <div class="row mb-3">
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
            <h2>Détails de la Commande</h2>
                <?php 
                $exp = explode("-", $_SESSION['res_date']);
                $jour = intval($exp[2]);

                if(empty($_SESSION['res_etape'])) {
                    $dest2 = '<i>Aucune étape</i>';
                } else {
                    $dest2 = $_SESSION['res_etape'];
                }
                            
                if(!empty($_SESSION['res_logement'])) {
                    $jour = $jour + 1;
                }
                
                echo '
                            <div class="card" style="margin:30px;">
                                <h5 class="card-header">Récapitulatif</h5>
                                <div class="card-body">
                                    <h5 class="card-title">'.$_SESSION['res_prenom'].' '.$_SESSION['res_nom'].'</h5>
                                    <br>
                                    <div class="row mb-3">
                                        <div class="col-lg-12">
                                            <h6>Traversée suivie :</h6> 
                                            <ul>
                                                <li class="card-text">Départ : '.$_SESSION['res_depart'].'</li>
                                                <li class="card-text">Etape : '.$dest2.'</li>
                                                <li class="card-text">Arrivée : '.$_SESSION['res_arrivee'].'</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-12">
                                            <h6>Dates :</h6>
                                            <p class="card-text" style="margin-bottom:0;">Du '.$exp[2].'/'.$exp[1].'/'.$exp[0].'</p>
                                            <p class="card-text">Au '.$jour .'/'.$exp[1].'/'.$exp[0].'</p>
                                        </div>
                                    </div>

                                        <div class="row mb-3">';

                                        if((strlen($_SESSION['res_logement'])) > 2) {
                                        echo '
                                        <div class="col-lg-12">
                                            <br>
                                            <h6>Logement :</h6>
                                            <p class="card-text">'.$_SESSION['res_logement'].'</p>
                                        </div>
                                        </div>
                                        <div class="row mb-3">'; }

                                        echo '
                                        <div class="col-lg-12">
                                            <br>
                                            <h6>Bagages :</h6>
                                            <p class="card-text">Total des bagages : '.$_SESSION['res_bagages'].'</p>
                                        </div>

                                        <div class="col-lg-12">
                                            <br>
                                            <h6>Nombre de personnes :</h6>
                                            <p class="card-text">Total des personnes : '.$_SESSION['res_personne'].'</p>
                                        </div>
                                    </div>
                                    
                                </div>
                                </div>'; ?>
            </div>

            <div class="col-lg-5">
                <br><br><br>
                <div class="card">
                    <h5 class="card-header" style="background:#A9A9A9;">Somme à régler</h5>
                    <div class="card-body" style="background:#BDBCBC;">
                    
                    <?php include('includes/bdd.php'); 

                        $p = 'SELECT * FROM Prix WHERE id_prix = :id';
                        $req = $bdd->prepare($p);
                        $req->execute([
                            'id' => 1
                        ]);
                        $result = $req->fetch(PDO::FETCH_ASSOC);

                        $reduc = 1;
                        echo '<p>Traversée ................................ +'.$result['traversee'].' €</p>';
                        $prix = $result['traversee'];

                        /* -------------------------------------- */

                        if(strlen($_SESSION['res_etape']) > 2) {
                            echo '<p>Etape ......................................... +'.$result['etape'].' €</p>';
                            $prix = $prix + $result['etape'];
                        }

                        /* -------------------------------------- */

                        if(isset($_SESSION['res_logement'])) {
                            echo '<p>Logement ............................... +'.$result['logement'].' €</p>';
                            $prix = $prix + $result['logement'];
                        }

                        /* -------------------------------------- */

                        echo '<p>Bagages ................................... +'. $_SESSION['res_bagages'] * $result['bagage'] . ' €</p>';
                        $prix = $prix + ($_SESSION['res_bagages'] * $result['bagage']);
                        
                        /* -------------------------------------- */

                        echo '<p>Total de '.$_SESSION['res_personne'].' personnes</p>';
                        $prix = $prix * $_SESSION['res_personne'];


                        /* -------------------------------------- */

                        $a = 'SELECT reduc FROM Utilisateur WHERE id_utilisateur = :id';
                        $requ = $bdd->prepare($a);
                        $requ->execute([
                            'id' => $_SESSION['id_utilisateur']
                        ]);
                        $res = $requ->fetch(PDO::FETCH_ASSOC);

                        if(($res['reduc']) == 1) {
                            echo '<p><i>Réduction 1er achat ............ -'.$result['prem_achat'].'%</i></p>';
                            $reduc = (100 - $result['prem_achat'])/100;
                            $_SESSION['res_reduc'] = 0;
                            echo '<p>TTC initial : <i style="text-decoration:line-through;">'.$prix.' €</i></p>';
                        }

                        /* -------------------------------------- */
                        
                        
                        echo '<p>TTC : '.$prix * $reduc.'€</p>'; 
                        $_SESSION['res_prix'] = $prix * $reduc;


                        ?>

                        <a href="verif_commande.php" class="btn btn-primary">Payez</a>
                     
                        
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <br><br>
                        <a href="reserver_2.php" class="btn btn-sm btn-danger">Revenir en arrière</a>
                </div>
            </div>
    </main>
    
    <?php include('includes/footer.php'); ?>
    </body>
</html>

