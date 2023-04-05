<?php
require_once ("model/model.php");
require_once ("model/utilisateur.php");
require_once ("controleur/controleurUtilisateur.php");

class ControleurCreationCompte {

    public static function afficheCreationCompte() {


        $titre = "Création Compte";
        include("./vue/debut.php");
        include("./vue/creation_compte/creationCompte.html");
        include("./vue/footer.html");
    }

    public static function creerCompte() {
        $pseudo = $_POST["pseudo"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    
        try {
            Connexion::connect();
            $pdo = Connexion::pdo();
            $stmt = $pdo->prepare("INSERT INTO utilisateur (pseudo, mdp) VALUES (?,?)");
            $stmt->execute([$pseudo,$password]);
        } catch (PDOException $e) {
            echo "erreur de connexion : " . $e->getMessage() . "<br>";
        }
    }
    

}