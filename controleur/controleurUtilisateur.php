<?php 
require_once ("./model/model.php");
require_once ("./model/utilisateur.php");

class controleurutilisateur {

    public static function affiche(){
        $titre = "Utilisateur";
        include("./vue/debut.php");
        include("./vue/profil.html");
        include("./vue/footer.html");
    }
    
    //recuperation du numUtilisateur par GET
    public static function sessionUtilisateur() {
        if (isset($_SESSION["pseudo"])) {
            return $_SESSION["pseudo"];
        } else {
            return null;
        }
    }

    //recuperation du numUtilisateur par session
    public static function getNumUtilisateur() {
        $pseudo = self::sessionUtilisateur();
        $id_Utilisateur = Utilisateur::getId_UtilisateurByPseudo($pseudo);
        return $id_Utilisateur;
    }


    //recuperation tableau information utilisateur 
    public static function getUtilisateur() {                   
        $id_utilisateur = self::getNumUtilisateur();
        if ($id_utilisateur != null) {
            $utilisateur = Utilisateur::getUtilisateurByNum($id_utilisateur);
            return $utilisateur;
        } else {
            return null;
        }
    }

    //changer mot de passe utilisateur
    public static function changerMdpUtilisateur() {
        $id_utilisateur = self::getNumUtilisateur();
        $utilisateur = self::getUtilisateur();
        $ancMdp = $utilisateur[2]->get("mdp");
        echo $ancMdp;
        echo $id_utilisateur;
        echo $utilisateur;
        $nvMdp = $_POST['new-password'];
        $ancMdpByPost = $_POST['current-password'];
        if ($ancMdpByPost == $ancMdp) {
            //Utilisateur::updateMdp($id_utilisateur, $nvMdp);
            echo "ça marche !";
            //header("Location: index.php?controleur=controleurModifMdp&action=afficheModifMdp");
        } else {
            //header("Location: index.php");
        }   
    }

}