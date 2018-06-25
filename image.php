<?php

require_once 'equipe.class.php';

if (isset($_GET['id'])) {
    $equipe = Equipe::createFromId($_GET['id']);
    
    header('content-Type: image/png');
    
    echo $equipe->getDrapeau();
}