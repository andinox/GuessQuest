<?php

class ControleurContact {

    public static function afficheContact() {
        $titre = "Contact";
        include("./vue/debut.php");
        include("./vue/contact.html");
        include("./vue/footer.html");
    }
}