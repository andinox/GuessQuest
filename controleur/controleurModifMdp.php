<?php 
require_once ("./controleur/controleurUtilisateur.php");
require_once ("./model/utilisateur.php");

class controleurModifMdp {

    public static function afficheModifMdp() {;

        $titre = "Modification Mdp";
        include("vue/debut.php");
        include("vue/modifier_mdp/modifierMdp.html");
        include("vue/footer.html");
    }


    //changer mot de passe utilisateur
    public static function changerMdpUtilisateur() {
        $id_utilisateur = controleurUtilisateur::getNumUtilisateur();
        $utilisateur = controleurUtilisateur::getUtilisateur();
        $ancMdp = $utilisateur->get("mdp");
        $nvMdp = $_POST['new-password'];
        $nvMdpConf = $_POST['new-password-confirm'];
        $ancMdpByPost = $_POST['current-password'];
        if ($ancMdpByPost == $ancMdp && $nvMdp == $nvMdpConf) {
            Utilisateur::updateMdp($id_utilisateur, $nvMdp);
            header("Location: index.php?controleur=controleurModifMdp&action=afficheModifMdp");
        } else {
            header("Location: index.php?controleur=controleurModifMdp&action=afficheModifMdp");
        }   
    }

}

?>