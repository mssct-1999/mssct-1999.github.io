<?php
require_once 'mondialwebpage.class.php';
require_once 'myPDO.include.php';
require_once 'myPDO.class.php';
require('adherent.class.php');

$p = new MondialWebpage();

$adh = new Adherent();
$p->appendContent('<input type="hidden" name="idAdherent" value="' . $adh->getIdAdherent() . ' "');
$db = myPDO::getInstance();
$req = $db->prepare('SELECT * FROM Adherent WHERE idAdherent = :idAdherent');
$req->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
$req->execute(array(
    'idAdherent' => $adh->getIdAdherent()
));


$p->appendContent(<<<HTML
  <section>
            <h1>Mon Profil</h1>
            <fieldset>
                <legend>Mes informations personnelles </legend>
                <p>Pseudo : {$adh->getPseudo()} </p>
                <p>Nom :  {$adh->getNom()}  </p>
                <p>Prénom : {$adh->getPrenom()} </p>
                <p>Email :   {$adh->getEmail()} </p>
                <p>Score :  {$adh->getScore()}  </p>
                <p>Nombre de pronostics : {$adh->getNbProno()}</p>

            </fieldset>
            <fieldset>
                <legend>Mes paris en cours</legend>
            </fieldset>
            <fieldset>
                <legend>Mes paris finis</legend>
            </fieldset>
            </section>
HTML
);

echo $p->toHTML();
