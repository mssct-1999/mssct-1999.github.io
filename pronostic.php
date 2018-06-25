<?php

require('participer.class.php');
require('mondialwebpage.class.php');
require('parier.class.php');
require_once 'myPDO.include.php';

$p = new MondialWebpage();

$p->setTitle('Pronostiquer');
$p->appendCssUrl("CSS.css");

$p->appendContent('<h1>Parier</h1>');


$parier = new Parier();
foreach(Participer::getAll() as $num => $part) {
    if($part->getDateMatch() > date(DATE_ATOM) || ($part->getDateMatch() == date(DATE_ATOM) && $part->getHeureMatch() > date(DATE_ATOM))) {
        $p->appendContent('<form method="post" action="pronostic_envoi.php">');
        $p->appendContent('<fieldset><legend>Match du ' . $part->getDateMatch() . '</legend><div id="match"><label for="' . $part->getEquipe1() . '">' . $part->getEquipe1() . '</p>');
        $p->appendContent('<input type="text" name="scorePari1" placeholder="' . $parier->getScorePari1() . '"><br>');
        $p->appendContent('<label for="' . $part->getEquipe2() . '">' . $part->getEquipe2() . '</p>');
        $p->appendContent('<input type="text" name="scorePari2" placeholder="' . $parier->getScorePari2() . '"><br>');
        $p->appendContent('<input type="hidden" name="idMatch" value="' . $part->getIdMatch() . '">');        
        $p->appendContent('<input type="hidden" name="idAdherent" value="' . $parier->getIdAdherent() . '">'); 
        $p->appendContent('<button type="submit">Envoyer</button></div></fieldset><br><br></form>');
    }
}





echo $p->toHTML();