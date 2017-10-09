<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/header.php');
 ?>
  </nav>
</header>

<main class="details_main">
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
        <span class="card-title activator teal-text text-darken-1"><?php echo $ONEproject['nom_projet'];?></span>
        <p>Démarrage : <?php echo $ONEproject['date_creation']?> </p>
        <p>Remise des clés : <?php echo $ONEproject['delai']?></p>
        <p>Client : <?php echo $ONEproject['nom_client']?> </p>
        <p>Ville : <?php echo $ONEproject['ville']?> </p>
        <p>Budget : <?php echo $ONEproject['budget']?>€ </p>
      </div>
      <div class="card-action row">
          <a class="col s12 btn teal darken-1" href="http://localhost/moreauandsons/controler/espace_admin/espace_admin.php">Retour</a>
      </div>
    </div>

    <div class="col s12 m6 l8 offset-l1">

      <!-- partie collapsible  -->
      <ul class="collapsible col s12" data-collapsible="accordion" style="padding: 0;">
        <H5 class="center white-text blue-grey darken-1" style="text-shadow : 0 1px 1px grey; margin :0; padding: 10px 10px 20px 10px; border-bottom : 3px solid teal ">Détails des étapes </h5>

        <li class="blue-grey-text text-darken-1">
          <div class="row collapsible-header">
            <span class="col s8 teal-text">Intitulé de l'étape</span>
            <span class="col s3 teal-text">Délai</span>
            <span class="col S1"></span>
          </div>
        </li>


        <!-- 1 tab by step  -->
        <?php
        foreach($get_all_steps as $step)
        {
        ?>


        <li>
          <!-- descriptif d'une étape -->
          <div class="row collapsible-header">
            <span><a class="trash" href="index.html"><i class="fa fa-trash teal-text" aria-hidden="true"></i></a></span>
            <span class="col s7 offset-1 teal-text"><?php echo$step['intitule_etape']; ?></span>
            <span class="col s2 teal-text"><?php echo$step['date_expiration']; ?></span>
            <span <?php if ($step['etat'] == 0) { echo 'class="col s1 center"> <i class="fa fa-circle fa-2x red-text" aria-hidden="true"></i>';} else { echo '"col S1 center"> <i class="green-text fa fa-circle fa-2x" aria-hidden="true"></i>';}?></span>
          </div>


          <!-- descriptif des missions de l'étape -->
          <div class="collapsible-body">

            <div class="tableau">
              <form class="" action="http://localhost/moreauandsons/controler/espace_admin/action_.php" method="post">
                <table class="striped row">
                  <thead class="blue-grey-text row">
                    <tr class="">
                      <th class=" col s11" >Missions</th>
                      <th class=" col s1">Etat</th>
                    </tr>
                  </thead>

                  <!-- mettre la boucle ici -->
                  <tbody class="row white">
                    <!-- 1 tab by step  -->
                    <?php
                    foreach($get_all_missions as $mission)
                    {
                      if ($mission['etape_ID'] == $step['ID']) {
                    ?>
                    <tr class="">
                      <td class="col s11">
                        <input type="checkbox" name="mission_<?php echo $mission['ID'];?>" id="<?php echo $mission['ID'];?>" value="<?php echo $mission['ID'];?>">
                        <label for="<?php echo $mission['ID'];?>">
                          <?php echo $mission['intitule_mission']; ?>
                        </label>
                      </td>
                      <td <?php if ($step['etat'] == 0) { echo 'class="center col s1"> <i class="fa fa-circle red-text" aria-hidden="true"></i>';} else { echo '"center col S1"> <i class="green-text fa fa-circle" aria-hidden="true"></i>';}?></td>
                    </tr>
                    <?php
                      }  // end of condition
                    } // end loop for missions

                     ?>
                  </tbody>
                </table>
                <div class="" style="text-align : center;">

                  <?php
                  $is_there_a_mission = 0;
                  foreach($get_all_missions as $mission)
                  {
                    if ($mission['etape_ID'] == $step['ID']) {
                      $is_there_a_mission++;
                    }
                  }// end of loop

                    if ($is_there_a_mission != 0 ) {
                  ?>
                  <input type="hidden" name="action" value="submit" />
                  <input type="submit" class="btn blue-grey darken-1" style="margin-top : 5px;" name="submit" value="effacer">
                  <input type="submit" class="btn blue-grey darken-1" style="margin-top : 5px;" name="submit" value="valider">
                  <input type="submit" class="btn blue-grey darken-1" style="margin-top : 5px;" name="submit" value="à faire">
                  <p style="text-align : center ;">- ou - </p>
                  <?php
                  }
                   ?>

                  <!-- Modal Trigger -->
                  <a class="waves-effect waves-light btn blue-grey darken-1 modal-trigger" style="margin-top : 5px;" href="#mission_<?php echo $step['ID']?>"> Ajouter une mission</a>

                </div>
              </form>

              <!-- Modal Structure -->
              <div id="mission_<?php echo $step['ID']?>" class="modal">
                <div class="modal-content">
                  <!-- form to add a mission -->
                  <div class="row">
                    <form class="" action="http://localhost/moreauandsons/controler/espace_admin/missions_.php?id_step=<?php echo$step['ID'];?>" method="post">
                      <div class="input-field col s9">
                        <input id="mission_name" name="mission_name" type="text" class="validate" required>
                        <label for="mission_name">Nouvelle mission</label>
                      </div>
                      <input class="input-field col s3 btn white teal-text text-darken-1" type="submit" name="" value="ajouter">
                    </form>

                  </div>
                </div>
                <div class="modal-footer">
                  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">X</a>
                </div>
              </div>

            </div>

          </div>


        </li>

      <?php  } // end of loop step
       ?>

      </ul>


      <div class="new-step row">
        <!-- form to create a new step -->
        <div class="col s12" style="border:1px solid lightgrey; box-shadow : 0px 1px 2px gray; padding: 0;">
          <form class="" action="http://localhost/moreauandsons/controler/espace_admin/details_.php" method="post">
            <H5 class="blue-grey darken-1 center white-text" style="text-shadow : 0 1px 1px grey; margin :0; padding: 10px 10px 20px 10px; border-bottom : 3px solid teal ">Pour ajouter une étape : </h5>
              <div class="input-field col s6">
                <input id="name_step" name="name_step" type="text" class="validate" required>
                <label for="name_step">Intitulé de l'étape</label>
              </div>
              <div class="input-field col s6">
                <input id="date_step" name="date_step" type="text" class="validate" required>
                <label for="date_step">Délai prévu <em>(format DD/MM/YYYY)</em></label>
              </div>
              <input class="btn blue-grey darken-1 right" type="submit" name="" value="Ajouter étape">
            </form>
          </div>
          <!-- END form to create a new step -->
        </div>

    </div>
  </div>



  <!-- ICI message d'erreur si mauvais renseignements lors de l'envoie du formulaire de création de nouvelle étape -->
  <?php

  if (isset($_GET['result']) AND $_GET['result'] == 'wrong') {
  ?>

    <div class="red white-text wrong">
      Une erreur est survenue lors de l'enregistrement d'une nouvelle étape ou mission.
      <br><?php echo $_SESSION['prenom'] ?>, merci de recommencer.
    </div>

  <?php
  }
  ?>



  <!-- ICI message de validation lors de création de nouvelle mission -->
  <?php

  if (isset($_GET['result']) AND $_GET['result'] == 'success') {
  ?>

    <div class="green white-text wrong">
      Bravo <?php echo $_SESSION['prenom'] ?>, vous venez d'ajouter une mission.
      <br>Et maintenant, au boulot !
    </div>

  <?php
  }
  ?>

</main>

<?php include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/modal_logout.php')?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/footer.php') ?>
