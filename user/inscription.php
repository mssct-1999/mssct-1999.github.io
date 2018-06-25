<!DOCTYPE html>
<html>
    <head>
        <title>Inscription</title>
        <meta charset="utf-8">
        <meta name="description" content="pronostique">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    </head>
    <body>
        <header role="header">
            <nav class="menu" role="navigation">
                <div class ="inner">
                    <div class="m-left">
                        <a href="index.php" ><img class="../logo" src="logo2.png"></a>
                    </div>
                    <div class="m-center">
                        <a href="FootProno.html" class="m-link"><i class="fas fa-home"></i> Accueil</a>
                    </div>
                </div>
            </nav>
            <div class="m-right">
            </div>
        </header>
        <section>
            <div class="row">
                <form id="monForm" class="col s8">
                    <div class="row">

                        <div class="input-field col s3">
                            Nom
                            <input placeholder="DUPONT" id="first_name" type="text" class="validate" required>
                        </div>
                        <div class="input-field col s3">
                            Prénom
                            <input placeholder="Marcel" id="last_name" type="text" class="validate" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            Date de naissance
                            <input name="date" type="date" placeholder="jj/mm/aaaa" required pattern="(0[1-9]|[1-2][0-9]|3[01])/(0[1-9]|1[0-2])/(19[0-9]{2}|200[0-9]|201[0-3])">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            Pseudo
                            <input name="pseudo" type="text" placeholder="Marcel56" class="validate" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            Mot de passe
                            <input id="password" type="password" class="validate" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            Email  
                            <input placeholder="xyz@gmail.com" id="email" type="email" class="validate" required>    
                        </div>
                    </div>
                    <a href="index.php" class="waves-effect waves-light btn-small  grey lighten-1">Confirmer</a>
                    <a href="index.php" class="waves-effect waves-light btn-small  grey lighten-1">Annuler</a>
                </form>
            </div>
        </section>
        <footer class="footer">
            <div id="footer" class="container">
                ©2018 Copyright
            </div>
        </footer>
    </body>
</html>
