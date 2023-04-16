<?php

require_once ("./model/model.php");
require_once ("./model/utilisateur.php");
require_once ("./controleur/controleurUtilisateur.php");


class controleurConnexion {
    public static function afficheConnexion() {
        if (controleurutilisateur::sessionUtilisateur()) {
            header("Location: index.php?controleur=controleurMain");//afficher notre Accueil
        }
        $titre = "Connexion";
        include("./vue/debut.php");
        include ("./vue/connexionTest.html");
        include("./vue/footer.html");
    }

    public static function connecterUtilisateur(){
        $pseudo = $_POST["pseudo"];
        $mdp = $_POST["mdp"];
        echo "<p> {$pseudo},{$mdp} </p>";
        $b = Utilisateur::checkMDP($pseudo, $mdp);

        if($b){
            $_SESSION["pseudo"] = $_POST["pseudo"];
            header("Location: index.php?controleur=controleurMain");//afficher notre Accueil
        } else {
            self::afficheConnexion();
            echo "failed";
        }
    }

    public static function deconnecterUtilisateur(){
        session_unset();
        session_destroy();
        setcookie(session_name(), '', time()-1);


        header("Location: index.php?controleur=controleurconnexion&action=afficheConnexion");//afficher accueil mais deco


    }
}