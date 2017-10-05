<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/header.php');
 ?>
  </nav>
</header>

<main class="">
  <!-- ICI mettre le details d'un etape et la possibilité de modifier/ajouter/supprimer/valider -->
  <div id="details" class="row">
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
        <span class="card-title activator teal-text text-darken-1"><?php echo $ONEproject['nom_projet'];?><i class="fa fa-plus-circle teal-text fa-2x text-darken-1" aria-hidden="true"></i></span>
        <p>Démarrage : <?php echo $ONEproject['date_creation']?> </p>
        <p>Remise des clés : <?php echo $ONEproject['delai']?></p>
        <p>Client : <?php echo $ONEproject['nom_client']?> </p>
        <p>Ville : <?php echo $ONEproject['ville']?> </p>
        <p>Budget : <?php echo $ONEproject['budget']?>€ </p>
      </div>
      <div class="card-reveal">
        <span class="card-title teal-text text-darken-1">Liste étapes<i class="material-icons right">close</i></span>
        <p>Cliquez pour un descriptif.</p>
        <table class="highlight row">
          <thead class="white-text teal darken-1">
            <tr>
                <th>Intitulé</th>
                <th>Délai</th>
                <th>Etat</th>
            </tr>
          </thead>

          <tbody class="">
            <tr>
              <td><a href="http://localhost/moreauandsons/controler/espace_admin/details.php">Nom de l'étape</a></td>
              <td>DD/MM/YY</td>
              <td class="state_step red"></td>
            </tr>
            <tr>
              <td><a href="#">Nom de l'étape</a></td>
              <td>DD/MM/YY</td>
              <td class="state_step red"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-action row">
        <a title="supprimer le projet, attention action irréversible" class="col s1" href="#"> <i class="fa fa-trash teal-text" aria-hidden="true"></i></a>
        <a title="archiver le projet, utile lorsqu'il est terminé" class="col s1" href="#"><i class="fa fa-folder-open teal-text" aria-hidden="true"></i></a>
        <a class="teal-text" href="http://localhost/moreauandsons/controler/espace_admin/details.php?id_projet=<?php echo $projet['ID'];?>">ajout étape</a>
      </div>
    </div>
    <a class="btn teal darken-1" href="http://localhost/moreauandsons/controler/espace_admin/espace_admin.php">Retour</a>
  </div>

</main>



<!-- ICI je vais devoir mettre un modal selon la situation (dans le controler donc) -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/modal_logout.php')?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/footer.php') ?>
