<?php
session_start(); //Démarage de la session
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        	<link rel="stylesheet" href="../../CSS.css">
        <title>Inscription</title>
    </head>
    <body>
        <h1 style="text-align: center;">Inscription</h1>
        
        
        <form action="Inscription_test.php" method="POST" name="Inscription">
            <fieldset>
    		<legend>Vos informations</legend>
    		<br>
    		<label for="nom">Nom :</label>
    		<input type="text" name="nom" id="nom" placeholder="Votre nom">
                    <br><br>
                    <label for="prenom">Prénom :</label>
    		<input type="text" name="prenom" id="prenom" placeholder="Votre nom">
    		<br><br>
                    <label for="date_naissance">Votre âge</label>
                    <input type="text" name="age" placeholder="Votre âge" id="date_naissance">
                    <br><br>
                    <label for="login">Login :</label>
    		<input type="text" name="login" id="login" placeholder="Votre login">
    		<br><br>
                <label for="Login" class="login">Password : </label>
                <input type="password" class="login" name="password" placeholder="Votre mot de passe">
                <br><br>
                <input type="submit" class="bouton2" name="Envoyer" value="Finir l'inscription">
            </fieldset>
        </form>
    </body>
</html>
