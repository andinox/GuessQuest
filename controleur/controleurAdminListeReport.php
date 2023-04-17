<?php

require_once ("./model/model.php");
require_once ("./model/signalement.php");


class controleurAdminListeReport {

    public static function affiche(){
        $titre = "Signalement";
        include("./vue/debut.php");
        include("./vue/adminListeReport/adminListeReport.html");
        include("./vue/footer.html");
    }
}