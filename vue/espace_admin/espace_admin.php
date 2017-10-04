<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/header.php');
 ?>

   <div class="nav-content">
     <ul class="tabs tabs-transparent">
       <li class="tab"><a class="active" href="#encours">Projets en cours</a></li>
       <li class="tab"><a href="#creation">Créer un projet</a></li>
       <li class="tab"><a href="#archives">Les archives</a></li>
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
            <?php //echo $projet['nom_projet']; ?>
            <!-- <em>le <?php //echo $billet['date_creation_fr']; ?></em> -->
        <?php //echo $billet['contenu']; ?>
        <!-- <em><a href="commentaires.php?billet=<?php //echo $billet['id']; ?>">Commentaires</a></em> -->


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
              <img class="activator" src='' alt="rien">
            <?php  }  ?>
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4"><?php echo $projet['nom_projet'];?><i class="fa fa-plus-circle right" aria-hidden="true"></i></span>
            <p>Démarrage : <?php echo $projet['date_creation']?> </p>
            <p>Remise des clés : <?php echo $projet['delai']?></p>
            <p>Client : <?php echo $projet['nom_client']?> </p>
            <p>Budget : <?php echo $projet['budget']?>€ </p>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
            <p>Here is some more information about this product that is only revealed once clicked on.</p>
          </div>
          <div class="card-action row">
            <a title="supprimer le projet, attention action irréversible" class="col s1" href="#"> <i class="fa fa-trash" aria-hidden="true"></i></a>
            <a title="archiver le projet, utile lorsqu'il est terminé" class="col s1" href="#"><i class="fa fa-folder-open" aria-hidden="true"></i></a>
            <a class="" href="#">ajout étape</a>
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

</main>



<!-- ICI je vais devoir mettre un modal selon la situation (dans le controler donc) -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/modal_logout.php')?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/footer.php') ?>
