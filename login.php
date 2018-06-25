<?php

require_once 'myPDO.include.php';

session_start ();

// On définit un login et un mot de passe de base pour tester notre exemple. Cependant, vous pouvez très bien interroger votre base de données afin de savoir si le visiteur qui se connecte est bien membre de votre site

if(isset($_POST['login']) && isset($_POST['pwd'])) {
    $db = myPDO::getInstance();
    $login = $_POST['login'];
    $pwd = sha1($_POST['pwd']);
    $select = $db->prepare("SELECT * FROM Adherent WHERE email = :email"); // AND mdp = :mdp");
    $select->execute(array(
      ':email' => $login
      //':mdp' => $pwd
    ));

	// on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
	if ($select->rowCount() > 0) {
		// dans ce cas, tout est ok, on peut démarrer notre session
    $infoSession = $select->fetchAll();
		$_SESSION['login'] = $_POST['login'];
    $_SESSION['idAdherent'] = $infoSession[0]['idAdherent'];

		// on redirige notre visiteur vers une page de notre section membre
		header ('location: accueil.php');
	}
	else {
		// Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
		echo '<body onLoad="alert(\'Membre non reconnu...\')">';
		// puis on le redirige vers la page d'accueil
		echo '<meta http-equiv="refresh" content="0;URL=accueil.php">';
	}
}
else {
	echo 'Les variables du formulaire ne sont pas déclarées.';
}
?>
