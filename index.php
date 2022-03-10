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
    <title>Banana News</title>
</head>
<body>
    <header>
        <div id="banner">
            <img src="assets/bananes.jpg" id="logo" alt="logo du site">
            <?php
                if (isset($_SESSION['utilisateurConnecte'])) {
                    echo    "<form action='traitement.php?action=deconnexion' method='post'>
                                <input type='submit' name='deconnexion' value='Se déconnecter'>
                            </form>";
                    $utilisateur = $_SESSION['utilisateurConnecte'];
                } else {
                    echo    "<a href='connexion.php'><button>Se connecter</button></a>";
                }
            ?>  
        </div>
        <nav>   
            <ul>
                <li href="index.php">actualités</li>
                <li href="index.php">présidentielle 2022</li>
                <li href="index.php">économie</li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Banana News</h1>
        <?php
            if (array_key_exists("message", $_SESSION)) {
                echo "<p>".$_SESSION["message"]."</p>";
            } else {
                echo "<p>Veuillez vous connecter pour accéder à nos services</p>";
            }
        ?>
        <h2>Réinitialiser Session</h2>
        <form action="traitement.php?action=reset" method="post">
            <input  type="submit" name="reset" value="Réinitialiser">
        </form>
    </main>
</body>
</html>