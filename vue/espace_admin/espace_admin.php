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


<div id="encours" class="col s12">Test 1
<?php echo $_SESSION['admin'];?> </div>
<div id="creation" class="col s12">Test 2</div>
<div id="archives" class="col s12">Test 4</div>




<!-- ICI je vais devoir mettre un modal selon la situation (dans le controler donc) -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/modal_logout.php')?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/footer.php') ?>
