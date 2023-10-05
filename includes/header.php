<header style="z-index: 8;">
  <nav class="navbar navbar-expand-lg navbar-dark" style="display: flex;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
    <span class="navbar-toggler-icon"></span>
  </button>
  <img src="images/river-ride-long.png" alt="logo" height="55px">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li><b><a href="index.php" title="Page principale">ACCUEIL</a></b></li>       
      <li><b><a href="reserver.php" title="Réservez !">RESERVER</a></b></li>        
      <li><b><a href="packs.php" title="Nos packs">PACKS</a></b></li>         
      <?php 
        if(isset($_SESSION['admin'])) {
            echo '<li><b><a href="admin_utilisateurs.php" title="Page d\'administrateur">ADMIN</a></b></li>';
            echo '<b><a href="javascript:void(0)" onclick="openNav()">Panel</a></b>';
            echo '<li><b><a href="action_deconnexion.php" title="Se déconnecter">DECONNEXION</a></b></li>';
        } else {
        if(isset($_SESSION['client'])){
            echo '<li class="dropdown">
                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bold;">
                PROFIL
                </a>
                <div class="dropdown-menu border border-warning" aria-labelledby="" style="background-color: #A9C4CC;">
                <a style="margin-left:25px;" class="" href="commande.php">Commande</a>
                    <a style="margin-left:25px;" class="" href="historique.php">Historique</a>
                    <a style="margin-left:25px;" class="" href="user_profil.php">Informations</a>
                    <a style="margin-left:25px;" class="" href="action_deconnexion.php">Déconnexion</a>
                </div>
                </li>';
        }else{
            echo '<li><b><a href="connexion.php" title="Se connecter">CONNEXION</a></b></li>';
            echo '<li><b><a href="inscription.php" title="S\'inscrire">INSCRIPTION</a></b></li>';
        }}
        ?>
        
    </ul>
  </div>
  <!-- <button onclick="myFunction()"><img src="images/darkmode.png" width="30px"></button> -->
  <button><a style="margin-left: 0px; padding: 3px;" href="?dark=1"><img src="images/darkmode.png" width="30px"></a></button>
</nav>
</header>

<?php 
    if(isset($_SESSION['admin'])) {
        echo '<div id="sidenav" class="sidenav" style="z-index: 5;">
                <h1 style="color: #9EF4CC; font-size: 32px;"><br>ADMIN</h1><br>
                <a href="admin_utilisateurs.php">Utilisateurs</a>
                <a href="admin_banned_users.php">Ban</a>
                <a href="admin_graphique.php">Graphique</a>
                <a href="admin_logements.php">Logements</a>
                <a href="admin_packs.php">Packs</a>
                <a href="admin_prix.php">Prix</a>
                <br><a href="javascript:void(0)" onclick="closeNav()">Close</a>
            </div>';
    }
?>
