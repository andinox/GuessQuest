<?php

class controleurRecuperationMdp {

    public static function afficheRecuperationMdp() {
        $titre = "Recuperation Mdp";
        $question = "";
        $pseudo = "";
        include("./vue/debut.php");
        include("./vue/recuperation_mdp/recuperation_mdp.html");
        include("./vue/footer.html");
    }

    public static function afficherQuestionMdp(){
        // Récupérer les données du formulaire
        $pseudo = $_POST["pseudo"];

        $utilisateur = utilisateur::getUtilisateurByPseudo($pseudo);
        $idQuestionRecup = $utilisateur->get("id_QuestionRecup");
        $question = utilisateur::getQuestionById_QuestionRecup($idQuestionRecup);

        // Afficher la question
        self::afficheRecuperationMdp();
    }

    public static function verifieReponseQuestionMdp(){
        // Récupérer les données du formulaire
        $reponseDonnee = $_POST["reponse"];
        $reponse = utilisateur::getReponseById_QuestionRecup($idQuestionRecup);

        // Afficher le mdp si la réponse à la question est correcte
        if($reponse == $reponseDonnee){
            $mdp = utilisateur::getMdpByPseudo($pseudo);
            echo '<script>document.querySelector(".MdpTrouver").innerHTML = "' . $mdp . '";</script>'; 
        } else {
            echo '<script>document.querySelector(".MdpTrouver").innerHTML = "' . "Mauvaise réponse" . '";</script>';
        }
    }
}