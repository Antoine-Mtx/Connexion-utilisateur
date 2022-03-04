<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription utilisateur</title>
</head>
<body>
    <a href="index.php"><button>Accueil</button></a>
    <h1>Inscription utilisateur</h1>
    <form action="traitement.php?action=inscription" name="inscription" method="post">
        <div class="form">
            <label>Pseudo utilisateur</label>
            <input type="text" name="pseudo">
        </div>
        <div class="form">
            <label>Mail utilisateur</label>
            <input type="email" name="email">
        </div>
        <div class="form">
            <label>Mot de passe</label>
            <input type="password" name="mdp">
        </div>
        <div class="form">
            <label>Vérifier mot de passe</label>
            <input type="password" name="mdp_verif">
        </div>
        <input type="submit" name="submit" value="Envoyer">
    </form>

    <?php
        if (array_key_exists("message", $_SESSION)) {
            echo "<p class='evanescent'>".$_SESSION["message"]."</p>";
        }
    ?>