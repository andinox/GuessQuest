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
    }
} else {
          
    include("./vue/debut.php");
    echo "<a href='?c=newquiz'>new Quiz</a>"; 
    echo"<a href='?c=connexion'>connexion</a>";
    echo"<a href='?c=home'>home</a>";
    include("./vue/footer.html");  
}

?>
