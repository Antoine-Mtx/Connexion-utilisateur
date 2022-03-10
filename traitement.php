<?php

session_start();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "inscription":
            if (isset($_POST['submit'])) {
                $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_UNSAFE_RAW);
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                $mdp = filter_input(INPUT_POST, "mdp", FILTER_UNSAFE_RAW);
                $mdp_verif = filter_input(INPUT_POST, "mdp_verif", FILTER_UNSAFE_RAW);

                ajoutUtilisateur($pseudo, $email, $mdp, $mdp_verif) ?
                    header("Location:connexion.php") :
                    header("Location:inscription.php") ;
                die;
            }
            header("Location:inscription.php");
            die;
        case "connexion":
            if (isset($_POST['submit'])) {
                $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_UNSAFE_RAW);
                $mdp = filter_input(INPUT_POST, "mdp", FILTER_UNSAFE_RAW);

                connexionUtilisateur($pseudo, $mdp) ?
                    header("Location:index.php") :
                    header("Location:connexion.php") ;
                die;
            }
            header("Location:connexion.php");
            die;
        case "deconnexion":
            deconnexionUtilisateur();
        case "reset":
            session_unset();
    }
}
header("Location:index.php");

function ajoutUtilisateur($pseudo, $email, $mdp, $mdp_verif) {
    if ($mdp_verif != $mdp) {
        $_SESSION["message"] = "Les mots de passe ne sont pas identiques !";
        return false;
    } else if (! isset($_SESSION['utilisateurs'])) {
        if ($pseudo && $email && $mdp) { 
            $utilisateur = [
                "pseudo" => $pseudo,
                "email" => $email,
                "mdp" => password_hash($mdp, PASSWORD_DEFAULT),
            ];
            $_SESSION["utilisateurs"] []= $utilisateur;
            $_SESSION["message"] = "Inscription validée !";
            return true;
        }
    } else if (array_search($pseudo, array_column($_SESSION['utilisateurs'],'pseudo')) !== false) {
            $_SESSION["message"] = "Le pseudo $pseudo est déjà utilisé !";
            return false;
    } else if (array_search($email, array_column($_SESSION['utilisateurs'],'email')) !== false) {
            $_SESSION["message"] = "L'adresse mail $email est déjà utilisée !";
            return false;
    } else if ($pseudo && $email && $mdp) { 
        $utilisateur = [
            "pseudo" => $pseudo,
            "email" => $email,
            "mdp" => password_hash($mdp, PASSWORD_DEFAULT),
        ];
        $_SESSION["utilisateurs"] []= $utilisateur;
        $_SESSION["message"] = "Inscription validée !";
        return true;
    }
    else {
        $_SESSION["message"] = "Inscription impossible";
        return false;
    }
}

function connexionUtilisateur($pseudo, $mdp) {
    if (! isset($_SESSION['utilisateurs'])) {
        $_SESSION["message"] = "Utilisateur non répertorié";
        return false;
    } else {
        $utilisateur_key = array_search($pseudo, array_column($_SESSION['utilisateurs'],'pseudo'));
        if ($utilisateur_key === false) {
            $_SESSION["message"] = "Pseudo non répertorié";
            return false;
        } else {
            $utilisateur = $_SESSION['utilisateurs'][$utilisateur_key];
            if (password_verify($mdp, $utilisateur['mdp'])) {
                $_SESSION["message"] = "Bonjour ".$utilisateur['pseudo']." !";
                $_SESSION["utilisateurConnecte"] = $utilisateur;
                return true;
            } else {
                $_SESSION["message"] = "Mot de passe non valide";
                return false;
            }    
        }
    }
}

function deconnexionUtilisateur() {
    unset($_SESSION["utilisateurConnecte"]);
    $_SESSION["message"] = "Déconnexion réussie";
}