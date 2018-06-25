<?php

require_once 'myPDO.include.php';
require_once 'equipe.class.php';

class Participer {

    private $idMatch = null;
    private $equipe1 = null;
    private $equipe2 = null;
    private $dateMatch = null;
    private $heureMatch = null;
    private $scoreEq1 = null;
    private $scoreEq2 = null;


    // Accesseur sur tous les enregistrements de la BD
    public static function getAll() {
        $all = myPDO::getInstance()->prepare(<<<SQL
            SELECT *
            FROM Participer
            ORDER BY dateMatch
SQL
);
        $all->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $all->execute();
        $parti = $all->fetchAll();
        return $parti;
    }


    // Accesseur sur idMatch
    public function getIdMatch() {
        return $this->idMatch;
    }


    // Accesseur sur equipe1
    public function getEquipe1() {
      return $this->equipe1;
    }


    // Accesseur sur equipe2
    public function getEquipe2() {
      return $this->equipe2;
    }

    // Accesseur sur equipe1
    public function getEquipe1Bis() {
      $equipe1 = Equipe::createFromName($this->equipe1);
      return $equipe1;
    }


    // Accesseur sur equipe2
    public function getEquipe2Bis() {
      $equipe2 = Equipe::createFromName($this->equipe2);
      return $equipe2;
    }


    // Accesseur sur dateMatch
    public function getDateMatch() {
        return $this->dateMatch;
    }


    // Accesseur sur heureMatch
    public function getHeureMatch() {
        return $this->heureMatch;
    }


    // Accesseur sur scoreEq1
    public function getScoreEq1() {
        return $this->scoreEq1;
    }


    // Accesseur sur scoreEq2
    public function getScoreEq2() {
        return $this->scoreEq2;
    }

    public static function TroisProchainsMatchs() {
         $db = myPDO::getInstance();
         $match = $db->prepare("SELECT * FROM Participer WHERE dateMatch BETWEEN CURDATE() AND CURDATE()+5 ORDER BY dateMatch,heureMatch LIMIT 0,3;");
        $match->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $match->execute();
        $match2 = $match->fetchAll();
        return $match2;

    }

}
