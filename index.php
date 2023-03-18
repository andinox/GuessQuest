<?php 

if (isset($_GET["c"])) {
    switch($_GET["c"]) {
        case "newquiz":
            require_once("./controleur/controleurNewQuiz.php");
            ControleurNewQuiz::affiche();
            break;
    }
} else {
    
        
    include("./vue/debut.php");
    echo "<a href='?c=newquiz'>new Quiz</a>";  
    include("./vue/footer.html");  
}

?>
