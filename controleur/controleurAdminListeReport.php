<?php

require_once ("./model/model.php");
require_once ("./model/signalement.php");
require_once ("./model/utilisateur.php");
require_once ("./model/quiz.php");

class controleurAdminListeReport {

    public static function affiche(){
        $titre = "Signalement";
        $signalements = signalement::getSignalements();
        // Construction des lignes pour l'affichage
        $tabAff = array();
        foreach ($signalements as $key){
            $idQuiz = $key->get('id_Quiz');
            $idSignaleur = $key->get('id_Utilisateur');
            $idCreateur = quiz::getId_UtilisateurById_Quiz($idQuiz);

            $idReport = $key->get('Id_Signalement');
            $titreQuiz = '<form method="post" action="./???.php"><input type="hidden" name="idQuiz" value="'.$idQuiz.'"><button class="btn" type="submit">'.quiz::getTitreById_Quiz($idQuiz).'</button></form>';   
            $pseudoCreateur = '<form method="post" action="./???.php"><input type="hidden" name="idCreateur" value="'.$idCreateur.'"><button class="btn" type="submit">'.utilisateur::getPseudoById_Utilisateur($idCreateur).'</button></form>';   
            $pseudoSignaleur = '<form method="post" action="./???.php"><input type="hidden" name="idSignaleur" value="'.$idSignaleur.'"><button class="btn" type="submit">'.utilisateur::getPseudoById_Utilisateur($idSignaleur).'</button></form>';   
            $supprimerBtn = '<form method="post" action="./index.php?controleur=controleurAdminListeReport&action=supprimerQuiz"><input type="hidden" name="idQuiz" value="'.$idQuiz.'"><button class="btn" type="submit">'."❌".'</button></form>';
            $tabAff[] = "<tr><td class='tHeadItems'>$idReport</td><td class='tHeadItems'>$titreQuiz</td><td class='tHeadItems'>$pseudoCreateur</td><td class='tHeadItems'>$pseudoSignaleur</td><td class='tHeadItems'>$supprimerBtn</td></tr>";

        }
        include("./vue/debut.php");
        include("./vue/adminListeReport/adminListeReport.html");
        include("./vue/footer.html");
    }

    public static function supprimerQuiz(){
        $id_Quiz = $_POST['idQuiz'];
        quiz::deleteQuizReportedById_Quiz($id_Quiz);
        quiz::deleteQuizById_Quiz($id_Quiz);
        self::affiche();
        
    }
    
}