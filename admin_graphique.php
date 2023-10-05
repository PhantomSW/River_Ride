<?php
$title = 'Admnistration';
include('includes/head.php');
?>
<style>
    main {
        padding-left: 200px;
    }
    
</style>
<body class="color-mode">
    <?php 
    include('includes/header.php'); 
    if(!isset($_SESSION['admin'])){
        $msg = 'Vous n\'êtes pas identifié en tant qu\'administrateur.';
	    header('location: index.php?type=danger&message=' . $msg);
	    exit();
    }
    ?>
  
    <main class="admin_main">
        <h1> Taux d'occupation des logements </h1>
		<?php include('includes/message.php'); ?>
        <div class="container mt-5">
        <h2>Graphique de Logements</h2>
        <canvas id="graphiqueLogements"></canvas>
    </div>
	</main>


    <script type="module">
        
        var tableauDonnees = [];
        <?php 
                include('includes/bdd.php');
                $q = 'SELECT * FROM Logement';
				$req = $bdd->query($q);
				$results = $req->fetchAll(PDO::FETCH_ASSOC); 
                ?>
                
        
        
        var tableauDonnees = <?php echo json_encode($results); ?>;
        console.log(tableauDonnees);
        
        var labels = tableauDonnees.map(row => row.nom);
        var placesDisponibles = tableauDonnees.map(row => row.place);
        var placesOccupees = tableauDonnees.map(row => row.occupee);

        var ctx = document.getElementById('graphiqueLogements').getContext('2d');
        var graphique = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Places Disponibles',
                    data: placesDisponibles,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }, {
                    label: 'Places Occupées',
                    data: placesOccupees,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>



    <?php include('includes/footer.php'); ?>
    </body>
</html>

