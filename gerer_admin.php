<?php session_start();

require('webpage.class.php');
require('adherent.class.php');
require('participer.class.php');
require_once 'myPDO.include.php';



/*if(!isset($_SESSION['role']) OR $_SESSION['role'] != 'A') 
{
   $_SESSION['accessdenied'] = "Vous n'avez pas l'autorisation d'accéder à cette page";

   header('Location:user_accueil.php'); // La page où tu veux rediriger le membre
   exit; // Afin que la suite du code ne s'exécute pas
}*/

$p = new WebPage();

$p->setTitle('Gérer'); //Titre page HTML
$p->appendCssUrl("CSS.css"); //CSS$

// HEADER ADMIN (récupérer code page d'accueil admin).

$p->appendContent("<h1>PAGE ADMINISTRATEUR</h1>");
$p->appendContent('<h2>Ajouter nouveaux matchs</h2>');

$p->appendContent('<form method="post" action="gerer_admin_bd.php">');
$p->appendContent('<label for="equipe1">Equipe 1 </label>');
$p->appendContent('<div><select name="equipe1" id="equipe1"');

$db = myPDO::getInstance();
$repEq1 = $db->prepare('SELECT * FROM Equipe');
$repEq1->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
$repEq1->execute();
while($donnees = $repEq1->fetch()) {
    $p->appendContent('<option value="'.$donnees['pays'].'">'.$donnees['pays'].'</option>');
}

$p->appendContent('</select></div><br>');
$p->appendContent('<label for="equipe2">Equipe 2 </label>');
$p->appendContent('<div><select name="equipe2" id="equipe2"');

$repEq2 = $db->prepare('SELECT * FROM Equipe');
$repEq2->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
$repEq2->execute();
while($donnees = $repEq2->fetch()) {
    $p->appendContent('<option value="'.$donnees['pays'].'">'.$donnees['pays'].'</option>');
}

$p->appendContent('</select><br><br>');

$p->appendContent('<div><label for="dateMatch" required>Date du match </label>');
$p->appendContent('<input type="date" name="dateMatch"></div>');

$p->appendContent('<div><label for="heureMatch" required>Heure du match </label>');
$p->appendContent('<input type="time" pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" name="heureMatch"></div><br>');

$p->appendContent('<button type="submit">Envoyer</button>');
$p->appendContent('</form>');

$p->appendContent('<p style="text-align: center">_________________________________</p>');

$p->appendContent('<h2>Matchs ayant déjà eu lieu</h2><form>');

foreach(Participer::getAll() as $num => $part) {
    $p->appendContent('<fieldset><legend>Match du ' . $part->getDateMatch() . '</legend><div id="match"><label for="' . $part->getEquipe1() . '">' . $part->getEquipe1() . '</p>');
    $p->appendContent('<input type="text" name="scoreEq1"><br>');
    $p->appendContent('<label for="' . $part->getEquipe2() . '">' . $part->getEquipe2() . '</p>');
    $p->appendContent('<input type="text" name="scoreEq2"><br>');
    $p->appendContent('<button type="submit">Envoyer</button></div></fieldset><br><br>');
}

$p->appendContent('</form>');



echo $p->toHTML();