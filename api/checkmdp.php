<?php

header('Content-Type: application/json');
require_once("../config/connexion.php");
Connexion::connect();
if (isset($_GET["name"]) && isset($_GET["mdp"])) {
    $pseudo = $_GET["name"];
    $mdp = $_GET["mdp"];
    $requetePreparee = "SELECT * FROM Utilisateur WHERE pseudo = :p_tag and mdp = :m_tag;";
    $req_prep = Connexion::pdo()->prepare($requetePreparee);
    $valeurs = array(
        "p_tag"=> $pseudo,
        "m_tag" => $mdp
    );

    $req_prep->execute($valeurs);
    $tabUtilisateurs = $req_prep->fetchAll();

    if (sizeof($tabUtilisateurs) == 1) {

        echo json_encode(array('valide' => true));;
    } else{

        echo json_encode(array('valide' => false));
    }
} else {
    echo json_encode(array('valide' => 'error'));
}
?>