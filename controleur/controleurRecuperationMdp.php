<?php

class controleurRecuperationMdp {

    public static function afficheRecuperationMdp() {
        $titre = "Recuperation Mdp";
        include("./vue/debut.php");
        include("./vue/recuperation_mdp/recuperation_mdp.html");
        include("./vue/footer.html");
    }

    public static function afficherQuestionMdp($pseudo){
        $id_question = utilisateur::getId_QuestionRecupByPseudo($pseudo);
        $question = utilisateur::getQuestionById_QuestionRecup($id_question);
        // Afficher la question
    }

    public static function verifieReponseQuestionMdp($pseudo, $reponseDonnee){
        $id_question = utilisateur::getId_QuestionRecupByPseudo($pseudo);
        $reponse = utilisateur::getReponseById_QuestionRecup($id_question);

        if($reponse == $reponseDonnee)
            // Nouvelle page pour changer de MDP
        else
            // Afficher "Mauvaise réponse, si vous ne vous rappelez plus de votre réponse, contactez le support (lien vers la page de contact)"

    }

    public static function changerMdp($pseudo, $mdp){
        $id_utilisateur = utilisateur::getId_UtilisateurByPseudo($pseudo);
        utilisateur::updateMdp($id_utilisateur, $mdp);
    }

}