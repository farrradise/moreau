<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/header.php');
 ?>
  </nav>
</header>

<main class="details_main">
  <!-- ICI mettre le details d'un etape et la possibilité de modifier/ajouter/supprimer/valider -->
  <div id="details" class="row" style="width : 90%; padding-top : 10px;">
    <div class="projet card sticky-action col s12 m6 l3">
      <div class="card-image waves-effect waves-block waves-light">
        <?php
        if ($ONEproject['categorie'] == 'surelevation')
        {
        ?>
          <img class="activator" src='http://localhost/moreauandsons/img/surelevation.jpg'>
        <?php
        }
        elseif ($ONEproject['categorie'] == 'extension')
        {
        ?>
        <img class="activator" src='http://localhost/moreauandsons/img/extension.jpg'>
        <?php

        }
        elseif ($ONEproject['categorie'] == 'demolition')
        {
        ?>
        <img class="activator" src='http://localhost/moreauandsons/img/demolition.jpg'>
        <?php
        }
        elseif($ONEproject['categorie'] == 'construction')
        {
        ?>
        <img class="activator" src='http://localhost/moreauandsons/img/construction.jpg'>
        <?php
        }
        elseif($ONEproject['categorie'] == 'renovation')
        {
        ?>
        <img class="activator" src='http://localhost/moreauandsons/img/renovation.jpg'>
        <?php
        }
        else
        {
        ?>
          <img class="activator" src='' alt="pas d'illu BUG">
        <?php  }  ?>
      </div>
      <div class="card-content">
        <span class="card-title activator teal-text text-darken-1"><?php echo $ONEproject['nom_projet'];?></span>
        <p>Démarrage : <?php echo $ONEproject['date_creation']?> </p>
        <p>Remise des clés : <?php echo $ONEproject['delai']?></p>
        <p>Client : <?php echo $ONEproject['nom_client']?> </p>
        <p>Ville : <?php echo $ONEproject['ville']?> </p>
        <p>Budget : <?php echo $ONEproject['budget']?>€ </p>
      </div>
      <div class="card-action row">
          <a class="col s12 btn teal darken-1" style="position : relative; bottom : 10px;" href="http://localhost/moreauandsons/controler/espace_admin/espace_admin.php">Retour</a>
      </div>
    </div>


    <!-- partie collapsible  -->
    <ul class="collapsible col s12 m6 l8 offset-l1" style="border: 0px;" data-collapsible="accordion">

      <!-- 1 tab by step  -->
      <?php
      foreach($get_all_steps as $step)
      {
      ?>


      <li>
        <div style="display: flexbox; flex-flow : row wrap; justify-content : space-around;" class="row collapsible-header">
          <span class="col s8"><?php echo$step['intitule_etape']; ?></span>
          <span class="col s3">Délai : <?php echo$step['date_expiration']; ?></span>
          <span class="col S1" style="background-color: red; width : 25px;"></span>
        </div>
        <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
      </li>

    <?php  } // end of loop
     ?>

      <!-- form to create a new step -->
      <li>
        <div style="display: flexbox; flex-flow : row wrap; justify-content : space-around;">
          <form class="" action="http://localhost/moreauandsons/controler/espace_admin/details_.php" method="post">
            <p class="center teal-text text-darken-1">Pour ajouter une étape : </p>
            <div class="input-field col s6">
              <input id="name_step" name="name_step" type="text" class="validate" required>
              <label for="name_step">Intitulé de l'étape</label>
            </div>
            <div class="input-field col s6">
              <input id="date_step" name="date_step" type="text" class="validate" required>
              <label for="date_step">Délai prévu <em>(format DD/MM/YYYY)</em></label>
            </div>
            <input class="btn teal darken-1 right" style="margin : 10px;" type="submit" name="" value="Ajouter étape">
          </form>
        </div>
      </li>
      <!-- END form to create a new step -->

    </ul>

  </div>




</main>

<?php include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/modal_logout.php')?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/footer.php') ?>
