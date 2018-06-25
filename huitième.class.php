<?php

require_once 'myPDO.include.php';

class Huitième {
    
    private $idHuitiemes = null;
    private $equipe1 = null;
    private $equipe2 = null;
    private $resultat = null;
    
    // Usine pour fabriquer une instance à partir d'un identifiant
    // Les données sont issues de la base de données
    // @param int $id identifiant BD du match de huitieme à créer
    // @return Equipe instance correspondant à $id
    // @throws Exception si le match des huitiemes ne peut pas être trouvé dans la base de données
    public static function createFromId($id) {
        try {
            $stmt = $db->prepare(<<<SQL
                SELECT *
                FROM Huitièmes
                WHERE id = :idHuitiemes
SQL
                                                 );
            $stmt->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
            $stmt->bindValue(':idHuitiemes',$id);
            $stmt->execute();
            $huit = $stmt->fetch();
            return $huit;
        } catch(PDOException $e) {
            echo "<p>Erreur : " . $e->getMessage();
            die();
        }
    }
    
     // Accesseur sur idQDF
    public function getIdHuitiemes() {
        return $this->idHuitiemes;
    }

        //Acesseur sur equipe1
    public function getEquipe1(){
        return $this->equipe1;
    }

    //Accesseur sur equipe2
    public function getEquipe2(){
        return $this->equipe2;
    }

    //Accesseur sur resultat
    public function getResultat(){
        return $this->resultat;
    }


}