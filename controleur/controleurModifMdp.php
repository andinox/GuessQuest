<?php 

class controleurModifMdp {

    public static function afficheModifMdp() {;

        $titre = "Modification Mdp";
        include("vue/debut.php");
        include("vue/modifier_mdp/modifierMdp.html");
        include("vue/footer.html");
    }
}



?>