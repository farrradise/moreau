<?php include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/header.php') ?>

<?php include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/modal_login.php') ?>
      </header>
      <main>
        <h4 class="teal-text text-darken-1 center">Nos derniers projets </h4>
        <p></p>
        <div class="row" style="width : 90%; padding-top : 10px;">

        <?php
        foreach($get_20_projects as $projet)
        {
        ?>

          <div class="projet card col s12 m6 l3" style="">
            <div class="card-image waves-effect waves-block waves-light">
              <?php
              if ($projet['categorie'] == 'surelevation')
              {
              ?>
                <img class="activator" src='http://localhost/moreauandsons/img/surelevation.jpg'>
              <?php
              }
              elseif ($projet['categorie'] == 'extension')
              {
              ?>
              <img class="activator" src='http://localhost/moreauandsons/img/extension.jpg'>
              <?php

              }
              elseif ($projet['categorie'] == 'demolition')
              {
              ?>
              <img class="activator" src='http://localhost/moreauandsons/img/demolition.jpg'>
              <?php
              }
              elseif($projet['categorie'] == 'construction')
              {
              ?>
              <img class="activator" src='http://localhost/moreauandsons/img/construction.jpg'>
              <?php
              }
              elseif($projet['categorie'] == 'renovation')
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
              <span class="card-title activator grey-text text-darken-4"><?php echo $projet['nom_projet'];?><i class="fa fa-plus-circle teal-text fa-2x text-darken-1" aria-hidden="true"></i></span>
              <p>Démarrage : <?php echo $projet['date_creation']?> </p>
              <p>Remise des clés : <?php echo $projet['delai']?></p>
              <p>Client : <?php echo $projet['nom_client']?> </p>
              <p>Ville : <?php echo $projet['ville']?> </p>
              <p>Budget : <?php echo $projet['budget']?>€ </p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4">Liste des tâches<i class="material-icons right">close</i></span>

              <!-- STEPS LIST -->
              <table class="highlight row">
                <thead class="teal-text text-darken-1">
                  <tr>
                      <th>Intitulé</th>
                      <th>Délai</th>
                      <th>Etat</th>
                  </tr>
                </thead>


                <tbody class="row">
                  <?php
                  foreach ($steps as $step) {
                    if ($step['ID_projets'] == $projet['ID']) {
                  ?>
                  <tr>
                      <td><?php echo $step['intitule_etape'] ?></td>
                      <td><?php echo $step['date_expiration'] ?></td>
                      <td class=<?php if ($step['etat'] == 0) { echo '"red-text center"> <i class="fa fa-circle fa-2x" aria-hidden="true"></i>';} else { echo '"green-text center"> <i class="fa fa-circle fa-2x" aria-hidden="true"></i>">ok';}?></td>
                  </tr>

                  <?php
                    }
                  } ?>

                </tbody>
                <!-- END OF STEPS LIST -->


              </table>
            </div>
            <div class="card-action chef-chantier">
              <p class="">Chef de chantier : <span class="teal-text" style="font-weight : bold; font-size : 1.3em;"> <?php echo $projet['prenom']?> </span></p>
            </div>
          </div>

        <?php
        } //fin de la boucle foreach
        ?>

        </div>

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
      </main>
<?php include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/footer.php') ?>
