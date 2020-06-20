<?php
#session_start(); //demarage de la session

#$id_session = session_id(); //Chaque utilisateur a une ID de session a chaque demarage du site
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="author" content="Valentin CHEVAILLIER">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../CSS.css">
    </head>
    <body>
        <h1 class="titre_page">Page de Test</h1>

        <?php
        include("Menu2.php");
        

        $link=mysqli_init();
        $connect=mysqli_real_connect($link,localhost,root,aze1132,GestionPersonne);
        if($connect) echo "<h3>connexion réussie</h3> <br />";
        else echo "<h3>echec de connexion</h3> <br />";

        $execution2="SELECT * FROM Personne2"
        if($execution2==false) 
            echo "<h1>Echec de l'exection de la requête</h1>";
        else{
            while($ligne=mysqli_fetch_assoc($execution2)){
                //var_dump($ligne); //Affichage null mais efficace
                echo "<h4>ID : ".$ligne['id']."</h4> <h4>Nom : ".$ligne['nom']
                        ."</h4> <h4>Prénom : ".$ligne['prenom']."</h4><br><br>";
            }
        }
        //Deconnexion de la base
        $deconnnect=mysqli_close($link);
            if ($deconnnect)
                echo "Déconnexion reussi<br>";
            else 
                echo "Echec de déconnexion<br>";
        
        ?>

    </body>
</html>