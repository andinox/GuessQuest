<?php

require_once ("./model/model.php");
require_once ("./model/signalement.php");


class controleurAdminListeReport {

    public static function affiche(){
        $titre = "Signalement";
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
        include("./vue/adminListeReport/adminListeReport.html");
        include("./vue/footer.html");
    }
    
}