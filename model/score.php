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
        return $tab[0];
    }

    public static function getScoreByIdQuizAndUser($id_Quiz, $id_Utilisateur){
        $sql = "SELECT * FROM Scores WHERE id_Quiz = :id_Quiz && id_Utilisateur = :id_Utilisateur";
        $req = Connexion::pdo()->prepare($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Score');
        $req->execute(array(':id_Quiz' => $id_Quiz, ':id_Utilisateur' => $id_Utilisateur));
        $tab = $req->fetchAll();
        if($tab == null){
            return 0;
        }else {
            return $tab[0];
        }
    }

    public static function setScoreByIdQuizAndUser($id_Quiz, $id_Utilisateur, $score){
        $sql = "UPDATE `scores` SET `score` = :score WHERE id_Quiz = :id_Quiz && id_Utilisateur = :id_Utilisateur;";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':id_Quiz' => $id_Quiz, ':id_Utilisateur' => $id_Utilisateur, ':score' => $score));
    }

    public static function getScoresById_Utilisateur($id_Utilisateur){
        $sql = "SELECT * FROM Scores WHERE id_Utilisateur = :id_Utilisateur";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':id_Utilisateur' => $id_Utilisateur));
        $tab = $req->fetchAll();
        return $tab;
    }
}

?>