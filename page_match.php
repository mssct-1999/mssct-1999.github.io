<?php

require('mondialwebpage.class.php');
require('participer.class.php');
require('parier.class.php');
require_once 'myPDO.include.php';

$p = new MondialWebPage();


$match = "";
$input = "";
$envoyer = "";
$equipe1 ="";
$equipe2="";
foreach(Participer::getAll() as $num => $part) {
  if (isset($_SESSION['login'])) {
    $envoyer= "<div class='buttonProno'><button class='button' type='submit'>Envoyer</button></div>";
  }
  else{
    $input = "disabled";
  }
  $equipe1 = $part->getEquipe1Bis();
  $equipe2 = $part->getEquipe2Bis();

  $match .= '<div class="date">Match du '.$part->getDateMatch().'</div>
    <div class="admin"><img class="drapeau1" width =60 height=40 src=image.php?id='.$equipe1->getIdEquipe().'>'.$part->getHeureMatch().'
    <img class="drapeau2" width =60 height=40 src=image.php?id='.$equipe2->getIdEquipe().'></div>
    <div class="admin">'.$equipe1->getPays().'<input class="score" name="scoreEq1" type="number" min=0 max=50 placeholder='.$part->getScoreEq1().' '.$input.' required>
   -
   <input class="score" name="scoreEq2" type="number" min=0 max=50 placeholder='.$part->getScoreEq1().' '.$input.' required>'
   .$equipe2->getPays().'</div>'.$envoyer.'<div><hr class="separation" /></div>';
}

$p->appendContent(<<<HTML
              <section>
              <h1>Match</h1>
              <div class="m-center">
                {$match}
                </div>
                </section>
HTML
            );

echo $p->toHTML();
