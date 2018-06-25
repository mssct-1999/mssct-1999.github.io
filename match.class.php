<?php

require_once 'myPDO.include.php';

class Match {
    
    private $idMatch = null;
    private $typeMatch = null;
    
    
    /**
    * Usine pour fabriquer une instance à partir d'un identifiant.
    * Les données sont issues de la BD.
    *
    * @param int $id Identifiant BD du match à créer.
    * @return Match instance correspondant à $id.
    * 
    * @throws Exception si le match n'est pas trouvé dans la BD.
    */
    
    public static function createFromId($id) {
        try {
            $mat = myPDO::getInstance()->prepare(<<<SQL
                SELECT *
                FROM Match
                WHERE idMatch = :idMatch
SQL
);
            $mat->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
            $mat->bindValue(':idMatch',$id);
            $mat->execute();
            $match = $mat->fetch();
            return $match;
        } catch(PDOException $e) {
            echo "<p>Erreur : " . $e->getMessage();
            die();
        }
    }
    
    
    // Accesseur sur idMatch
    public function getIdMatch() {
        return $this->idMatch;
    }
    
    
    // Accesseur sur typeMatch
    public function getTypeMatch() {
        return $this->typeMatch;
    } 
        
}