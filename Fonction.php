<?php
function compter_visite(){

    $link=mysqli_init();
    $connect=mysqli_real_connect($link,localhost,root,aze1132,GestionPersonne);

	$ip   = $_SERVER['REMOTE_ADDR']; // L'adresse IP du visiteur
    $date = date('Y-m-d');           // La date d'aujourd'hui, sous la forme AAAA-MM-JJ
    $req3="INSERT INTO stats_visites(ip,date_visite,pages_vues) VALUES ('$ip','$date',1) ON DUPLICATE KEY UPDATE pages_vues = pages_vues + 1;";
    $execution3 = mysqli_query($link,$req3);
   	mysqli_close($link);
}

function afficher_visite(){
	$link=mysqli_init();
    $connect=mysqli_real_connect($link,localhost,root,aze1132,GestionPersonne);
    $compteur=0;

    $req4="SELECT * FROM stats_visites";
    $execution4 = mysqli_query($link,$req4);

    if($execution4==false) 
            echo "<h1>Echec de l'exection de la requête</h1>";
        else{
            while($ligne=mysqli_fetch_assoc($execution4)){
            	$compteur = $ligne["pages_vues"] + $compteur;
            }
        }

    echo "<h4>Le nombre de visite sur le serveur est : $compteur</h4>";
}
?>