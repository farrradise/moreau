<?php session_start();

// Si la session est ouverte je donne l'accès à la page
if (isset($_SESSION['admin'])) {
  $_SESSION['admin'] = 'off';
  include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/espace_admin/espace_admin.php');
  $_SESSION['admin']= 'on';
  // sinon je renvoie vers l'accueil
} else {

  header('Location: http://localhost/moreauandsons/vue/homepage/index.php');
}
