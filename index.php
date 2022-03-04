<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Accueil</title>
</head>
<body>
    <nav>   
        <ul>
            <li href="index.php">Accueil</li>
            <li href="index.php">blabli</li>
            <li href="index.php">blabla</li>
        </ul>
    </nav>
    <h1>Accueil</h1>
    <h2>Identification</h2>

    <p>Bonjour, veuillez vous connecter pour accéder à nos services</p>
    <a href="inscription.php"><button>Inscription</button></a>
    <a href="connexion.php"><button>Connexion</button></a>
    <h2>Réinitialiser Session</h2>
    <form action="traitement.php?action=reset" method="post">
        <input  type="submit" name="reset" value="Réinitialiser">
    </form>

    <?php
        session_start();

        if (array_key_exists("message", $_SESSION)) {
            echo "<p>".$_SESSION["message"]."</p>";
        }
        
        var_dump($_SESSION);
    ?>

</body>
</html>