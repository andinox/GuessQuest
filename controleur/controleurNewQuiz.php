<?php

require_once ("model/model.php");
require_once ("model/utilisateur.php");
require_once ("controleur/controleurUtilisateur.php");
class controleurNewQuiz {


    public static function affiche() {
        if (controleurUtilisateur::sessionUtilisateur() != null) {
            $utilsateur = controleurUtilisateur::sessionUtilisateur();
            echo "<p>{$utilsateur}</p>";
        } else {
            echo "<p>non connecter</p>";
        }
        $login = "Andinox";
        $mdp = "azerty";
        $b = Utilisateur::checkMDP($login, $mdp);
        $q = isset($_GET["quiz"]);

        if ($b && $q) {
            $quizID = $_GET["quiz"];
        } elseif ($b) {
            $u = Utilisateur::ajouteQuizz(0);

        }

        $titre = "new Quiz";
        include("vue/debut.php");
        include("vue/new_quiz/section.html");
        include("vue/footer.html");
    }
}



?>