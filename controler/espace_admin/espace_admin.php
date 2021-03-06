<?php session_start();

// Si la session est ouverte je donne l'accès à la page
if (isset($_SESSION['admin'])) {
  $_SESSION['admin'] = 'off';

 // On demande d'afficher les projets de l'admin de la session
 include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/model/espace_admin/espace_admin.php');
 $projets = get_projects($_SESSION['id']);

 $steps = get_all_steps_by_project();

 $projets_archives = get_archived_projects($_SESSION['id']);

  include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/espace_admin/espace_admin.php');
  $_SESSION['admin']= 'on';
  // sinon je renvoie vers l'accueil
} else {

  header('Location: http://localhost/moreauandsons/controler/homepage/index.php');
}
