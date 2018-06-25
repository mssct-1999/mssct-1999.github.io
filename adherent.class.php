<?php

require_once 'myPDO.include.php';

class Adherent { 
    
    private $idAdherent = null;
    private $pseudo = null;
    private $mdp = null;
    private $nom = null;
    private $prenom = null;
    private $dateNais = null;
    private $score = null;
    private $email = null;
    private $nbProno = null;
    private $role = null;


    
    /**
    * Usine pour fabriquer une instance à partir d'un identifiant.
    * Les données sont issues de la BD.
    *
    * @param int $id Identifiant BD de l'adhérent à créer.
    * @return Adhérent instance correspondant à $id.
    * 
    * @throws Exception si l'adhérent n'est pas trouvé dans la BD.
    */
    
    public static function createFromId($id) {
        try {
            $db = myPDO::getInstance;
            $adh = $db->prepare(<<<SQL
                SELECT *
                FROM Adherent
                WHERE idAdherent = :idAdherent
SQL
);
            $adh->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
            $adh->bindValue(':idAdherent',$id);
            $adh->execute();
            $adherent = $adh->fetch();
            return $adherent;
        } catch(PDOException $e) {
            echo "<p>Erreur : " . $e->getMessage();
            die();
        }
    }
    

    // Accesseur sur idAdherent
    public function getIdAdherent() {
        return $this->idAdherent;
    }
    
    
    // Accesseur sur pseudo
    public function getPseudo() {
        return $this->pseudo;
    }
    
    
    // Accesseur sur mdp
    public function getMdp() {
        return $this->mdp;
    }
    
    
    // Accesseur sur nom
    public function getNom() {
        return $this->nom;
    }
    
    
    // Accesseur sur prenom
    public function getPrenom() {
        return $this->prenom;
    }
    
    
    // Accesseur sur dateNais
    public function getDateNais() {
        return $this->dateNais;
    }
    
    
    // Accesseur sur score
    public function getScore() {
        return $this->score;
    }
    
    
    // Accesseur sur email
    public function getEmail() {
        return $this->email;
    }
    
    
    // Accesseur sur nbProno
    public function getNbProno() {
        return $this->nbProno;
    }
    
    
    // Accesseur sur role
    public function getRole() {
        return $this->role;
    }
    
}