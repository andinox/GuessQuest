<?php 
require_once ("./model/model.php");
require_once ("./model/utilisateur.php");

class ControleurNewQuiz {

    public static function affiche() {;

        $login = "Andinox";
        $mdp = "azerty";
        $b = Utilisateur::checkMDP($login, $mdp);
        $q = isset($_GET["quiz"]);

        if ($b && $q) {
            $quizID = $_GET["quiz"];
        } elseif ($b) {
            $u = Utilisateur::ajouteQuizz($login);

        }

        $titre = "new Quiz";
        include("vue/debut.php");
        include("vue/new_quiz/section.html");
        include("vue/footer.html");
    }
}



?>