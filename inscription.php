<?php
require_once 'mondialwebpage.class.php';
include 'forminscription.php';

$p = new MondialWebpage();

$p->appendContent(<<<HTML
<section class="form">
    <form class="col s6" action="forminscription.php" method="post" id="incription">
    <div class="row">
      <div class="input-field col s3">
          Nom
          <input placeholder="DUPONT" id="first_name" type="text" class="validate" name="nom" required>
      </div>
      <div class="input-field col s3">
          Prénom
          <input placeholder="Marcel" id="last_name" type="text" class="validate" name="pnom" required>
      </div>
  </div>
  <div class="row">
      <div class="input-field col s6">
          Date de naissance
          <input name="date" type="date" placeholder="jj/mm/aaaa" pattern="(0[1-9]|[1-2][0-9]|3[01])/(0[1-9]|1[0-2])/(19[0-9]{2}|200[0-9]|201[0-3])" name="dateNais" required >
      </div>
  </div>
  <div class="row">
      <div class="input-field col s6">
          Pseudo
          <input name="pseudo" type="text" placeholder="Marcel56" class="validate" name="pseudo" required>
      </div>
  </div>
  <div class="row">
      <div class="input-field col s6">
          Mot de passe
          <input id="password" type="password" class="validate" name="mdp" required>
      </div>
  </div>
  <div class="row">
      <div class="input-field col s6">
          Email
          <input placeholder="xyz@gmail.com" id="email" type="email" class="validate" name="mail" required>
      </div>
  </div>
  <button class="btn waves-effect waves-light grey lighten-1 buttonI" type="submit" name="action">Confirmer</button>
  <button class="btn waves-effect waves-light grey lighten-1 buttonI" type="reset" name="action" onclick="history.back()">Annuler</button>
</form>
</section>
HTML
);

echo $p->toHTML();
