<?php
$title = 'Erreur';
include('includes/head.php');
?>
<style>
        body {
            
            text-align: center;
        }

        .home-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
<body class="color-mode">

    <?php include('includes/header.php'); ?>

    <main class="bg-alert">
        <?php

        if (isset($_SERVER['REDIRECT_STATUS'])) {

            $erreur = $_SERVER['REDIRECT_STATUS'];
            $liste = array(
                404 => array(
                    'nom' => '404 - Page non trouvée',
                    'msg' => 'La page que vous cherchez n\'existe pas.'
                ),
                504 => array(
                    'nom' => '504 - Temps d\'attente dépassé',
                    'msg' => 'Le serveur n\'a pas réussi à recevoir une réponse dans le délai imparti.'
                )
            );

        if (array_key_exists($erreur, $liste)) {
            echo '<p style="font-size: 100px;">' . $erreur . '</p>';
            echo '<p style="font-size: 24px; padding-top:20px;">' . $liste[$erreur]['nom'] . '</p>';
            echo '<p style="font-size: 18px; padding-top:10px;">' . $liste[$erreur]['msg'] . '</p>';
        } else {
            echo '<div class="erreur-code">' . $erreur . '</div>';
            echo '<div class="erreur-message">Erreur inconnue</div>';
            echo '<div class="erreur-description">Une erreur inconnue s\'est produite.</div>';
        }
    } else {
        echo '<h1>Aucune erreur détéctée</h1>
        <p style="font-size: 24px; padding:80px;">Vous pouvez revenir sur la page d\'acceuil</p>';
    }
        ?>

        <a class="btn btn-danger" href="/">Retourner à la page d'accueil</a>
        </main>
    <?php include('includes/footer.php'); ?>
    </body>
</html>

