<?php
class controleurMain {
    public static function affiche() {
        $titre = "main";
        include("./vue/debut.php");
        include("./vue/main/main.html");
        include("./vue/footer.html");
    }
}
