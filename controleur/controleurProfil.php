<?php 
require_once ("./model/model.php");
require_once ("./model/utilisateur.php");

class controleurProfil {

    public static function afficheProfil(){
        $pseudo = $_SESSION["pseudo"];
        $u = Utilisateur::getUtilisateurByPseudo($pseudo);
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