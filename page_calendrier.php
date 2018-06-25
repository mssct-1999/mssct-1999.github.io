<?php
include 'myPDO.include.php';
require_once 'equipe.class.php';
require_once 'mondialwebpage.class.php';
require_once 'poule.class.php';

$p = new MondialWebPage();
$db= MyPDO::getInstance();

$idPoule = $db->prepare(<<<SQL
            SELECT idPoule
            FROM Poule
SQL
);
        $idPoule -> setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $idPoule->execute();
        $id = $idPoule -> fetchAll();

$numPoule = $db->prepare(<<<SQL
            SELECT *
            FROM Poule
SQL
);
        $numPoule -> setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $numPoule->execute();
        $poules = $numPoule -> fetchAll();

$res = " ";

  foreach($poules as $poule) {
          $equipes = Equipe::getClassement($poule['idPoule']);
          $res .= "<table class='striped'><thead><tr><th>Poule" . " " . $poule['numero'] ."</th>";
          $res .= "<th>Points</th>";
          $res .= "</thead>";
            foreach ($equipes as $equipe) {
                $res .= "<tr>";
                $res .= "<td>" . $equipe->getPays() . "</td>";
                $res .= "<td>" . $equipe->getPointsPoule() . "</td>";
                $res .= "</tr>";
              }

              $res .= "</table>";
              $res .= "<br>";
            }



$p->appendContent(<<<HTML
<section>
    $res
  </section>
HTML
);
echo $p->toHTML();
;
