<footer class="text-center text-lg-start bg-light text-muted">

<!--<div class="text-center p-1" style="background-color: #181c2e;"></div> C'est moyennement beau-->

  <section style="background-color:	#FFFAFA; margin-top:50px;">
    <div class="container text-center" style="background-color:	#FFFAFA;">
      <div class="row">
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto">
          <h6 class="text-uppercase fw-bold">Nous écrire</h6>
          <p>contact@river-ride.com</p>
          <p>+33 1 18 67 22 69</p>
        </div>

        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
          <h6 class="text-uppercase fw-bold">Adresse</h6>
          <p>92 Rue des Berges</p>
          <p>42290, Sorbiers</p>
        </div>

        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0">
          <h6 class="text-uppercase fw-bold">Session</h6>

        <?php if(isset($_SESSION['admin'])) {
          echo '<a href="admin_utilisateurs.php" style="text-decoration:none; color:#212529BF;">Administrateur</a>';
        } else { if(isset($_SESSION['client'])) {
          echo '<a href="index.php" style="text-decoration:none; color:#212529BF;">Client</a><br>';
          } else {
            echo '<a href="connexion.php" style="text-decoration:none; color:#212529BF;">Client</a><br>
            <a href="admin_connexion.php" style="text-decoration:none; color:#212529BF;">Administrateur</a>';
          }
        }
?>

        </div>
      </div>
    </div>
  </section>

  <div class="text-center p-4" style="background-color: #9fe4d7;">
    <p style="color: black;">© 2023 Copyright : River-Ride & cie</p>
  </div>
</footer>