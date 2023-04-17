<?php 
class Utilisateur extends Model{
    protected $id_utilisateur;
    protected $pseudo;
    protected $mdp;
    protected $reponse;
    protected $image;
    protected $id_QuestionRecup;


    //check Utilisateur password
    public static function checkMDP($p,$m) {
		$requetePreparee = "SELECT * FROM Utilisateur WHERE pseudo = :p_tag and mdp = :m_tag;";
		$req_prep = Connexion::pdo()->prepare($requetePreparee);
		$valeurs = array(
            "p_tag"=> $p,
			"m_tag" => $m
		);

		$req_prep->execute($valeurs);
		$req_prep->setFetchMode(PDO::FETCH_CLASS,"Utilisateur");
		$tabUtilisateurs = $req_prep->fetchAll();

        if (sizeof($tabUtilisateurs) == 1) {
            return true;
        } else{
			return false;
        }
	}



    //utilisateur by numUtilisateur
    public static function getUtilisateurByNum($id_utilisateur) {
        $sql = "SELECT * FROM Utilisateur WHERE id_utilisateur = :id_utilisateur";
        $req = Connexion::pdo()->prepare($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $req->execute(array(':id_utilisateur' => $id_utilisateur));
        $tab = $req->fetchAll();
        return $tab[0];
    }

    //update mot de passe de l'utilisateur
    public static function updateMdp ($id_utilisateur, $mdp) {
        $sql = "UPDATE Utilisateur SET mdp = :mdp WHERE id_utilisateur = :id_utilisateur";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':id_utilisateur' => $id_utilisateur, ':mdp' => $mdp));
    }


    //get id_Utilisateur by pseudo
    public static function getId_UtilisateurByPseudo($pseudo) {
        $sql = "SELECT id_Utilisateur FROM Utilisateur WHERE pseudo = :pseudo";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':pseudo' => $pseudo));
        $tab = $req->fetchAll();
        return $tab[0][0];
    }

    public static function ajouteQuizz($id_utilisateur) {
    }
    public static function ajouteQuizz($id_utilisateur){
        $sql = "INSERT INTO `quiz` (`titreQuiz`, `dateCreation`, `visibilite`, `image`, `codesecret`, `numQuestion`, `type_id`, `id_Utilisateur`) VALUES ('NouveauQuiz', :Date, '0', '', NULL, NULL, '1', :id_utilisateur)";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':id_utilisateur' => $id_utilisateur, ':Date' => date("Y-m-d")));
    }

    public static function getId_QuestionRecupByPseudo($pseudo) {
        $sql = "SELECT id_QuestionRecup FROM Utilisateur WHERE pseudo = :pseudo";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':pseudo' => $pseudo));
        $tab = $req->fetchAll();
        return $tab[0][0];
    }

    public static function getReponseById_QuestionRecup($id_QuestionRecup) {
        $sql = "SELECT reponse FROM Utilisateur WHERE id_QuestionRecup = :id_QuestionRecup";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':id_QuestionRecup' => $id_QuestionRecup));
        $reponse = $req->fetchAll();
        return $reponse[0][0];
    }

    public static function getQuestionById_QuestionRecup($id_QuestionRecup) {
        $sql = "SELECT text_QuestionRecup FROM QuestionRecuperationMDP WHERE id_QuestionRecup = :id_QuestionRecup";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':id_QuestionRecup' => $id_QuestionRecup));
        $question = $req->fetchAll();
        return $question[0][0];
    }

    
}

?>
