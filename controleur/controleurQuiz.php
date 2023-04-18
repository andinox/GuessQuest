<?php 
require_once ("./model/model.php");
require_once ("./model/utilisateur.php");
require_once ("./model/quiz.php");
require_once ("./model/question.php");
require_once ("./model/score.php");

class controleurQuiz {

    public static function afficheStart(){

        if (isset($_POST["identifiant"])) {
            $idQuiz = $_POST["identifiant"];
        }
        else{
            $idQuiz = 1;
        }

        //Récupération du quiz par l'id
        $quiz = Quiz::getQuizById($idQuiz);
        $titre = $quiz->get("titreQuiz");
        //Récupération des questions par l'id du quiz ($questions = un tableau de question)
        $questions = Question::getQuestionsByIdQuiz($idQuiz);
        //Tableau avec les textes des questions
        $tabTxtQuestions = array();
        foreach($questions as &$value){
            $txtQuestion = $value->get("textQuestion");
            array_push($tabTxtQuestions, $txtQuestion);
        }

        $pseudo = $_SESSION["pseudo"];
        $u = Utilisateur::getUtilisateurByPseudo($pseudo);
        $idUser = $u->get("id_Utilisateur");
        $imgUser = $u->get("image");
        //Récupération des scores sur ce quiz
        $scores = Score::getScoresByIdQuizAndUser($idQuiz,$idUser);
        /*Tableau des scores sur ce quiz
        $tabScores = array();
        foreach($scores as $value){
            $score = $value->get("score");
            array_push($tabScores, $score);
        }*/

        $imgQuiz = $quiz->get("image");
        $couleurQuiz = $quiz->get("couleur");

        include("./vue/debut.php");
        include("./vue/Quiz/startQuiz.php");
        include("./vue/footer.html");
    }

    public static function afficheQuiz(){
        include("./vue/debut.php");
        include("./vue/Quiz/quiz.php");
        include("./vue/footer.html");
    }
}
