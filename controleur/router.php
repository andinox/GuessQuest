<?php
require_once ("./config/connexion.php");
Connexion::connect();
$controleur = "controleurConnexion";
$action = "afficheConnexion";
<<<<<<< Updated upstream

$tableauControleur = ["controleurNewQuiz","controleurConnexion","controleurHome","controleurContact","controleurRecuperationMdp","controleurProfil",
"controleurInvite","controleurCreationCompte","controleurModifMdp","controleurConnexionTest","controleurMain"];
$actionParDefaut = array(
    "controleurNewQuiz" => "affiche",
    "controleurConnexion" => "afficheConnexion",
    "controleurHome" => "afficheHome",
    "controleurMain" => "affiche",
    "controleurContact" => "afficheContact",
    "controleurRecuperationMdp" => "afficheRecuperationMdp",
    "controleurProfil" => "affiche",
    "controleurInvite" => "afficheInvite",
    "controleurCreationCompte" => "afficheCreationCompte",
    "controleurModifMdp" => "afficheModifMdp",
    "controleurConnexionTest" => "afficheConnexionTest"

);


if (isset($_GET["controleur"]) && in_array($_GET["controleur"],$tableauControleur)) {
    $controleur = $_GET["controleur"];
}
require_once("./controleur/$controleur.php");

if (isset($_GET["action"]) && in_array($_GET["action"],get_class_methods($controleur))) {
    $action = $_GET["action"];
} else {
    $action = $actionParDefaut[$controleur];
}

=======

$tableauControleur = ["controleurNewQuiz","controleurConnexion","controleurHome","controleurContact","controleurRecuperationMdp","controleurProfil",
"controleurInvite","controleurCreationCompte","controleurModifMdp","controleurConnexionTest","controleurMain"];
$actionParDefaut = array(
    "controleurNewQuiz" => "affiche",
    "controleurConnexion" => "afficheConnexion",
    "controleurHome" => "afficheHome",
    "controleurMain" => "affiche",
    "controleurContact" => "afficheContact",
    "controleurRecuperationMdp" => "afficheRecuperationMdp",
    "controleurProfil" => "affiche",
    "controleurInvite" => "afficheInvite",
    "controleurCreationCompte" => "afficheCreationCompte",
    "controleurModifMdp" => "afficheModifMdp",
    "controleurConnexionTest" => "afficheConnexionTest"

);


if (isset($_GET["controleur"]) && in_array($_GET["controleur"],$tableauControleur)) {
    $controleur = $_GET["controleur"];
}
require_once("./controleur/$controleur.php");

if (isset($_GET["action"]) && in_array($_GET["action"],get_class_methods($controleur))) {
    $action = $_GET["action"];
} else {
    $action = $actionParDefaut[$controleur];
}
  
>>>>>>> Stashed changes
$controleur::$action();
?>

