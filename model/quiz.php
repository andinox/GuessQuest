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

}

?>