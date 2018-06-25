<?php

require_once 'myPDO.include.php';

class Poule {
    
    private $idPoule = null;
    private $numero = null;
    
    
    
    public static function createFromId($id) {
        try {
            $pou = myPDO::getInstance()->prepare(<<<SQL
                SELECT *
                FROM Poule
                WHERE idPoule = :idPoule
SQL
);
            $pou->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
            $pou->bindValue(':idPoule',$id);
            $pou->execute();
            $poule = $pou->fetch();
            return $poule;
        } catch(PDOException $e) {
            echo "<p>Erreur : " . $e->getMessage();
            die();
        }
    }
    
    
    // Accesseur sur idPoule
    public function getIdPoule() {
        return $this->idPoule;
    }
    
    
    // Accesseur sur numero
    public function getNumero() {
        return $this->idNumero;
    }
    
}