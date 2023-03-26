<?php

class ControleurCreationCompte {

    public static function afficheCreationCompte() {
        $titre = "Création Compte";
        include("./vue/debut.php");
        include("./vue/creation_compte/creationCompte.html");
        include("./vue/footer.html");
    }
}