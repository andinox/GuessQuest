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
                    $idQuiz = $key->get('id_Quiz');
                    $titreQuiz = $key->get('titreQuiz');
                    $imgQuiz = $key->get('image');
                    $imgData = "data:image/png;base64," . base64_encode($imgQuiz);

                    $quizBtn = '<form method="post" action="./index.php?controleur=controleurQuiz&action=afficheStart"><input type="hidden" name="identifiant" value="'.$idQuiz.'"><button class="btn-img-quiz" type="submit">'."<img src=\"$imgData\" class=\"quiz-image\"><b class=\"titre-quiz-btn\" style=\"text-transform:uppercase\" >$titreQuiz</b>".'</button></form>';
                    $tabAff[] = $quizBtn;
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
