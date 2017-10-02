<?php include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/header.php') ?>

<?php include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/modal_login.php') ?>
      </header>
<main>
  <h3>Nos derniers projets </h3>

  <?php


  if (isset($_GET['id']) AND $_GET['id'] == 'wrong') {
  ?>

    <div class="grey white-text wrong">
      L'email renseigné n'est pas bon.
      <br> Veuillez recommencer.
    </div>

  <?php
  }
  ?>
  mettre les cartes des 20 derniers projets en lecture seule
</main>
<?php include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/footer.php') ?>
