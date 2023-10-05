<?php session_start(); 
if(!isset($_SESSION['client'])){
    $msg = 'Vous devez être connecté pour réserver.';
	header('location: index.php?type=danger&message=' . $msg);
	exit();
}
?>
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
                <?php include('includes/message.php'); ?>
            </div>
        </div>

        
        <div class="row mb-3">
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
            <h2>Détails de la Commande</h2>
                <?php 
                 include('includes/bdd.php');
            
                 $q= 'SELECT * FROM Pack WHERE id_pack = :id_pack';
                 $req = $bdd->prepare($q);
                 $req->execute([
                     'id_pack' => $_GET['id_pack']
                 ]);
                 $packRes = $req->fetch(PDO::FETCH_ASSOC);

                $exp = explode("-", $packRes['date']);
                $jour = intval($exp[2]);

                if(empty($packRes['destination_2'])) {
                    $dest2 = '<i>Aucune étape</i>';
                } else {
                    $dest2 = $packRes['destination_2'];
                }
                            
                if(!empty($packRes['logement'])) {
                    $jour = $jour + 1;
                }
                
                echo '
                            <div class="card" style="margin:30px;">
                                <h5 class="card-header">Récapitulatif</h5>
                                <div class="card-body">
                                    <h5 class="card-title">'.$packRes['nom'].'</h5>
                                    <br>
                                    <div class="row mb-3">
                                        <div class="col-lg-12">
                                            <h6>Traversée suivie :</h6> 
                                            <ul>
                                                <li class="card-text">Départ : '.$packRes['destination_1'].'</li>
                                                <li class="card-text">Etape : '.$dest2.'</li>
                                                <li class="card-text">Arrivée : '.$packRes['destination_3'].'</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-12">
                                            <h6>Dates :</h6>
                                            <p class="card-text" style="margin-bottom:0;">Du '.$exp[2].'/'.$exp[1].'/'.$exp[0].'</p>
                                            <p class="card-text">Au '.$jour.'/'.$exp[1].'/'.$exp[0].'</p>
                                        </div>
                                    </div>

                                        <div class="row mb-3">';

                                        if(!empty($packRes['logement'])) {
                                        echo '
                                        <div class="col-lg-12">
                                            <br>
                                            <h6>Logement :</h6>
                                            <p class="card-text">'.$packRes['logement'].'</p>
                                        </div>
                                        </div>
                                        <div class="row mb-3">'; }

                                        echo '
                                        <div class="col-lg-12">
                                            <br>
                                            <h6>Bagages :</h6>
                                            <p class="card-text">Total des bagages : '.$packRes['bagage'].'</p>
                                        </div>

                                        <div class="col-lg-12">
                                            <br>
                                            <h6>Nombre de personnes :</h6>
                                            <p class="card-text">Total des personnes : '.$packRes['personne'].'</p>
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

                        $reduc = 0;
                        $prix = $packRes['prix'];

                        /* -------------------------------------- */

                        $a = 'SELECT reduc FROM Utilisateur WHERE id_utilisateur = :id';
                        $requ = $bdd->prepare($a);
                        $requ->execute([
                            'id' => $_SESSION['id_utilisateur']
                        ]);
                        $res = $requ->fetch(PDO::FETCH_ASSOC);

                        $b = 'SELECT prem_achat FROM Prix WHERE id_prix = :id';
                        $requ = $bdd->prepare($b);
                        $requ->execute([
                            'id' => 1
                        ]);
                        $prem_prix = $requ->fetch(PDO::FETCH_ASSOC);

                        if(($res['reduc']) == 1) {
                            echo '<p><i>Réduction 1er achat ............ -'.$prem_prix['prem_achat'].'%</i></p>';
                            $reduc = $reduc + $prem_prix['prem_achat'];
                            $_SESSION['res_reduc'] = 0;
                        }

                        if(($packRes['promotion']) > 0) {
                            echo '<p><i>Promotion du pack ............ - '.$packRes['promotion'].'%</i></p>';
                            $reduc = $reduc + $packRes['promotion'];
                        }

                        if($reduc > 0) {
                            $reduc = (100 - $reduc)/100;
                            echo '<p>TTC initial : <i style="text-decoration:line-through;">'.$prix.' €</i></p>';
                        }

                        /* -------------------------------------- */

                        echo '<p>TTC : '.$prix * $reduc.'€</p>'; 
                        $_SESSION['prix'] = $prix * $reduc;

                        echo '<a href="verif_commande_pack.php?id_pack='.$_GET['id_pack'].'" class="btn btn-primary">Payez</a>';

                        ?>
                     
                        
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <br><br>
                        <a href="packs.php" class="btn btn-sm btn-danger">Revenir en arrière</a>
                </div>
            </div>
    </main>
    
    <?php include('includes/footer.php'); ?>
    </body>
</html>

