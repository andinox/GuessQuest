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
}