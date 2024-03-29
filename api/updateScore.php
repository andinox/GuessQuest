<?php

header('Content-Type: application/json');
require_once("../config/connexion.php");
require_once("../model/model.php");
require_once("../model/score.php");
require_once("../model/utilisateur.php");
Connexion::connect();

// Si l'url contient "idQuiz"
if (isset($_GET["idQuiz"]) && isset($_GET["pseudo"]) && isset($_GET["score"])){
    // On reprend toutes les valeurs
    $id_Quiz = $_GET["idQuiz"];
    $pseudo = $_GET["pseudo"];
    $score = $_GET["score"];

    $id_Utilisateur = Utilisateur::getId_UtilisateurByPseudo($pseudo);

    if(Score::getScoreByIdQuizAndUser($id_Quiz, $id_Utilisateur) !== null){
        $sql = "UPDATE scores SET score = :score WHERE id_Utilisateur = :id_Utilisateur && id_Quiz = :id_Quiz;";
    }else{
        $sql = "INSERT INTO scores (score, id_Quiz, id_Utilisateur) VALUES (:score, :id_Quiz, :id_Utilisateur);";
    }
    // On met à jour le score dans la BD
    $req = Connexion::pdo()->prepare($sql);
    $req->execute(array(':id_Quiz' => $id_Quiz, ':id_Utilisateur' => $id_Utilisateur, ':score' => $score));
}