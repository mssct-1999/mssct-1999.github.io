<?php

try {
$db = new PDO('mysql:host=mysql;dbname=infs2_prj02;charset=utf8', 'infs2_prj02', 'infs2_prj02');
}
catch (Exception $e) {
    echo ('Impossible de se connecter à la base de donnée');
    echo $e->getMessage();
    die();
}