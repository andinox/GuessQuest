<?php

class ControleurAccueil {

    public static function afficheAccueil() {
        $titre = "Home";
        include ("vue/debut.php");
    
        include ("vue/home.html");
        include ("vue/footer.html");
    }
}