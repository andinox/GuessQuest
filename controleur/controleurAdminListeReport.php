<?php

require_once ("./model/model.php");
require_once ("./model/signalement.php");


class controleurAdminListeReport {

    public static function affiche(){
        $titre = "Signalement";
        include("./vue/debut.php");
        include("./vue/adminListeReport/adminListeReport.html");
        include("./vue/footer.html");
    }
    
    public static function lireSignalements(){
        $signalements = signalement::getSignalements();
        // Construction des lignes pour l'affichage
        $tabAff = array();
        foreach ($signalements as $key){
            $idReport = $key->get('Id_Signalement');
            $idQuiz = $key->get('id_Quiz');
            $idUtilisateur = $key->get('id_Utilisateur');
            
            $tabAff[] = "<div class='ligneReport'>Signalement n° $idReport : Quiz n° $idQuiz signalé par l'utilisateur n° $idUtilisateur</div>";
        }
        include("./vue/debut.php");
        include("./vue/adminListeReport/lesSignalements.html");
        include("./vue/footer.html");
    }

    public static function lireSignalementsByQuiz(){
        $signalements = signalement::getSignalementById_Quiz($_POST["id_quiz"]);
        // Construction des lignes pour l'affichage
        $tabAff = array();
        foreach ($signalements as $key){
            $idReport = $key->get('Id_Signalement');
            $idQuiz = $key->get('id_Quiz');
            $idUtilisateur = $key->get('id_Utilisateur');
            
            $tabAff[] = "<div class='ligneReport'>Signalement n° $idReport : Quiz n° $idQuiz signalé par l'utilisateur n° $idUtilisateur</div>";
        }
        include("./vue/debut.php");
        include("./vue/adminListeReport/lesSignalements.html");
        include("./vue/footer.html");
    }

    public static function lireSignalementsByUser(){
        $signalements = signalement::getSignalementById_Utilisateur($_POST["id_user"]);
        // Construction des lignes pour l'affichage
        $tabAff = array();
        foreach ($signalements as $key){
            $idReport = $key->get('Id_Signalement');
            $idQuiz = $key->get('id_Quiz');
            $idUtilisateur = $key->get('id_Utilisateur');
            
            $tabAff[] = "<div class='ligneReport'>Signalement n° $idReport : Quiz n° $idQuiz signalé par l'utilisateur n° $idUtilisateur</div>";
        }
        include("./vue/debut.php");
        include("./vue/adminListeReport/lesSignalements.html");
        include("./vue/footer.html");
    }
    
}