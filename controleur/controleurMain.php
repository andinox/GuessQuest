<?php
require_once ("./controleur/controleurUtilisateur.php");
require_once ("./model/utilisateur.php");
class controleurMain {
    public static function affiche() {
        if (controleurutilisateur::sessionUtilisateur()) {
            $use = "";
            $data = "./img/profil.png";
            $name = $_SESSION["pseudo"];
            if ($_SESSION["TypeOfConn"] == "compte") {
                $id = Utilisateur::getId_UtilisateurByPseudo($name);
                $img = Utilisateur::getImgProfil($id);
                $data = "data:image/png;base64,$img";
            } else {
                $use = "display:none";
            }
            $titre = "main";
            include("./vue/debut.php");
            include("./vue/main/main.html");
            include("./vue/footer.html");
        } else {
            header("Location: index.php?controleur=controleurconnexion&action=afficheConnexion");
        }

    }
}
