<?php
include_once('../../vue/includes/header.php');
include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/modal_login.php')?>
      </header>


      <main class="form_inscription row">
        <h4 class="teal-text text-darken-1">Pour s'inscrire, rien de plus simple...</h4>
        <form class="col s12 m6 offset-m3" action="http://localhost/moreauandsons/controler/signin/signin_.php" method="post">
            <div class="input-field col s12">
              <input name="nom" id="nom" type="text" class="validate">
              <label for="nom" data-error="wrong" data-success="right">Nom</label>
            </div>
            <div class="input-field col s12">
              <input name="prenom" id="prenom" type="text" class="validate">
              <label for="prenom" data-error="wrong" data-success="right">Prénom</label>
            </div>
            <div class="input-field col s12">
                <input name="email" id="email" type="email" class="validate">
                <label for="email" data-error="wrong" data-success="right">Email</label>
            </div>
            <div class="input-field col s12">
              <input name="mdp" id="mdp" type="password" class="validate">
              <label for="mdp" data-error="wrong" data-success="right">Mot de Passe</label>
            </div>
            <div class="input-field col s12">
              <input name="mdp2" id="mdp2" type="password" class="validate">
              <label for="mdp2" data-error="wrong" data-success="right">Répetez votre mot de Passe</label>
            </div>
            <div class="input-field col s12">
              <input id="birthdate" type="text" class="datepicker" >
              <label for="birthdate" data-error="wrong" data-success="right">Date de naissance</label>
            </div>
            <input class="waves-btn btn" type="submit" name="" value="Valider">
          </div>
        </form>
      </main>


<?php


if (isset($_GET['info']) AND $_GET['info'] == 'wrong') {
?>

  <div class="grey white-text wrong">
    L'email renseigné a déjà été utilisé,
    <br> Veuillez recommencer.
  </div>

<?php
}

if (isset($_GET['length']) AND $_GET['length'] == 'wrong') {
?>

  <div class="grey white-text wrong wrongmail">
    Le mot de passe est trop court,
    <br> il doit contenir au moins 6 caractères.
    <br> Veuillez recommencer.
  </div>

<?php
}


if (isset($_GET['complete']) AND $_GET['complete'] == 'wrong') {
?>

  <div class="red white-text wrong">
    Vous n'avez pas rempli tous les champs,
    <br> ou les mots de passe ne matchent pas.
    <br> Veuillez recommencer.
  </div>

<?php
}

include('../../vue/includes/footer.php')


?>
