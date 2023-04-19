<?php 
class Question extends Model{

    protected $id_Question;
    protected $textQuestion;
    protected $image;
    protected $multiple;
    protected $id_Quiz;

    //get quiz by id_quiz
    public static function getQuestionsByIdQuiz($id_Quiz) {
        $sql = "SELECT * FROM Question WHERE id_Quiz = :id_Quiz";
        $req = Connexion::pdo()->prepare($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Question');
        $req->execute(array(':id_Quiz' => $id_Quiz));
        $tab = $req->fetchAll();
        return $tab;
    }
}

?>