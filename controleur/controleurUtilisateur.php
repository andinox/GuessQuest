<?php 
require_once ("./model/model.php");
require_once ("./model/utilisateur.php");

class controleurutilisateur {

    public static function affiche(){
        $titre = "Utilisateur";
        include("./vue/debut.php");
        include("./vue/profil.html");
        include("./vue/footer.html");
    }
    
    //recuperation du numUtilisateur par GET
    public static function sessionUtilisateur() {
        if (isset($_SESSION["pseudo"])) {
            return $_SESSION["pseudo"];
        } else {
            return null;
        }
    }

    //recuperation du numUtilisateur par session
    public static function getNumUtilisateur() {
        $pseudo = self::sessionUtilisateur();
        $id_Utilisateur = Utilisateur::getId_UtilisateurByPseudo($pseudo);
        return $id_Utilisateur;
    }

}