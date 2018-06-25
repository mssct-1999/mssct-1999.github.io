<?php
require_once 'mondialwebpage.class.php';
require_once 'myPDO.include.php';
require_once 'myPDO.class.php';

$p = new MondialWebpage();


$db= myPDO::getInstance();
$sql = $db->prepare("SELECT * FROM Adherent ORDER BY score DESC");
$sql->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
$sql->execute();
$adherents = $sql->fetchAll();


$i = 1;
$html = "";
foreach ($adherents as $adherent) {
    $html .= "<tr>";
    $html .= "<td>" . $i . "</td>";
    $html .= "<td>" . $adherent['pseudo'] . "</td>";
    $html .= "<td>" . $adherent['score'] . "</td>";
    //créer nbProno dans base de donnée
    $html .= "<td>" . $adherent['nbProno'];
    $i++;
}


$p->appendContent(<<<HTML
        <h1>Classement des pronostiqueurs</h1>
        <table class="centered">
            <thead>
                <tr>
                    <th>N° Classement</th>
                    <th>Pseudo</th>
                    <th>Score</th>
                    <th>Nombre de pronostics</th>
                </tr>
            </thead>
              {$html}
          </table>
HTML
);


echo $p->toHTML();
