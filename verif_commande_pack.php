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
		<?php include('includes/bdd.php');

		$p = 'SELECT * FROM Pack WHERE id_pack = :id';
		$req = $bdd->prepare($p);
		$req->execute([
			'id' => $_GET['id_pack']
		]);
		$result = $req->fetch(PDO::FETCH_ASSOC);
		
		?>

		<?php
			$q = 'INSERT INTO Historique (id_utilisateur, nom, prenom, montant, bagage, logement, date, dest_1, dest_2, dest_3, personne) VALUES (:id_utilisateur, :nom, :prenom, :montant, :bagage, :logement, :date, :dest_1, :dest_2, :dest_3, :personne)';
			$req = $bdd->prepare($q);
			$reponse = $req->execute([
				'id_utilisateur' => $_SESSION['id_utilisateur'],
				'nom' => $result['nom'], 
				'prenom' => ' ',
				'montant' => $_SESSION['prix'],
				'bagage' => $result['bagage'],
				'logement' => $result['logement'],
				'date' => $result['date'],
				'dest_1' => $result['destination_1'],
				'dest_2' => $result['destination_2'],
				'dest_3' => $result['destination_3'],
				'personne' => $result['personne']
			]);

			if($reponse == 1){
				unset($_SESSION['prix']);
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









