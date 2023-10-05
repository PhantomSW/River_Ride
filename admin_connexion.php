<?php
$title = 'Administrateur';
include('includes/head.php');
?>
	<body class="color-mode">
		<?php include('includes/header.php'); ?>
        
  <section class="h-100 gradient-form">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">
                <div class="text-center">
                  <h1 style="color:black;">Se connecter</h1>
                  <?php include('includes/message.php'); ?>
                </div>
                
                <form method="POST" action="admin_verif.php" style="background-color: #FFFAFA;" class="rounded">
                
                  <div class="form-outline mb-4">
                    <label class="form-label guide" for="admin">Code :</label>
                    <input type="text" id="admin" class="form-control" name="admin" autocomplete="off"/>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label guide" for="pwd">Mot de passe :</label>   
                    <input type="password" id="pwd" class="form-control" name="pwd"/>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <input type="submit" value="Connexion">
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Session d'administrateur</h4>
                <p class="small mb-0">
                Cette page est dédiée à la connection de nos membres.<br>
                Si vous n'en êtes pas un, cette page ne vous servira absolument pas !
                </p>
              </div>
            </div>
      </div>
    </div>
  </div>
</section>

<?php include('includes/footer.php'); ?>
	</body>
</html>