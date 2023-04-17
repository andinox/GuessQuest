<?php
	require_once("utilisateur.php");
	$pseudoRenseigne = $_POST["pseudoRenseigne"];

	$id_QuestionRecup = getId_QuestionRecupByPseudo($pseudoRenseigne);

    if($pseudo != null){
        $question = getQuestionById_QuestionRecup($id_QuestionRecup)
        $reponseCorrect = getReponseById_QuestionRecup($id_QuestionRecup);

        echo $question;
    }
    else {
        echo"<p>Utilisateur introuvable</p>";
    }
?>