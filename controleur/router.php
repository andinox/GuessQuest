<?php
require_once ("./config/connexion.php");

require_once ("controleur/controleurUtilisateur.php");
Connexion::connect();
if (controleurUtilisateur::sessionUtilisateur() != null) {
    $utilsateur = controleurUtilisateur::sessionUtilisateur();
    echo "<p>{$utilsateur}</p>";
} else {
    echo "<p>non connecter</p>";
}

if (isset($_GET["c"])) {
    switch($_GET["c"]) {
        case "newquiz":
            require_once("./controleur/controleurNewQuiz.php");
            ControleurNewQuiz::affiche();
            break;
        case "connexion":
            require_once("./controleur/controleurConnexion.php");
            
            if (isset($_GET["action"])) {
                if ($_GET["action"] == "check") {
                    controleurConnexion::connecterUtilisateur();
                }
            } else {
                controleurConnexion::afficheConnexion();
            }
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
            controleurProfil::afficheProfil();
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
            require_once("./controleur/controlerConnexionTest.php");
            controleurConnexionTest::afficheConnexionTest();
            break;
        default:
    }
} else {
          
    include("./vue/debut.php");
    echo "<style> body { display: flex;flex-direction: column;} </style>";
    echo"<a href='?c=profil'>Profil</a>";
    echo "<a href='?c=newquiz'>new Quiz</a>"; 
    echo"<a href='?c=connexion'>connexion</a>";
    echo"<a href='?c=home'>home</a>";
    echo"<a href='?c=contact'>contact</a>";
    echo"<a href='?c=recuperation_mdp'>recuperation_mdp</a>";
    echo"<a href='?c=creationCompte'>création compte</a>";
    echo"<a href='?c=connectionTest'>coTest</a>";
    include("./vue/footer.html");  
}

?>