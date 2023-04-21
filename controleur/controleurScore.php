<?php 
require_once ("./model/model.php");
require_once ("./model/quiz.php");
require_once ("./model/score.php");
require_once ("./model/utilisateur.php");


class controleurScore {

    public static function afficheScore(){
        $titre = "Scores";
        $pseudo = $_SESSION["pseudo"];
        $u = Utilisateur::getUtilisateurByPseudo($pseudo);
        $pp = $u->get("image");
        $imgData = "data:image/png;base64," . base64_encode($pp);
        $id_Utilisateur = $u->get("id_Utilisateur");
        $scores = score::getScoresById_Utilisateur($id_Utilisateur);
        // Construction des lignes pour l'affichage
        $tabAff = array();
        foreach ($scores as $score){
            
            $idQuiz = $score["id_Quiz"];
            $idScore = $score["id_score"];
            $scoreQuiz = $score["score"];

            $titreQuiz = '<form method="post" action="./???.php"><input type="hidden" name="idQuiz" value="'.$idQuiz.'"><button class="btn-score" type="submit">'.quiz::getTitreById_Quiz($idQuiz).'</button></form>';   
            $tabAff[] = "<tr><td class='tHeadItemsScore'>$titreQuiz</td><td class='tHeadItemsScore'>$scoreQuiz</td></tr>";

        }
        include("./vue/debut.php");
        include("./vue/score/score.html");
        include("./vue/footer.html");
    }
}
