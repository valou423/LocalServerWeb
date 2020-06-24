<?php
session_start(); //demarage de la session

$id_session = session_id(); //Chaque utilisateur a une ID de session a chaque demarage du site
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="author" content="Valentin CHEVAILLIER">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/CSS.css">
    </head>
    <body>
        <h1 class="titre_page">Page de Test</h1>

        <?php
        include("/var/www/html/toolsbar.php");
        

        $link=mysqli_init();
        $connect=mysqli_real_connect($link,localhost,root,aze1132,GestionPersonne);

        if($connect) echo "<h3>connexion réussie</h3> <br>";
        else echo "<h3>echec de connexion</h3> <br>";

        $req2 = "SELECT * FROM Personne2";
        $execution2 = mysqli_query($link,$req2);

        if($execution2==false) 
            echo "<h1>Echec de l'exection de la requête</h1>";
        else{
            while($ligne=mysqli_fetch_assoc($execution2)){
                //var_dump($ligne); //Affichage null mais efficace
                echo "<h4>ID : ".$ligne['id']."</h4> <h4>Nom : ".$ligne['nom']."</h4> <h4>Prénom : ".$ligne['prenom']."</h4><br><br>";
            }
        }
        //Deconnexion de la base
        $deconnnect=mysqli_close($link);
            if ($deconnnect)
                echo "Déconnexion reussi<br>";
            else 
                echo "Echec de déconnexion<br>";

        // On indique au navigateur qu'on utilise l'encodage UTF-8
        header('Content-type: text/html; charset=utf-8');
         
        // Paramètres de connexion à la base
        define('DB_HOST' , 'localhost');
        define('DB_NAME' , 'GestionPersonne');
        define('DB_USER' , 'root');
        define('DB_PASS' , 'aze1132');
         
        // Connexion à la base avec PDO
        try{
            $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch(Exception $e) {
            echo "Impossible de se connecter à la base de données '".DB_NAME."' sur ".DB_HOST." avec le compte utilisateur '".DB_USER."'";
            echo "<br/>Erreur PDO : <i>".$e->getMessage()."</i>";
            die();
        }

        // Fonction qui permet de mettre à jour le compteur de visites
        function compter_visite(){
            // On va utiliser l'objet $pdo pour se connecter, il est créé en dehors de la fonction
            // donc on doit indiquer global $pdo; au début de la fonction
            global $pdo;
             
            // On prépare les données à insérer
            $ip   = $_SERVER['REMOTE_ADDR']; // L'adresse IP du visiteur
            $date = date('Y-m-d');           // La date d'aujourd'hui, sous la forme AAAA-MM-JJ
             
            // Mise à jour de la base de données
            // 1. On initialise la requête préparée
            $query = $pdo->prepare("
                INSERT INTO stats_visites (ip , date_visite , pages_vues) VALUES (:ip , :date , 1)
                ON DUPLICATE KEY UPDATE pages_vues = pages_vues + 1
            ");
            // 2. On execute la requête préparée avec nos paramètres
            $query->execute(array(
                ':ip'   => $ip,
                ':date' => $date
            ));
        }

        $visiteur = prepare(SELECT * FROM table_visite WHERE=:visite_online);
        $visiteur->bindvalue(':visite_online', $id_online, PDO::PARAM_STR);
        $visiteur->execute();
        $list_visiteur = $visiteur->fetchAll(PDO::FETCH_ASSOC);
         
        foreach($list_visiteur as $all => $each)
        {
          echo $each['ip'];."<br/>";
          echo $each['pages_vues'];."<br/>";
         
        }
        ?>

    </body>
</html>