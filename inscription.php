<?php
$title = 'Inscription';
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
                  <h1 style="color:green;">S'inscrire</h1>
                  <?php include('includes/message.php'); ?>
                </div>
                
                <form method="POST" action="verif1.php" style="background-color: #FFFAFA;" class="rounded">
                
                  <div class="form-outline mb-4">
                    <label class="form-label guide" for="username">Pseudo :</label>
                    <input type="text" id="username" class="form-control" name="username"/>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label guide" for="email">Email :</label>
                    <input type="text" id="email" class="form-control" name="email"/>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label guide" for="password">Mot de passe :</label>   
                    <input type="password" id="password" class="form-control" name="password"/>
                    <small id="pwdHelp" class="form-text">Le mot de passe doit contenir 6 caractères minimum.</small>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label guide" for="confirm-password">Confirmez le mot de passe :</label>   
                    <input type="password" id="confirm-password" class="form-control" name="confirm-password"/>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <input type="submit" value="Suivant">
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2" style="color:black;">Déjà membre ? Se connecter !</p>
                    <a href="captcha/captcha.php"><button type="button" class="btn btn-outline-warning">Se connecter</button></a>
                  </div>

                </form>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="px-3 py-4 p-md-5 mx-md-4">
              <h4 class="mb-4">Le saviez-vous ?</h4>
                <p class="small mb-0">
                <?php include('includes/diduknow.php'); ?>
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