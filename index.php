<?php
#session_start(); //demarage de la session

#$id_session = session_id(); //Chaque utilisateur a une ID de session a chaque demarage du site
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="author" content="Valentin CHEVAILLIER">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="CSS.css">
    </head>
    <body>
        <h1 class="titre_page">Serveur de la famille</h1>
        
        <p>La famille CHEVAILLIER est une grande famille. Elle est composée de 
            beaucoup de membres. Le plus important reste sans aucun douteGrisette. 
            Chaqun des membres est decrit dans la liste ci-dessous.</p>

        <?php
        include("Menu2.php");
        include("http://198.162.0.10/Ressource/inscription/inscription.php");
        ?>
        
    </body>
</html>
