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
    <title>Connexion</title>
</head>
<body>
    <div id="banner">
            <img src="assets/bananes.jpg" id="logo" alt="logo du site">
            <a href="index.php"><button>Retour au site</button></a>
    </div>
    <main id="connexion_main">
        <h2>Connectez-vous</h2>
        <form action="traitement.php?action=connexion" name="connexion" method="post">
            <div class="form">
                <label>Pseudo utilisateur</label>
                <input type="text" name="pseudo">
            </div>
            <div class="form">
                <label>Mot de passe</label>
                <input type="password" name="mdp">
            </div>
            <input class="form_button" type="submit" name="submit" value="Se connecter">
        </form>
        <?php
            if (array_key_exists("message", $_SESSION)) {
                echo "<p>".$_SESSION["message"]."</p>";
            }
        ?>
        <h2>Pas encore inscrit ?</h2>
        <a id="connect_button" href="inscription.php"><button>Inscrivez-vous</button></a>
    </main>
</body>
</html>


