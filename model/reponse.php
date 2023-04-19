<?php 
class Reponse extends Model{

    protected $id_reponse;
    protected $text;
    protected $valide;
    protected $id_Question ;

    //get toutes les réponses de la question
    public static function getReponsesByIdQuestion($id_Question) {
        $sql = "SELECT * FROM Reponse WHERE id_Question = :id_Question";
        $req = Connexion::pdo()->prepare($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Reponse');
        $req->execute(array(':id_Question' => $id_Question));
        $tab = $req->fetchAll();
        return $tab;
    }

}

?>