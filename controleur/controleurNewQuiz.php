<?php 

class ControleurNewQuiz {

    public static function affiche() {;
        $titre = "new Quiz";
        include("vue/debut.php");
        include("vue/new_quiz/section.html");
        include("vue/footer.html");
    }
}



?>