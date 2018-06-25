<?php
include 'myPDO.include.php';
require_once 'equipe.class.php';
require_once 'huitième.class.php';
require_once 'quarts_demis_finale.class.php';
require_once 'mondialwebpage.class.php';
/*$db = myPDO::getInstance();
$idPoule = $db->prepare(<<<SQL
            SELECT count(idPoule)
            FROM Poule
SQL
);
        $idPoule -> setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $idPoule->execute();
        $idMax = $idPoule -> fetch();

var_dump($idMax);*/

$p = new MondialWebpage();

$db = myPDO::getInstance();
$idHuitieme = $db->prepare(<<<SQL
            SELECT *
            FROM Huitiemes
SQL
);
        $idHuitieme -> setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $idHuitieme->execute();
        $huitiemes = $idHuitieme -> fetchAll();

$db = myPDO::getInstance();
$idQuarts = $db->prepare(<<<SQL
            SELECT *
            FROM Quarts_Demis_Finale
SQL
);
        $idQuarts -> setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $idQuarts->execute();
        $quarts = $idQuarts -> fetch();

$db = myPDO::getInstance();
$idDemis = $db->prepare(<<<SQL
            SELECT *
            FROM Quarts_Demis_Finale
SQL
);
        $idDemis -> setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $idDemis->execute();
        $demis = $idDemis -> fetch();

$db = myPDO::getInstance();
$idFinale = $db->prepare(<<<SQL
            SELECT *
            FROM Quarts_Demis_Finale
SQL
);
        $idFinale -> setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $idFinale->execute();
        $finale = $idFinale -> fetch();

var_dump($huitiemes);
var_dump($quarts);
var_dump($demis);

$res="";
$res .= "<article id='container'>";
$res .= "<section><div class='huitiemes'>";
foreach($huitiemes as $huitieme) {
    $res .= "<div>
                <div>".$huitieme['equipe1']."</div>
                <div>".$huitieme['equipe2']."</div>
            </div>";
}

$res .= "</div>
        <div class='quarts'>";
foreach($quarts as $quart) {
    $res .= "<div>
                <div>".$quart->getEquipe1()."</div>
                <div>".$quart->getEquipe2()."</div>
            </div>";
}

$res .= "</div>
        <div class='demis'>";
foreach($demis as $demi) {
    $res .= "<div>
                <div>".$demi->getEquipe1()."</div>
                <div>".$demi->getEquipe2()."</div>
            </div>";
}

$res .= "</div>
        <div class='finale'>
            <div>
                <div>".$finale->getEquipe1()."</div>
                <div>".$finale->getEquipe2()."</div>
            </div>
        </div>
    </section>
</article>";

$p-> appendCssUrl("cases.css");
$p->appendContent($res);
echo $p->toHTML();
