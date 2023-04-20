<?php

require_once ("model/model.php");
require_once ("model/utilisateur.php");
require_once ("model/quiz.php");
require_once ("controleur/controleurUtilisateur.php");
class controleurNewQuiz {


    public static function affiche() {
        if (isset($_SESSION["TypeOfConn"]) && $_SESSION["TypeOfConn"] == "compte") {
            $name = $_SESSION["pseudo"];
            $id = Utilisateur::getId_UtilisateurByPseudo($name);
            $p = Utilisateur::ajouteQuizz($id);
            header("Location: index.php?controleur=controleurNewQuiz&action=afficheQuiz&id=$p");
        } else {
            header("Location: index.php?controleur=controleurconnexion&action=afficheConnexion");
        }
    }


    public static function afficheQuiz() {
        if (isset($_SESSION["TypeOfConn"]) && $_SESSION["TypeOfConn"] == "compte") {
            $name = $_SESSION["pseudo"];
            $id = Utilisateur::getId_UtilisateurByPseudo($name);
            if (isset($_GET["id"])) {
                $quiz = Quiz::getQuizById($_GET["id"]);
                $user = $_SESSION["pseudo"];
                $id_user = Utilisateur::getId_UtilisateurByPseudo($user);
                if ($id_user == $quiz->getid_Utilisateur()) {
                    $titre = "new Quiz";
                    include("vue/debut.php");
                    include("vue/new_quiz/section.php");
                    include("vue/footer.html");
                } else {
                    header("Location: index.php?controleur=controleurMain");
                }
            } else {
                header("Location: index.php?controleur=controleurMain");
            }
        } else {
            header("Location: index.php?controleur=controleurconnexion&action=afficheConnexion");
        }
    }


    public static function mondifQuiz() {
        if (isset($_SESSION["TypeOfConn"]) && $_SESSION["TypeOfConn"] == "compte") {
            $name = $_SESSION["pseudo"];
            $id = Utilisateur::getId_UtilisateurByPseudo($name);
            if (isset($_GET["id"])) {
                $id =$_GET["id"];
                $quiz = Quiz::getQuizById($_GET["id"]);
                $user = $_SESSION["pseudo"];
                $id_user = Utilisateur::getId_UtilisateurByPseudo($user);
                if ($id_user == $quiz->getid_Utilisateur()) {
                    if (isset($_POST["type"])) {
                        switch ($_POST["type"]) {
                            case "quizname":
                                Quiz::changeName($id,$_POST["name"]);
                                header("Location: index.php?controleur=controleurNewQuiz&action=afficheQuiz&id=$id");
                                break;
                            case "quizcolor":
                                Quiz::changeColor($id,$_POST["valeur"]);
                                header("Location: index.php?controleur=controleurNewQuiz&action=afficheQuiz&id=$id");
                                break;
                            case "changeimg":

                        }
                    }
                } else {
                    header("Location: index.php?controleur=controleurMain");
                }
            } else {
                header("Location: index.php?controleur=controleurMain");
            }
        } else {
            header("Location: index.php?controleur=controleurconnexion&action=afficheConnexion");
        }
    }
}





?>