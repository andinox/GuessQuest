<?php

require_once ("./model/model.php");
require_once ("./model/utilisateur.php");


class controleurConnexion {
    public static function afficheConnexion() {
        $titre = "Connexion";
        include("./vue/debut.php");
        include ("./vue/connexionTest.html");
        include("./vue/footer.html");
    }

    public static function connecterUtilisateur(){
        $login = $_POST["pseudo"];
        $mdp = $_POST["mdp"];
        $b = Utilisateur::checkMDP($login, $mdp);

        if($b){
            $_SESSION["login"] = $_POST["login"];
            header("Location: index.php?c=newquiz");//afficher notre Accueil
        }
    }

    public static function deconnecterUtilisateur(){
        session_unset();
        session_destroy();
        setcookie(session_name(), '', time()-1);


        header("Location: index.php?controleur=controleurConnexion&action=afficheConnexion");//afficher accueil mais deco


    }
}