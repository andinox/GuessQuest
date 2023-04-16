<?php 
require_once ("./model/model.php");
require_once ("./model/utilisateur.php");

class controleurProfil {

    public static function afficheProfil(){
        $u = Utilisateur::getUtilisateurByNum(0);
        $pseudo = $u->get("pseudo");
        $mdp = $u->get("mdp");
        $pp = $u->get("image");
        $titre = "Profil - $pseudo";
        include("./vue/debut.php");
        include("./vue/Profil/profil.php");
        include("./vue/footer.html");
    }

    public static function affiche() {
        
    }
}
?>