<?php
    session_start(); //demarage de la session
    
    //Connexion a la base donnée
    $link=mysqli_init();
    $connect=mysqli_real_connect($link,localhost,root,aze1132,GestionPersonne);
   
    $req1="SELECT login FROM personne2";
    $req2="INSERT INTO Personne2 (nom,prenom,age,login,mdp) VALUES ('".$_POST['nom']."','".$_POST['prenom']."',". $_POST['age'] .",'".$_POST['login']."','".$_POST['password']."')";
    
    if($link){
        if($connect==false) 
            echo "Echec de l'exection de la requete";
        else{ 
            $req_test=mysqli_query($link,$req1);
            while($ligne=mysqli_fetch_assoc($req_test)){
                if ($ligne['login']==$_POST['login']) {
                    echo '<h1 style="text-align: center">Votre login est déjà utilisé</h1>';
                    $log_utilise=$ligne['login'];
                    include 'inscription.php';
                }
            }
            
            if ($log_utilise!=$_POST['login']) {
                $req_exe=mysqli_query($link,$req2);
                if($req_exe==false) 
                    echo '<h1 style="text-align: center"> ERREUR !!! </h1>';
                else
                    include 'http://192.168.0.10/index.php';
            }
        }
    }
    
    //Deconnexion de la base
    $deconnnect=mysqli_close($link);
?>