<?php
require_once 'webpage.class.php' ;
session_start();
class MondialWebPage extends WebPage{


public function contenuNav() {
  if (isset($_SESSION['login'])) {
    $mNav ="
    <div class='m-left'>
          <a href='accueil.php'><img class='logo' src='logo2.png'></a>
        </div>
        <div class='m-center'>
        <a href='accueil.php' class='m-link menunav'><i class='fas fa-home'></i> Accueil</a>
          <a href='page_profil.php' class='m-link menunav'><i class='fas fa-user'></i> Mon profil</a>
          <a href='page_match.php' class='m-link menunav'><i class='fas fa-futbol'></i> Match </a>
          <a href='page_classement.php' class='m-link menunav'><i class='fas fa-trophy'></i> Classement</a>
          <a href='page_calendrier.php' class='m-link menunav'><i class='fas fa-calendar-alt'></i> Calendrier</a>
          <div class='m-right '>
          <a class='button' id='buttonDe' href='logout.php'>Se déconnecter</a>
          </div>
            </div>
          "
            ;
      }
      else{
      $mNav ="
         <div class='m-left'>
                <a href='accueil.php'><img class='logo' src='logo2.png'></a>
            </div>
            <div class='m-center'>
        <a href='accueil.php' class='m-link menunav'><i class='fas fa-home'></i> Accueil</a>
          <div class='m-right inline'>
                  <a class='button buttonPopUp' href='#macible1'>Se connecter</a>
                  <a class='button' href='page_inscription.php'>S'inscrire</a>
          </div>
            </div>
          "
          ;
    }
    return($mNav);
  }


    /**
     * Produire la page Web complète
     *
     * @return string
     * @throws Exception si title n'est pas défini
     */
    public function toHTML(){
		$this->setTitle("FootProno");
    $this->appendCssUrl("normalize.css");
    $this->appendCssUrl("header.css");
		$this->appendCssUrl2("https://use.fontawesome.com/releases/v5.0.13/css/all.css","sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp","anonymous");
		$this->appendToHead("<meta charset='utf-8'> <meta name='description' content='pronostique'>");
    $this->appendHeader(<<<HTML
    <nav class="menu" role="navigation">
        <div class ="inner">
        {$this->contenuNav()}
        </div>
    </nav>
HTML
    ) ;

     $this->appendFooter(<<<HTML
                <div id="footer" class="container">
                    ©2018 Copyright
                </div>
HTML
    );
        echo parent::toHTML();
    }
}
