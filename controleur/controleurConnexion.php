<?php

require_once ("./model/model.php");
require_once ("./model/utilisateur.php");
require_once ("./controleur/controleurUtilisateur.php");


class controleurConnexion {
    public static function afficheConnexion() {
        if (isset($_SESSION["TypeOfConn"]) && $_SESSION["TypeOfConn"] == "compte") {
            header("Location: index.php?controleur=controleurMain");//afficher notre Accueil
        } else {
            $titre = "Connexion";
            include("./vue/debut.php");
            include ("./vue/connexionTest.html");
            include("./vue/footer.html");
        }

    }

    public static function connecterUtilisateur(){
        $pseudo = $_POST["pseudo"];
        $mdp = $_POST["mdp"];
        $b = Utilisateur::checkMDP($pseudo, $mdp);

        if($b){
            $_SESSION["pseudo"] = $_POST["pseudo"];
            $_SESSION["TypeOfConn"] = "compte";
            header("Location: index.php?controleur=controleurMain");//afficher notre Accueil
        } else {
            self::afficheConnexion();
        }
    }

    public static function connecterInvite() {
        $_SESSION["pseudo"] = $_POST["pseudo"];
        $_SESSION["TypeOfConn"] = "invite";
        header("Location: index.php?controleur=controleurMain");//afficher notre Accueil
    }

    public static function deconnecterUtilisateur(){
        session_unset();
        session_destroy();
        setcookie(session_name(), '', time()-1);


        header("Location: index.php?controleur=controleurconnexion&action=afficheConnexion");//afficher accueil mais deco


    }
}