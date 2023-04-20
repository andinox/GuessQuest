<?php

header('Content-Type: application/json');
require_once("../config/connexion.php");
require_once("../model/model.php");
require_once("../model/question.php");
require_once("../model/reponse.php");
Connexion::connect();

// Si l'url contient "idQuiz"
if (isset($_GET["idQuiz"])){
    // La valeur de idQuiz va dans $id_Quiz
    $id_Quiz = $_GET["idQuiz"];

    // On récupère toutes les questions du quiz
    $sql = "SELECT * FROM Question WHERE id_Quiz = :id_Quiz";
    $req = Connexion::pdo()->prepare($sql);
    $req->setFetchMode(PDO::FETCH_CLASS, 'Question');
    $req->execute(array(':id_Quiz' => $id_Quiz));
    $tabQuestionsQuiz = $req->fetchAll();

    // Initialisation du tableau final (questions avec ses réponses)
    $tabQuestionsReponses = array();

    // Pour chaque question:
    foreach($tabQuestionsQuiz as $question){
        // Pour créé les clés dans le tableau associatif
        $i = 0;
        // Valeur pour garder la réponse qui est correct lors du parcours
        $reponseC = 0;

        // On récupère l'id et le texte de la question 
        $id_Question = $question->get("id_Question");
        $textQuestion = $question->get("textQuestion");


        // On récupère toutes ses réponses dans la Base de Donnée 
        $sql = "SELECT * FROM Reponse WHERE id_Question = :id_Question";
        $req = Connexion::pdo()->prepare($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Reponse');
        $req->execute(array(':id_Question' => $id_Question));
        $tabReponses = $req->fetchAll();

        //Un tableau comprenant plusieurs array() avec comme clé textQuestion et ses réponses
        $tabQuestionReponse["textQuestion"] =  $textQuestion;

        // On associe le texte de la question à toutes ses réponses possible
        foreach($tabReponses as $reponse){
            $txtReponse = $reponse->get("text");
            $reponseCorrect = $reponse->get("valide");

            $tabQuestionReponse["reponse". $i] =  $txtReponse;
            //Si c'est une réponse correct alors la clé reponseCorrect est associé à l'index de la bonne réponse
            if($reponseCorrect){
                $tabQuestionReponse["reponseCorrect"] =  $i;
            }

            $i++;
        }

        array_push($tabQuestionsReponses, $tabQuestionReponse);

    }
    echo json_encode($tabQuestionsReponses);
}

?>