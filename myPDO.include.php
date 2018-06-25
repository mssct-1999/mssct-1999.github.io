<?php

require_once 'myPDO.class.php';

try {
$db = myPDO::setConfiguration('mysql:host=localhost;dbname=projets2;charset=utf8', 'root', '');
}
catch (Exception $e) {
    echo ('Impossible de se connecter à la base de donnée');
    echo $e->getMessage();
    die();
}
