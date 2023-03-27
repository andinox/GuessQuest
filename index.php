<?php 
session_start();
//d
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
            case "contact":
                require_once("./controleur/controleurContact.php");
                controleurContact::afficheContact();
                break;
            case "recuperation_mdp":
                require_once("./controleur/controleurRecuperationMdp.php");
                controleurRecuperationMdp::afficheRecuperationMdp();
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
        case "connectionTest":
            require_once("./controleur/controleurConnectionTest.php");
            controleurConnexionTest::afficheConnexionTest();
            break;
        default:
    }
} else {
          
    include("./vue/debut.php");
    echo "<a href='?c=newquiz'>new Quiz</a>"; 
    echo"<a href='?c=connexion'>connexion</a>";
    echo"<a href='?c=home'>home</a>";
    echo"<a href='?c=contact'>contact</a>";
    echo"<a href='?c=recuperation_mdp'>recuperation_mdp</a>";
    echo"<a href='?c=connectionTest'>coTest</a>";
    include("./vue/footer.html");  
    include("./vue/footer.html");
}
?>
