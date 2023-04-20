<?php
require_once ("./controleur/controleurUtilisateur.php");
require_once ("./model/utilisateur.php");
require_once ("./model/quiz.php");
class controleurMesQuiz {
    public static function affiche() {
        $titre = "Mes Quiz";
        if (controleurutilisateur::sessionUtilisateur()) {
            if ($_SESSION["TypeOfConn"] == "compte") {
                $use = "";
                $data = "./img/profil.png";
                $name = $_SESSION["pseudo"];
                $id = Utilisateur::getId_UtilisateurByPseudo($name);
                $img = Utilisateur::getImgProfil($id);
                $data = "data:image/png;base64," . base64_encode($img);

                    
            } else {
                header("Location: index.php?controleur=controleurconnexion&action=afficheConnexion");
            }
        } else {
            header("Location: index.php?controleur=controleurconnexion&action=afficheConnexion");
        }
        include("./vue/debut.php");
        include "./vue/mesquiz/homequiz.html";
        include("./vue/footer.html");
    }
}