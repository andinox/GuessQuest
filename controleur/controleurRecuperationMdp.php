<?php

class controleurRecuperationMdp {

    public static function afficheRecuperationMdp() {
        $titre = "Recuperation Mdp";
        include("./vue/debut.php");
        include("./vue/recuperation_mdp/recuperation_mdp.html");
        include("./vue/footer.html");
    }
}