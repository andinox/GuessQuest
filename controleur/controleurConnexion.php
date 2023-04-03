<?php

require_once ("./model/model.php");
require_once ("./model/utilisateur.php");


class controleurConnexion {
    public static function afficheConnexion() {
        $titre = "Connexion";
        include("./vue/debut.php");
        include ("./page_connexion/index.html");
    }

    public static function connecterUtilisateur(){
        $login = $_POST["login"];
        $mdp = $_POST["mdp"];
        $b = Utilisateur::checkMDP($login, $mdp);

        if($b){
            $_SESSION["login"] = $_POST["login"];
            header("Location: index.php?controleur=controleurNewQuiz&action=affiche");//afficher notre Accueil
        } else{
            self::afficheConnexion();
        }
    }

    public static function deconnecterUtilisateur(){
        session_unset();
        session_destroy();
        setcookie(session_name(), '', time()-1);
<<<<<<< Updated upstream
        header("Location: index.php?controleur=controleurConnexion&action=afficheConnexion");//afficher accueil mais deco
=======
        header("Location: index.php?controleur=controleurAccueil&action=affiche");//afficher accueil mais deco
>>>>>>> Stashed changes
    }
}