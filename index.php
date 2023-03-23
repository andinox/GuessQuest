<?php 
session_start();

if (isset($_GET["c"])) {
    switch($_GET["c"]) {
        case "newquiz":
            require_once("./controleur/controleurNewQuiz.php");
            ControleurNewQuiz::affiche();
            break;
        case "connexion":
            require_once("./controleur/controleurConnexion.php");
            controleurConnexion::afficheConnexion();
            break;
        case "home":
            require_once("./controleur/controleurHome.php");
            controleurHome::afficheHome();
            break;
        case "profil":
            require_once("./controleur/controleurProfil.php");
            controleurProfil::affiche();
            break;
        case "invite":
            require_once("./controleur/controleurInvite.php");
            controleurInvite::afficheInvite();
            break;
        case "creationCompte":
            require_once("./controleur/controleurCreationCompte.php");
            controleurCreationCompte::afficheCreationCompte();
            break;
        case "modifMdp":
            require_once("./controleur/controleurModifMdp.php");
            controleurModifMdp::afficheModifMdp();
            break;
    }
} else {
          
    include("./vue/debut.php");
    echo "<a href='?c=newquiz'>new Quiz</a>"; 
    echo"<a href='?c=connexion'>connexion</a>";
    echo"<a href='?c=home'>home</a>";
    include("./vue/footer.html");
}
?>
