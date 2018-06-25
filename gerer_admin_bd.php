<?php

require('gerer_admin.php');
require_once 'myPDO.include.php';

$req = $db->prepare('INSERT INTO Participer(equipe1, equipe2, dateMatch, heureMatch)
                    VALUES(:equipe1, :equipe2, :dateMatch, :heureMatch)');
$req->execute(array(
    'equipe1' => $_POST['equipe1'],
    'equipe2' => $_POST['equipe2'],
    'dateMatch' => $_POST['dateMatch'],
    'heureMatch' => $_POST['heureMatch']
));

