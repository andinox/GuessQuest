<?php

class controleurRecuperationMdp {

    public static function afficheRecuperationMdp() {
        $titre = "Recuperation Mdp";
        $question = "";
        include("./vue/debut.php");
        include("./vue/recuperation_mdp/recuperation_mdp.html");
        include("./vue/footer.html");
    }

    public static function afficherQuestionMdp($pseudo){
        // Récupérer les données du formulaire
        $pseudo = $_POST["pseudo"];

        $utilisateur = utilisateur::getUtilisateurByPseudo($pseudo);
        $idQuestionRecup = $utilisateur->get("id_QuestionRecup");
        $question = utilisateur::getQuestionById_QuestionRecup($idQuestionRecup);

        // Afficher la question
        self::afficheRecuperationMdp();
    }

    public static function verifieReponseQuestionMdp($pseudo, $reponseDonnee){
        $reponseDonnee = $_POST["reponse"];
        $reponse = utilisateur::getReponseById_QuestionRecup($idQuestionRecup);
        //trouver le mdp de l'utilisateur

        if($reponse == $reponseDonnee){
            echo '<script>document.querySelector(".MdpTrouver").innerHTML = "' . $mdp . '";</script>'; //l'afficher sur la page
        }else{
            // Afficher "Mauvaise réponse, si vous ne vous rappelez plus de votre réponse, contactez le support (lien vers la page de contact)"
        }
    }
}