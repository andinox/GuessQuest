<?php 

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
                        
    }
} else {
          
    include("./vue/debut.php");
    echo "<a href='?c=newquiz'>new Quiz</a>"; 
    echo"<a href='?c=connexion'>connexion</a>";
    echo"<a href='?c=home'>home</a>";
    echo"<a href='?c=contact'>contact</a>";
    echo"<a href='?c=recuperation_mdp'>recuperation_mdp</a>";
    include("./vue/footer.html");  
}
/*Test de GITHUB de Manaïa*/
?>
