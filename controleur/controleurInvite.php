<?php

class controleurInvite {

    public static function afficheInvite() {
        $titre = "Invité";
        include("./vue/debut.php");
        include("./vue/connexion_invite/connexionInvite.html");
        include("./vue/footer.html");
    }
}

?>