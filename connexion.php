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
    <title>Connexion utilisateur</title>
</head>
<body>
    <a href="index.php"><button>Accueil</button></a>
    <h1>Connexion utilisateur</h1>
    <form action="traitement.php?action=connexion" name="connexion" method="post">
        <div class="form">
            <label>Pseudo utilisateur</label>
            <input type="text" name="pseudo">
        </div>
        <div class="form">
            <label>Mot de passe</label>
            <input type="password" name="mdp">
        </div>
        <input type="submit" name="submit" value="Envoyer">
    </form>

    <?php

    // var_dump($_SESSION);

    // $kiki = $_SESSION['utilisateurs'][array_search("kiki", array_column($_SESSION['utilisateurs'],'pseudo'))];

    // var_dump($kiki);

    // echo "<p>".password_verify("kiki", $kiki['mdp'])."</p>";

    if (array_key_exists("message", $_SESSION)) {
        echo "<p>".$_SESSION["message"]."</p>";
    }

    ?>
</body>
</html>


