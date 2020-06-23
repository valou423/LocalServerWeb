<?php
session_start(); //demarage de la session

$log=$_POST['login'];
$mdp=$_POST['password'];

        
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="/CSS.css">

    </head>
    <body>
        <?php
        
        //Connexion a la base donnée
        $link=mysqli_init();
        $connect=mysqli_real_connect($link,localhost,root,aze1132,GestionPersonne);

        $req='SELECT login,mdp FROM Personne2';
        $resultat=mysqli_query($link,$req);
        
        while($ligne=mysqli_fetch_assoc($resultat)){
            if ($ligne['login']==$log && $ligne['mdp']==$mdp ) {
                echo '<h1 style="text-align: center;">Connexion reussi</h1>';
                $_SESSION['etat']='connect';
                $_SESSION['login']=$log;
                $_SESSION['password']=$mdp;
                include ('/var/www/html/index.php');
            }
        }
        if ($_SESSION['etat']=='' || $_SESSION['etat']=='disconnect') {
            echo '<h1 style="text-align: center;">Echec de la connexion</h1>';
            include('/var/www/html/Ressource/connexion/Connexion.php');
            $_SESSION['etat']='disconnect';
        }
        
        $deconnnect=mysqli_close($link);
        ?>
        
    </body>
</html>
