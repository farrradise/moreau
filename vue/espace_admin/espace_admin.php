<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/header.php');
 ?>

   <div class="nav-content">
     <ul class="tabs tabs-transparent">
       <li class="tab"><a class="active" href="#encours">Projets en cours</a></li>
       <li class="tab" style="position : relative; left : 1%;"><a href="#creation">Créer un projet</a></li>
       <li class="tab" style="position : relative; left : 3%;"><a href="#archives">Les archives</a></li>
    </ul>
  </div>
</nav>
</header>

<main>

  <!-- ICI presenter les projets en cours avec une boucle  + plus tard donner la possibilité de trier par catégorie-->
  <div id="encours" class="row" style="width : 90%; padding-top : 10px;">
    <?php
    foreach($projets as $projet)
    {
    ?>

        <div class="projet card sticky-action col s12 m6 l3" style="">
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
            <span class="card-title activator teal-text text-darken-1"><?php echo $projet['nom_projet'];?><i class="fa fa-plus-circle teal-text fa-2x text-darken-1" aria-hidden="true"></i></span>
            <p>Démarrage : <?php echo $projet['date_creation']?> </p>
            <p>Remise des clés : <?php echo $projet['delai']?></p>
            <p>Client : <?php echo $projet['nom_client']?> </p>
            <p>Ville : <?php echo $projet['ville']?> </p>
            <p>Budget : <?php echo $projet['budget']?>€ <?php echo $projet['ID']?></p>
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


              <tbody class="row">
                <?php
                foreach ($steps as $step) {
                  if ($step['ID_projets'] == $projet['ID']) {
                ?>
                <tr>
                    <td><a class="black-text" href="http://localhost/moreauandsons/controler/espace_admin/details.php"><?php echo $step['intitule_etape'] ?></a></td>
                    <td><?php echo $step['date_expiration'] ?></td>
                    <td class=<?php if ($step['etat'] == 0) { echo '"red-text center"> <i class="fa fa-circle fa-2x" aria-hidden="true"></i>';} else { echo '"green-text center"> <i class="fa fa-circle fa-2x" aria-hidden="true"></i>">ok';}?></td>
                </tr>

                <?php
                  }
                } ?>

              </tbody>
            </table>
          </div>
          <div class="card-action row">
            <a title="supprimer le projet, attention action irréversible" class="col s1" href="#"> <i class="fa fa-trash teal-text" aria-hidden="true"></i></a>
            <a title="archiver le projet, utile lorsqu'il est terminé" class="col s1" href="#"><i class="fa fa-folder-open teal-text" aria-hidden="true"></i></a>
            <a class="teal-text" href="http://localhost/moreauandsons/controler/espace_admin/details.php?id_projet=<?php echo $projet['ID'];?>">ajout étape</a>
          </div>
        </div>
    <?php
    }
    ?>






  </div>

  <!-- ICI formulaire de création de projet  -->
  <div id="creation" class="form_inscription row">
    <div class="col s12 m6 offset-m3">

      <h4 class="teal-text text-darken-1">Créer un projet </h4>
      <form class="create_project" action="http://localhost/moreauandsons/controler/espace_admin/create_project_.php" method="post">
        <label for="name_project">Intitulé du projet :
          <input type="text" name="name_project" value="">
        </label>
        <label for="date_real">Date de remise des clés prévue :
          <input type="date" name="date_real" value="" placeholder="format type : '30/12/2012'">
        </label>
        <label for="montant_devis">Montant du devis :
          <input type="number" name="montant_devis" value="" placeholder="€" min="5000" step="100">
        </label>
        <label for="name_customer">Nom du client :
          <input type="text" name="name_customer" value="">
        </label>
        <label for="city">Ville :
          <input maxlength="50" type="text" name="city" value="">
        </label>
        <label>Catégories : </label> <br>
        <input type="radio" name="categorie" value="extension" id="extension" />
        <label for="extension">Extension </label>
        <input type="radio" name="categorie" value="renovation" id="renovation" />
        <label for="renovation">Rénovations </label>
        <input type="radio" name="categorie" value="construction" id="construction" />
        <label for="construction">Construction </label>
        <input type="radio" name="categorie" value="surelevation" id="surelevation" />
        <label for="surelevation">Surélévation </label>
        <input type="radio" name="categorie" value="demolition" id="demolition" />
        <label for="demolition">Démolition </label>


        <br>
        <input style="margin-top : 20px; " class="btn" type="submit" name="" value="CREER">
      </form>
    </div>
  </div>

  <!-- ICI stocker tous les projets typé archivé  + plus tard donne possibilité de trier par categorie-->
  <div id="archives" class="col s12">Test 4</div>



  <!-- ICI message d'erreur si mauvais renseignements lors de l'envoie du formulaire de création de novueau projet -->
  <?php

  if (isset($_GET['result']) AND $_GET['result'] == 'wrong') {
  ?>

    <div class="red white-text wrong">
      Une erreur est survenue lors de l'enregistrement du nouveau projet.
      <br> Veuillez recommencer.
    </div>

  <?php
  }
  ?>
</main>



<!-- ICI je vais devoir mettre un modal selon la situation (dans le controler donc) -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/modal_logout.php')?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/footer.php') ?>
