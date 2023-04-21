<?php 
require_once ("./model/model.php");
require_once ("./model/utilisateur.php");
require_once ("./model/quiz.php");
require_once ("./model/question.php");
require_once ("./model/reponse.php");
require_once ("./model/score.php");

class controleurQuiz {

    public static function afficheStart(){

        if (isset($_POST["idQuiz"])) {
            $idQuiz = $_POST["idQuiz"];
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
            $imgUser = $u->get("image");
            $imgUser = "data:image/png;base64," . base64_encode($imgUser);

            //Récupération du score sur ce quiz
            $score = Score::getScoreByIdQuizAndUser($idQuiz,$idUser);
            if($score !== 0){
                $txtScore = $score->get("score");
                $txtScore .= "/". count($tabTxtQuestions);
            }else{
                $txtScore = $score."/".count($tabTxtQuestions);;
            }
        } else{
            $imgUser = "./img/profil.png";
        }
        
        //Récupération des informations sur le quiz
        $imgQuiz = $quiz->get("image");
        $imgData = "data:image/png;base64," . base64_encode($imgQuiz);
        $couleurQuiz = $quiz->get("couleur");

        include("./vue/debut.php");
        include("./vue/Quiz/startQuiz.php");
        include("./vue/footer.html");
    }




    public static function afficheQuiz(){

        if (isset($_GET["idQuiz"])) {
            $idQuiz = $_GET["idQuiz"];
        }
        else{
            $idQuiz = 1;
        }

        $pseudo = $_SESSION["pseudo"];

        //Récupération du quiz par l'id
        $quiz = Quiz::getQuizById($idQuiz);
        $titreQuiz = $quiz->get("titreQuiz");
        $titre = $titreQuiz;
        $couleurHex = $quiz->get("couleur");

        // Supprime le caractère # s'il est présent
        $hex = str_replace('#', '', $couleurHex);

        // Extraire les valeurs de rouge, vert et bleu de la chaîne hexadécimale
        $red = hexdec(substr($hex, 0, 2));
        $green = hexdec(substr($hex, 2, 2));
        $blue = hexdec(substr($hex, 4, 2));

        // Retourne les valeurs RGB sous forme de tableau
        $couleurHex = "background-color: rgb($red, $green, $blue)";

        include("./vue/debut.php");
        include("./vue/Quiz/quiz.php");
        include("./vue/footer.html");
    }




    public static function afficheEndQuiz(){

        if (isset($_GET["idQuiz"])) {
            $idQuiz = $_GET["idQuiz"];
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
            $imgUser = $u->get("image");
            $imgUser = "data:image/png;base64," . base64_encode($imgUser);

            //Récupération du score sur ce quiz
            $score = Score::getScoreByIdQuizAndUser($idQuiz,$idUser);
            if($score !== 0){
                $txtScore = $score->get("score");
                $txtScore .= "/". count($tabTxtQuestions);
            }else{
                $txtScore = $score."/".count($tabTxtQuestions);;
            }
        } else{
            $imgUser = "./img/profil.png";
        }
        
        //Récupération des informations sur le quiz
        $imgQuiz = $quiz->get("image");
        $imgData = "data:image/png;base64," . base64_encode($imgQuiz);
        $couleurQuiz = $quiz->get("couleur");

        include("./vue/debut.php");
        include("./vue/Quiz/endQuiz.php");
        include("./vue/footer.html");
    }
}
