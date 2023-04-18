<?php

class controleurMesQuiz {
    public static function affiche() {
        $titre = "Mes Quiz";
        include("./vue/debut.php");
        include("./vue/footer.html");
    }
}