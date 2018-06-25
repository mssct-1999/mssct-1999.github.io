<?php

require_once 'myPDO.include.php';

class Equipe {

    private $idEquipe = null;
    private $pays = null;
    private $pointsPoule = null;
    private $drapeau = null;

    // Usine pour fabriquer une instance à partir d'un identifiant
    // Les données sont issues de la base de données
    // @param int $id identifiant BD de l'equipe à créer
    // @return Equipe instance correspondant à $id
    // @throws Exception si l'equipe ne peut pas être trouvé dans la base de données
    public static function createFromId($id) {
        try {
            $stmt = myPDO::getInstance()->prepare(<<<SQL
                SELECT *
                FROM Equipe
                WHERE idEquipe = $id
SQL
                                                 );
            $stmt->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
            $stmt->execute();
            $equipe = $stmt->fetch();
            return $equipe;
        } catch(PDOException $e) {
            echo "<p>Erreur : " . $e->getMessage();
            die();
        }
    }

    public static function createFromName($pays) {
        try {
            $stmt = myPDO::getInstance()->prepare("
                SELECT *
                FROM Equipe
                WHERE pays = :pays;");
            $stmt->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
            $stmt->bindValue(':pays',$pays);
            $stmt->execute();
            $equipe = $stmt->fetch();
            return $equipe;
        } catch(PDOException $e) {
            echo "<p>Erreur : " . $e->getMessage();
            die();
        }
    }

    //Acesseur sur idEquipe
    public function getIdEquipe(){
        return $this->idEquipe;
    }

    //Accesseur sur pays
    public function getPays(){
        return $this->pays;
    }

    //Accesseur sur pointsPoule
    public function getPointsPoule(){
        return $this->pointsPoule;
    }

    //Accesseur sur drapeau
    public function getDrapeau(){
        return $this->drapeau;
    }

    // Méthode qui retourne le classement de la poule avec l'idPoule passé en paramètre
    public function getClassement($idPoule) {
        $classt = myPDO::getInstance()->prepare(<<<SQL
                SELECT *
                FROM Equipe
                WHERE idPoule = :idPoule
                ORDER BY idPoule,pointsPoule;
SQL
                                               );
        $classt->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $classt->bindValue(':idPoule',$idPoule);
        $classt->execute();
        $classement = $classt->fetchAll();
        return $classement;
    }

}
