<?php 
require_once ("./model/model.php");
require_once ("./model/utilisateur.php");

class controleurProfil {

    public static function affiche(){
        $titre = "Profil";
        $u = Utilisateur::getUtilisateurByNum(0);
        $pseudo = $u->get("pseudo");
        $mdp = $u->get("mdp");
        include("./vue/debut.php");
        include("./vue/Profil/profil.php");
        include("./vue/footer.html");
    }
}
?>