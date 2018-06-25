<?php
$auth = 0;
include '../lib/myPDO.php';
include '../lib/auth.php';
include '../lib/session.php';
include '../lib/constant.php';

    
if (isset($_POST['pseudo']) &&  isset($_POST['password'])) {
    $pseudo = $db->quote($_POST['pseudo']);
    /*
    problème avec sha1() 
    */
    $password = $_POST['password'];
    $sql = $db->prepare("SELECT * FROM Adherent WHERE pseudo=$pseudo AND mdp='$password';");
    $sql->execute();
    
    if ($sql->rowCount() > 0) {
        $_SESSION['Auth'] = $sql->fetch();
        setFlash('Vous êtes maintenant connecté');
        header('Location:' . WEBROOT . 'adherent/index.php');
        die();
    }
    else {
        setFlash('Login ou mot de passe incorrect');
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>FootProno</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    </head>

    <body>
        <nav>
            <div class="nav-wrapper">
                <a src="" class="brand-logo"><img src="../img/logo.png"></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <div class="row">
                        <form class="col s12" method="post">
                            <div class="row">
                                <div class="input-field col s6">
                                    <label for="pseudo">Pseudo</label>
                                    <input id="pseudo" type="text" class="validate" name="pseudo">                               
                                </div>
                                <div class="input-field col s6">
                                    <label for="password">Mot de passe</label>
                                    <input id="password" type="password" class="validate" name="password">
                                </div>
                            </div>
                            <button type="submit">Se connecter</button>
                        </form>
                    </div>
                </ul>
            </div>
        </nav>
    </body>
</html>

<?php
echo flash();
include '../lib/debug.php';