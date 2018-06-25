<?php
require_once 'mondialwebpage.class.php';
require_once 'myPDO.include.php';
require_once 'myPDO.class.php';
require_once 'participer.class.php';
require_once 'equipe.class.php';

$p = new MondialWebpage();

$db= myPDO::getInstance();
$sql = $db->prepare("SELECT * FROM Adherent ORDER BY score DESC LIMIT 0, 3");
$sql->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
$sql->execute();
$adherents = $sql->fetchAll();

$title="";
if (isset($_SESSION['login'])) {
 $title ="<h1>Accueil</h1>";
    }

$i = 1;
$classement = "";
foreach($adherents as $adherent) {
  $classement .= "<tr>";
  $classement .= "<td><img class='trophe' src=".$i.".png></img></td>";
  $classement .= "<td>" . $adherent['pseudo'] . "</td>";
  $classement .= "<td class='td_point'>" . $adherent['score'] . "</td>";
  //créer nbProno dans base de donnée
  $i++;
}

$match = "";
$input = "";
$envoyer = "";
$equipe1 ="";
$equipe2="";
foreach(Participer::TroisProchainsMatchs() as $num => $part) {
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
                {$title}
            <div class="lightbox" id="macible1">
                <div class="popup" id="macible1">
                <div class="entpopup m-right">
                <a href="accueil.php"><i id="croix" class="fas fa-times m-link"></i></a>
                <h2 id="titlePopUp">Connexion</h2>
                </div>
                <form action="login.php" method="post" id="incription">
                    <div class="input-field col s3">
                        Email
                        <input placeholder="xyz@gmail.com" id="email" type="email" name="login" class="validate" required>
                    </div>


                    <div class="input-field col s3">
                        Mot de passe
                        <input id="password" type="password" class="validate" name="pwd" required>


                <a href="accueil.php"><button class="button" type="submit" name="action" id="buttonCo" >Confirmer</button></a>
                </div>
                    </form>
                </div>
                    </div>

                <div class="m-right aclassment">
                    <h3>Classement des pronostiqueurs</h3>
                    <table class="centered">
                        <thead>
                            <tr>
                                <th class='th_image'></th>
                                <th class='th_pseudo'>Pseudo</th>
                                <th class='th_point'>Score</th>
                            </tr>
                        </thead>
                                {$classement}
                      </table>
                </div>
                <div class="m-center match">
                {$match}
                </div>
                </section>
HTML
);

echo $p->toHTML();
