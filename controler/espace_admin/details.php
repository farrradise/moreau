<?php session_start();

// Si la session est ouverte je donne l'accès à la page
if (isset($_SESSION['admin']) AND isset($_GET['id_projet'])) {
  $_SESSION['admin'] = 'off';
  $_SESSION['id_projet'] = (int) $_GET['id_projet'];

 // On demande d'afficher les projets de l'admin de la session
 include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/model/espace_admin/espace_admin.php');
 $id_projet = htmlspecialchars($_GET['id_projet']);
 $ONEproject = get_details_project($id_projet);
 $get_all_steps = get_all_steps($id_projet);


  include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/espace_admin/details.php');
  $_SESSION['admin']= 'on';
  // sinon je renvoie vers l'accueil
} else {

  header('Location: http://localhost/moreauandsons/vue/homepage/index.php');
}
