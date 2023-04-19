<?php 
require_once ("./model/model.php");
require_once ("./model/utilisateur.php");
require_once ("./model/quiz.php");
require_once ("./model/question.php");
require_once ("./model/reponse.php");
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

        if($_SESSION["TypeOfConn"] == "compte"){
            $u = Utilisateur::getUtilisateurByPseudo($pseudo);
            $idUser = $u->get("id_Utilisateur");
            $imgUser = "data:image/jpeg;base64,";
            $imgUser .= $u->get("image");
            //Récupération du score sur ce quiz
            $score = Score::getScoreByIdQuizAndUser($idQuiz,$idUser);
            $score .= "/". count($tabTxtQuestions);
        } else{
            $imgUser = "./img/profil.png";
        }
        
        //Récupération des informations sur le quiz
        $imgQuiz = $quiz->get("image");
        $couleurQuiz = $quiz->get("couleur");

        include("./vue/debut.php");
        include("./vue/Quiz/startQuiz.php");
        include("./vue/footer.html");
    }

    public static function afficheQuiz(){
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
        //Tableau avec les textes et les id des questions
        $tabTxtQuestions = array();
        $tabIdQuestions = array();
        $tabImagesQuestions = array();
        foreach($questions as &$value){
            $txtQuestion = $value->get("textQuestion");
            array_push($tabTxtQuestions, $txtQuestion);

            $IdQuestion = $value->get("id_Question");
            array_push($tabIdQuestions, $IdQuestion);

            if(!empty($value->get("image"))){
                array_push($tabImagesQuestions, $value->get("image"));
            }
        }

        $id_Question = $tabIdQuestions[0];
        //Récupération des réponse par l'id de la question ($questions = un tableau de question)
        $reponses = Reponse::getReponsesByIdQuestion($id_Question);
        //Tableau avec les textes des réponses
        $tabTxtReponse = array();
        foreach($reponses as &$value){
            $txtReponse = $value->get("text");
            array_push($tabTxtReponse, $txtReponse);
        }

        include("./vue/debut.php");
        include("./vue/Quiz/quiz.php");
        include("./vue/footer.html");
    }
}
