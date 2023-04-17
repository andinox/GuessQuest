<?php
require_once ("./controleur/controleurUtilisateur.php");
require_once ("./model/utilisateur.php");
class controleurMain {
    public static function affiche() {
        if (controleurutilisateur::sessionUtilisateur()) {
            $name = $_SESSION["pseudo"];
            if ($_SESSION["TypeOfConn"] == "compte") {
                $id = Utilisateur::getId_UtilisateurByPseudo($name);
                $img = Utilisateur::getImgProfil($id);
                $data = $img;
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
