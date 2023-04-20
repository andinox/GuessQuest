<?php
require_once ("./controleur/controleurUtilisateur.php");
require_once ("./model/utilisateur.php");
require_once ("./model/quiz.php");

class controleurMain {
    public static function affiche() {
        if (controleurutilisateur::sessionUtilisateur()) {
            $use = "";
            $data = "./img/profil.png";
            $name = $_SESSION["pseudo"];
            $tabAff = array();
            if ($_SESSION["TypeOfConn"] == "compte") {
                $id = Utilisateur::getId_UtilisateurByPseudo($name);
                $img = Utilisateur::getImgProfil($id);
                $data = "data:image/png;base64," . base64_encode($img);
                $lesQuiz = quiz::getQuiz();
                foreach ($lesQuiz as $key) {
                    $titreQuiz = $key->get('titreQuiz');
                    $imgQuiz = $key->get('image');
                    $imgData = "data:image/png;base64," . base64_encode($imgQuiz);
                    $quizBtn = "<button class=\"btn-img-quiz\"><img src=\"$imgData\" class=\"quiz-image\"></button>";
                    //$supprimerBtn = '<form method="post" action="./index.php?controleur=controleurAdminListeReport&action=supprimerQuiz"><input type="hidden" name="idQuiz" value="'.$idQuiz.'"><button class="btn" type="submit">'."❌".'</button></form>';
                    $tabAff[] = "<button class=\"btn-img-quiz\"><img src=\"$imgData\" class=\"quiz-image\"></button>";
                }
                
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
