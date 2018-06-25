<?php

require('mondialwebpage.class.php');
require('adherent.class.php');
require('participer.class.php');
require_once 'myPDO.include.php';

$p = new MondialWebPage();

$db = myPDO::getInstance();
$repEq1 = $db->prepare('SELECT * FROM Equipe');
$repEq1->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
$repEq1->execute();
$equipe = "";
while($donnees = $repEq1->fetch()) {
$equipe .='<option value="'.$donnees['pays'].'">'.$donnees['pays'].'</option>';
}

$match= "";
foreach(Participer::getAll() as $num => $part) {
    $part->getDateMatch();
    $match .= "<div class='admin'><label for=".$part->getEquipe1().">".$part->getEquipe1()."</label><input class='score' name='scoreEq1' type='number' min='0' max='50' required> - <input id='score2' class='score' name='scoreEq2' type='number' min='0' max='50' required>".$part->getEquipe2()."</div>";
}

$p->appendContent(<<<HTML
            <h1>Page administrateur</h1>
            <form action="/action_page.php">
            <fieldset>
                <legend>Ajouter nouveaux matchs</legend>
            <div class="admin">
                Equipe 1
            <select name="equipe1">
            {$equipe}
            </select>
                </div>
            <div class="admin">
            Equipe 2
            <select name="equipe2">
            {$equipe}
            </select>
            </div>
            <div class="admin">
            Date du match
            <input name="dateMatch" type="date" placeholder="jj/mm/aaaa" required pattern="(0[1-9]|[1-2][0-9]|3[01])/(0[1-9]|1[0-2])/(19[0-9]{2}|200[0-9]|201[0-3])">
            </div>
            <div class="admin">
            Heure du match
            <input type="time" pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" name="heureMatch">
            </div>
             <div class="admin">
                <button type="submit">Envoyer</button>
            </div>
            </fieldset>
            </form>

            <form method="post" action="gerer_admin_adherent_role.php">
            <fieldset>
              <legend>Ajouter rôle admin / supprimer un adhérent</legend>
              <div><label></label></p>
              <select name="role" id="role">
              <option value="N">Simple adhérent</option>
              <option value="A">Administrateur</option>
              <input type="hidden" name="pseudo" value="">
              <button type="submit" name="ajouter_role">Envoyer</button>
              </select></div></form>

              <form method="post" action="gerer_admin_adherent_supprimer.php">
              <input type="hidden" name="pseudo" value="">
              <button type="submit" name="supprimer_adh">Supprimer adhérent</button>
              </form><br>
              </fieldset>
              </form>

            <form action="/action_page.php">
            <fieldset>
                <legend>Match ayant déjà eu lieu</legend>
                {$match}
            <div class="admin">
                <button type="submit">Envoyer</button>
            </div>
            </fieldset>
            </form>
HTML
            );

echo $p->toHTML();
