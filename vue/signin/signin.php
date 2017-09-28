<?php
include_once('../../vue/includes/header.php');
 ?>

<!--
ICI je vais devoir mettre un modal selon la situation (dans le cotroller donc)
SI pas encore loger, demander à se loger, si session ouverte, faire un lien classique de l'icone -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/modal_login.php')?>
      </header>


      <main class="form_inscription row">
        <h4 class="teal-text text-darken-1">Pour s'inscrire, rien de plus simple...</h4>
        <form class="col s12 m6 offset-m3" action="http://localhost/moreauandsons/controler/signin/signin_.php" method="post">
            <div class="input-field col s12">
              <input id="nom" type="text" class="validate">
              <label for="nom" data-error="wrong" data-success="right">Nom</label>
            </div>
            <div class="input-field col s12">
              <input id="prenom" type="text" class="validate">
              <label for="prenom" data-error="wrong" data-success="right">Prénom</label>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="email" type="email" class="validate">
                <label for="email" data-error="wrong" data-success="right">Email</label>
            </div>
            <div class="input-field col s12">
              <input id="mdp" type="password" class="validate">
              <label for="mdp" data-error="wrong" data-success="right">Mot de Passe</label>
            </div>
            <div class="input-field col s12">
              <input id="mdpcheck" type="password" class="validate">
              <label for="mdpcheck" data-error="wrong" data-success="right">Répétez Mot de Passe</label>
            </div>
            <input class="waves-btn btn" type="submit" name="" value="Valider">
          </div>
        </form>
      </main>


<?php include('../../vue/includes/footer.php') ?>
