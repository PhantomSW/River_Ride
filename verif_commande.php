<?php
$title = 'Commande';
include('includes/head.php');
?>
<body class="color-mode">

    <?php include('includes/header.php'); ?>

    <main class="bg-alert">
        <h1 style = "text-align:center">Commande réalisée avec succès !</h1>
        <h4 style="text-align:center; padding:50px; padding-bottom:130px;">Vous pouvez poursuivre vos achats !</h4>
        <?php include('includes/message.php'); ?>
		<?php include('includes/bdd.php'); ?>

		<?php
			$q = 'INSERT INTO Historique (id_utilisateur, nom, prenom, montant, bagage, logement, date, dest_1, dest_2, dest_3, personne) VALUES (:id_utilisateur, :nom, :prenom, :montant, :bagage, :logement, :date, :dest_1, :dest_2, :dest_3, :personne)';
			$req = $bdd->prepare($q);
			$reponse = $req->execute([
				'id_utilisateur' => $_SESSION['id_utilisateur'],
				'nom' => $_SESSION['res_nom'], 
				'prenom' => $_SESSION['res_prenom'],
				'montant' => $_SESSION['res_prix'],
				'bagage' => $_SESSION['res_bagages'],
				'logement' => $_SESSION['res_logement'],
				'date' => $_SESSION['res_date'],
				'dest_1' => $_SESSION['res_depart'],
				'dest_2' => $_SESSION['res_etape'],
				'dest_3' => $_SESSION['res_arrivee'],
				'personne' => $_SESSION['res_personne']
			]);

			if($reponse == 1){
				unset($_SESSION['res_nom']);
				unset($_SESSION['res_prenom']);
				unset($_SESSION['res_prix']);
				unset($_SESSION['res_bagages']);
				unset($_SESSION['res_logement']);
				unset($_SESSION['res_date']);
				unset($_SESSION['res_depart']);
				unset($_SESSION['res_etape']);
				unset($_SESSION['res_arrivee']);
				unset($_SESSION['res_personne']);
			}
			
			if(isset($_SESSION['res_reduc'])) {
				$q = 'UPDATE Utilisateur SET reduc = :reduc WHERE id_utilisateur = :id_utilisateur';

				$req = $bdd->prepare($q);
				$reponse = $req->execute([
					'reduc' => $_SESSION['res_reduc'],
					'id_utilisateur' => $_SESSION['id_utilisateur']
				]);

				unset($_SESSION['res_reduc']);
			}
		?>

    </main>
    <?php include('includes/footer.php'); ?>
    </body>
</html>









