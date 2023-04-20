<?php 
class Signalement extends Model {

    protected $id_signalement;
    protected $id_quiz;
    protected $id_utilisateur;

    public static function getSignalements() {
        $sql = "SELECT * FROM Signalement";
        $req = Connexion::pdo()->prepare($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Signalement');
        $req->execute();
        $tab = $req->fetchAll();
        return $tab;
    }

    public static function deleteReportById_Quiz($id_Quiz){
        $sql = "DELETE FROM Signalement WHERE id_Quiz = :id_Quiz";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':id_Quiz' => $id_Quiz));
    }

}

?>
