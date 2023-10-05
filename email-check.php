<?php
$title = 'Confirmation';
include('includes/head.php');
?>
	<body class="color-mode">
	<?php include('includes/header.php'); ?>
    <main>
    <?php include('includes/message.php'); ?>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">  
                <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">
                    <div class="text-center">
                        <form method="POST" action="verif3.php" class="color-mode" style="border:none;">
                            <h3 class="color-mode">Un email de confirmation vous a été envoyé</h3>
                            <label for="confirm">Code à 6 chiffres :</label>
                            <input class="form-control" type="number" id="confirm" name="confirm">
                            <br>
                            <button type="submit" class="btn btn-outline-secondary">Confirmer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include('includes/footer.php'); ?>
	</body>
</html>