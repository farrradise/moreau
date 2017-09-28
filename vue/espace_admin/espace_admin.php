

<?php
include_once('../../vue/includes/header.php');
 ?>
 
 <div class="nav-content">
 <ul class="tabs tabs-transparent">
 <li class="tab"><a href="#test1">Test 1</a></li>
 <li class="tab"><a class="active" href="#test2">Test 2</a></li>
 <li class="tab disabled"><a href="#test3">Disabled Tab</a></li>
 <li class="tab"><a href="#test4">Test 4</a></li>
</ul>
</div>
</nav>
<div id="test1" class="col s12">Test 1</div>
<div id="test2" class="col s12">Test 2</div>
<div id="test3" class="col s12">Test 3</div>
<div id="test4" class="col s12">Test 4</div>
</header>



<!--
ICI je vais devoir mettre un modal selon la situation (dans le cotroller donc)
SI pas encore loger, demander à se loger, si session ouverte, faire un lien classique de l'icone -->
<?php //include('../../vue/includes/modal_login.php') ?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/includes/modal_logout.php')?>
      </header>
<?php include('../../vue/includes/footer.php') ?>
