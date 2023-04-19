<?php 
class Score extends Model{

    protected $id_score;
    protected $score;
    protected $date_score;
    protected $id_Quiz;
    protected $id_Utilisateur;

    //get tous les scores des utilisateurs d'un quiz by id_quiz
    public static function getScoresByIdQuiz($id_Quiz) {
        $sql = "SELECT * FROM Scores WHERE id_Quiz = :id_Quiz";
        $req = Connexion::pdo()->prepare($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Score');
        $req->execute(array(':id_Quiz' => $id_Quiz));
        $tab = $req->fetchAll();
        return $tab;
    }

    public static function getScoreByIdQuizAndUser($id_Quiz, $id_Utilisateur){
        $sql = "SELECT score FROM Scores WHERE id_Quiz = :id_Quiz && id_Utilisateur = :id_Utilisateur";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':id_Quiz' => $id_Quiz, ':id_Utilisateur' => $id_Utilisateur));
        $tab = $req->fetchAll();
        return $tab[0][0];
    }

}

?>