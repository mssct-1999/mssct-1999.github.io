<?php

require_once 'myPDO.include.php';

class Parier {

    private $idAdherent = null;
    private $idMatch = null;
    private $nbPoints = null;
    private $scorePari1 = null;
    private $scorePari2 = null;

    /*static $par;
    public static function par() {
        return self::$par;
    }*/


    // Accesseur sur idAdherent
    public function getIdAdherent() {
        return $this->idAdherent;
    }


    // Accesseur sur idMatch
    public function getIdMatch() {
        return $this->idMatch;
    }


    // Accesseur sur nbPoints
    public function getNbPoints() {
        return $this->nbPoints;
    }


    // Accesseur sur scorePari1
    public function getScorePari1() {
        return $this->scorePari1;
    }


    // Accesseur sur scorePari2
    public function getScorePari2() {
        return $this->scorePari2;
    }

}
