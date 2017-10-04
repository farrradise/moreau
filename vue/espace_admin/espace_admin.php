<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/header.php');
 ?>

   <div class="nav-content">
     <ul class="tabs tabs-transparent">
       <li class="tab"><a href="#encours">Projets en cours</a></li>
       <li class="tab"><a class="active" href="#creation">Créer un projet</a></li>
       <li class="tab"><a href="#archives">Les archives</a></li>
    </ul>
  </div>
</nav>
</header>

<main>

  <!-- ICI presenter les projets en cours avec une boucle  + plus tard donner la possibilité de trier par catégorie-->
  <div id="encours" class="row">
    <?php
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
        <label>Catégories <em>(plusieurs choix possible)</em> : </label> <br>
        <input type="checkbox" name="cat_extension" id="extension" />
        <label style="margin-left : 15px" for="extension">Extension </label>
        <input type="checkbox" name="cat_renovation" id="renovation" />
        <label style="margin-left : 15px" for="renovation">Rénovations </label>
        <input type="checkbox" name="cat_construction" id="construction" />
        <label style="margin-left : 15px" for="construction">Construction </label>
        <input type="checkbox" name="cat_surelevation" id="surelevation" />
        <label style="margin-left : 15px" for="surelevation">Surélévation </label>

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
