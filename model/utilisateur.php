<?php 
class Utilisateur extends Model{
    protected $id_utilisateur;
    protected $pseudo;
    protected $mdp;
    protected $reponse;
    protected $image;
    protected $id_QuestionRecup;


    //check Utilisateur password
    public static function checkMDP($m) {
		$requetePreparee = "SELECT * FROM Utilisateur WHERE mdp = :m_tag;";
		$req_prep = Connexion::pdo()->prepare($requetePreparee);
		$valeurs = array(
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
        return $tab;
    }

    //update mot de passe de l'utilisateur
    public static function updateMdp ($id_utilisateur, $mdp) {
        $sql = "UPDATE Utilisateur SET mdp = :mdp WHERE id_utilisateur = :id_utilisateur";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':id_utilisateur' => $id_utilisateur, ':mdp' => $mdp));
    }
}

?>