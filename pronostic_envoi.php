<?php

require('pronostic.php');
require_once 'myPDO.include.php';

//if (isset($_POST['scorePari1']) && isset($_POST['scorePari2'])) {
    $db = myPDO::getInstance();
    $req = $db->prepare('UPDATE Parier
                        SET scorePari1 = :scorePari1, scorePari2 = :scorePari2
                        WHERE idMatch = :idMatch
                        AND idAdherent = :idAdherent');
    $req->execute(array(
        'scorePari1' => $_POST['scorePari1'],
        'scorePari2' => $_POST['scorePari2'],
        'idMatch' => $_POST['idMatch'],
        'idAdherent' => $_POST['idAdherent']
    ));
//}