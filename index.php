<?php
session_start(); //demarage de la session

$id_session = session_id(); //Chaque utilisateur a une ID de session a chaque demarage du site

include("/var/www/html/Fonction.php");
?>
<!DOCTYPE html>


<html>
    <head>
        <meta name="author" content="Valentin CHEVAILLIER">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/CSS.css">
    </head>
    <body>
        <h1 class="titre_page">Serveur de la famille</h1>
        
        <?php

        include("/var/www/html/toolsbar.php");

        if ($_SESSION['etat']=='connect') {
            echo '<h4>Vous êtes connecté en tant que '.$_SESSION['login'].'</h4>';
    
        }
            
        if ($_SESSION['etat']=='disconect' or $_SESSION['etat']=='') {
            include('/var/www/html/Ressource/connexion/Connexion.php');
        }

        ?>

        <br><br>

        <p>La famille CHEVAILLIER est une grande famille. Elle est composée de 
            beaucoup de membres. Le plus important reste sans aucun doute Grisette. 
            Chaqun des membres est decrit dans la liste ci-dessous.</p>

        <?php
        include("/var/www/html/Menu2.php");
        //include("Ressource/inscription/inscription.php");
        compter_visite();
        afficher_visite();
        ?>
        
    </body>
</html>
