<?php

class controleurHome {

    public static function afficheHome() {
        $titre = "Home";
        include("./vue/debut.php");
        include("./vue/home.html");
        include("./vue/footer.html");
    }
}