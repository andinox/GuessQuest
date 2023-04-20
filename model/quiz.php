<?php 
class Quiz extends Model{

    public $id_Quiz;
    public $titreQuiz;
    public $dateCreation;
    public $visibilite;
    public $image;
    public $couleur;
    public $codesecret;
    public $type_id;
    public $id_Utilisateur;
    public $questions;

    //get quiz by id_quiz

    public function getid_Utilisateur() {
        return $this->id_Utilisateur;
    }

    public static function getQuizById($id_Quiz) {
        $sql = "SELECT * FROM Quiz WHERE id_Quiz = :id_Quiz";
        $req = Connexion::pdo()->prepare($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Quiz');
        $req->execute(array(':id_Quiz' => $id_Quiz));
        $tab = $req->fetchAll();
        return $tab[0];
    }

    public static function getQuiz(){
        $sql = "SELECT * FROM Quiz";
        $req = Connexion::pdo()->prepare($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Quiz');
        $req->execute();
        $tab = $req->fetchAll();
        return $tab;
    }

    public static function getTitreById_Quiz($id_Quiz) {
        $sql = "SELECT titreQuiz FROM Quiz WHERE id_Quiz = :id_Quiz";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':id_Quiz' => $id_Quiz));
        $tab = $req->fetchAll();
        return $tab[0][0];
    }

    public static function getQuizByUserId($id_utilisateur) {
        $sql = "SELECT * FROM quiz WHERE id_Utilisateur = :id_Utilisateur";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':id_Utilisateur' => $id_utilisateur));
        $tab = $req->fetchAll();
        return $tab;
    }

    public static function getId_UtilisateurById_Quiz($id_Quiz) {
        $sql = "SELECT id_Utilisateur FROM Quiz WHERE id_Quiz = :id_Quiz";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':id_Quiz' => $id_Quiz));
        $tab = $req->fetchAll();
        return $tab[0][0];
    }

    public static function deleteQuizById_Quiz($id_Quiz){
        $sql = "DELETE FROM Quiz WHERE id_Quiz = :id_Quiz";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':id_Quiz' => $id_Quiz));
    }

    public static function changeName($id_Quiz,$name) {
        $sql = "UPDATE `quiz` SET `titreQuiz` = :name WHERE `quiz`.`id_Quiz` = :id_Quiz;";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':id_Quiz' => $id_Quiz, ':name' => $name));
    }

    public static function changeColor($id_Quiz,$val) {
        $sql = "UPDATE `quiz` SET `couleur` = :color WHERE `quiz`.`id_Quiz` = :id_Quiz;";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':id_Quiz' => $id_Quiz, ':color' => $val));
    }
    /**
     * @return mixed
     */
    public function getTitreQuiz()
    {
        return $this->titreQuiz;
    }

    /**
     * @return mixed
     */
    public function getCouleur()
    {
        return $this->couleur;
    }


}

?>