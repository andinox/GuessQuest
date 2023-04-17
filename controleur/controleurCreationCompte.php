<?php
require_once ("model/model.php");
require_once ("model/utilisateur.php");
require_once ("controleur/controleurUtilisateur.php");

class controleurCreationCompte {

    public static function afficheCreationCompte() {
        $titre = "Création Compte";
        include("./vue/debut.php");
        include("./vue/creation_compte/creationCompte.html");
        include("./vue/footer.html");
    }


    public static function creerCompte() {
        // Récupérer les données du formulaire
        $pseudo = $_POST["pseudo"];
        $mdp = $_POST["password"];
        $password_confirm = $_POST["password-confirm"];
        $id_QuestionRecup = $_POST["questionRecup"];
        $reponse = $_POST["reponse"];
        $image = $_POST["image"];

        // Vérifier que les mots de passe correspondent
        if($mdp == $password_confirm) {
        // Ajouter le nouvel utilisateur
        Utilisateur::ajouteUtilisateur($pseudo, $mdp, $reponse , $image, $id_QuestionRecup);

        header("Location: index.php?controleur=controleurCreationCompte&action=afficheCreationCompte");
    
        }


    }
  

}