<?php
require_once ("./controleur/controleurUtilisateur.php");
require_once ("./model/utilisateur.php");
require_once ("./model/quiz.php");
class controleurMesQuiz {
    public static function affiche() {
        $titre = "Mes Quiz";
        if (controleurutilisateur::sessionUtilisateur()) {
            $name = $_SESSION["pseudo"];
            $data = "./img/profil.png";
            if ($_SESSION["TypeOfConn"] == "compte") {
                $id = Utilisateur::getId_UtilisateurByPseudo($name);
                $img = Utilisateur::getImgProfil($id);
                // $data = "data:image/png;base64,". $img;
                // Echanger ces 2 lignes si vous voyez la photo de profil bugué
                $quiz = Quiz::getQuizByUserId($id);
                $data = "data:image/png;base64,". base64_encode($img);
                    
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