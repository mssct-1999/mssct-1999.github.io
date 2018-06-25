<?php
$auth = 0;
//include 'lib/includes.php';
include 'myPDO.include.php';
require_once 'myPDO.class.php';
require_once 'myPDO.include.php';
require_once 'inscription.php';

//Problème d'insertion dans la table au niveau de la date = 0000-00-00

if (isset($_POST['nom']) && isset($_POST['pnom']) && isset($_POST['pseudo']) && isset($_POST['mdp']) && isset($_POST['mail'])) {
    $db = myPDO::getInstance();
    $nom = $_POST['nom'];
    $pnom = $_POST['pnom'];
    //$datenais = $_POST['dateNais'];
    $pseudo = $_POST['pseudo'];
    //$mdp = sha1($_POST['mdp']);
    $mdp = sha1($_POST['mdp']);
    $mail = $_POST['mail'];

   /* $doublon = $db->prepare("SELECT * FROM Adherent WHERE pseudo=$pseudo AND mail=$mail");
    $doublon->execute();

    if ($doublon->rowCount() > 0) {
        throw new Exception("Pseudo ou adresse mail déjà utilisée");
    }
*/

    $sql = $db->prepare("INSERT INTO Adherent (pseudo,mdp,nom,pnom,email) VALUES (:pseudo,:mdp,:nom,:pnom,:mail);");
    $sql->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
    $sql->execute(array(
    ':nom' => $nom,
    ':pnom' => $pnom,
    //':dateNais'=> $datenais,
    ':pseudo' => $pseudo,
    ':mdp' => $mdp,
    ':mail' => $mail
  ));
    header ('location: accueil.php');
    die();
}
?>
