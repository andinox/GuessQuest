<?php

header('Content-Type: application/json');
require_once("../config/connexion.php");
Connexion::connect();

if (isset($_GET["pseudo"])){
    $pseudo = $_GET["pseudo"];

    $sql ="SELECT * FROM utilisateur WHERE pseudo = :pseudo";
    $req = Connexion::pdo()->prepare($sql);
    $req->execute(array(':pseudo' => $pseudo));

    if ($req->rowCount() > 0) {
         echo json_encode(array('valide' => true));
    } else {
         echo json_encode(array('valide' => false));
    }

}else {
    echo json_encode(array('valide' => 'error'));
}


?>