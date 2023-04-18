<?php 
class Signalement extends Model {

    protected $id_signalement;
    protected $id_quiz;
    protected $id_utilisateur;

    public static function getSignalementById_Signalement($id_Signalement) {
        $sql = "SELECT * FROM Signalement WHERE Id_Signalement = :id_Signalement";
        $req = Connexion::pdo()->prepare($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Signalement');
        $req->execute(array(':id_Signalement' => $id_Signalement));
        $tab = $req->fetchAll();
        return $tab;
    }

    public static function getSignalementById_Utilisateur($id_Utilisateur){
        $sql = "SELECT * FROM Signalement WHERE id_Utilisateur = :id_Utilisateur";
        $req = Connexion::pdo()->prepare($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Signalement');
        $req->execute(array(':pseudo' => $id_Utilisateur));
        $tab = $req->fetchAll();
        return $tab;
    }
    
    public static function getSignalementById_Quiz($id_Quiz){
        $sql = "SELECT * FROM Signalement WHERE id_Quiz = :id_Quiz";
        $req = Connexion::pdo()->prepare($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Signalement');
        $req->execute(array(':id_Quiz' => $id_Quiz));
        $tab = $req->fetchAll();
        return $tab;
    }
    
}

?>
