<?php 
require_once ("./model/model.php");
require_once ("./model/utilisateur.php");

class controleurProfil {

    public static function afficheProfil(){
        $pseudo = $_SESSION["pseudo"];
        $u = Utilisateur::getUtilisateurByPseudo($pseudo);
        $pp = $u->get("image");
        $imgData = "data:image/png;base64," . base64_encode($pp);

        $titre = "Profil - $pseudo";
        include("./vue/debut.php");
        include("./vue/Profil/profil.php");
        include("./vue/footer.html");
    }
}
?>