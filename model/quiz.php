<?php 
class Quiz extends Model{

    protected $id_Quiz;
    protected $titreQuiz;
    protected $dateCreation;
    protected $visibilite;
    protected $image;
    protected $couleur;
    protected $codesecret;
    protected $type_id;
    protected $id_Utilisateur;
    protected $questions;

    //get quiz by id_quiz
    public static function getQuizById($id_Quiz) {
        $sql = "SELECT * FROM Quiz WHERE id_Quiz = :id_Quiz";
        $req = Connexion::pdo()->prepare($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Quiz');
        $req->execute(array(':id_Quiz' => $id_Quiz));
        $tab = $req->fetchAll();
        return $tab[0];
    }

    public static function getTitreById_Quiz($id_Quiz) {
        $sql = "SELECT titreQuiz FROM Quiz WHERE id_Quiz = :id_Quiz";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':id_Quiz' => $id_Quiz));
        $tab = $req->fetchAll();
        return $tab[0][0];
    }

    public static function getId_UtilisateurById_Quiz($id_Quiz) {
        $sql = "SELECT id_Utilisateur FROM Quiz WHERE id_Quiz = :id_Quiz";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':id_Quiz' => $id_Quiz));
        $tab = $req->fetchAll();
        return $tab[0][0];
    }

    public static function deleteQuizReportedById_Quiz($id_Quiz){
        $sql = "DELETE FROM Signalement WHERE id_Quiz = :id_Quiz";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':id_Quiz' => $id_Quiz));
    }

    public static function deleteQuizById_Quiz($id_Quiz){
        $sql = "DELETE FROM Quiz WHERE id_Quiz = :id_Quiz";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':id_Quiz' => $id_Quiz));
    }
}

?>