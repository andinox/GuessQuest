<?php 
require_once ("./model/model.php");
require_once ("./model/utilisateur.php");
require_once ("./model/quiz.php");
require_once ("./model/question.php");

class controleurQuiz {

    public static function afficheStart(){
        $id = 1;
        //Récupération du quiz par l'id
        $quiz = Quiz::getQuizById($id);
        $titre = $quiz->get("titreQuiz");
        //Récupération des questions par l'id du quiz ($questions = un tableau de question)
        $questions = Question::getQuestionsByIdQuiz($id);
        //Tableau avec les textes des questions
        $tabTxtQuestions = array();
        foreach($questions as &$value){
            $txtQuestion = $value->get("textQuestion");
            array_push($tabTxtQuestions, $txtQuestion);
        }
        include("./vue/debut.php");
        include("./vue/Quiz/startQuiz.php");
        include("./vue/footer.html");
    }
}
?>