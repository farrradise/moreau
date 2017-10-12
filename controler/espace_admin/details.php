<?php session_start();
// On demande d'afficher les projets de l'admin de la session
include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/model/espace_admin/espace_admin.php');

$get_all_missions = get_all_missions();

if (isset($_POST['action'])) {
  include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/controler/espace_admin/action_.php');
}


// Si la session est ouverte je donne l'accès à la page
if (isset($_SESSION['admin']) AND isset($_GET['id_projet'])) {
  $_SESSION['admin'] = 'off';
  $_SESSION['id_projet'] = (int) htmlspecialchars($_GET['id_projet']);

 $id_projet = $_SESSION['id_projet'];
 $ONEproject = get_details_project($id_projet);
 $get_all_steps = get_all_steps($id_projet);

// prendre toutes les etapes d'un projet avec une boucle
foreach ($get_all_steps as $le_step) {
  $IDstep = (int)$le_step['ID'];
  // dans cette boucle je reboucle pour prendre toutes les missions en fonction de l'étape en cours
  $all_missions = get_all_missions_by_step($IDstep);
  $state = 1;
  foreach ($all_missions as $mission) {
      if ($mission['etat'] != 1) {
        $state = 0;
        update_step_state($IDstep, $state);
        break;
      }
  }
  update_step_state($IDstep, $state);
}


  include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/espace_admin/details.php');
  $_SESSION['admin']= 'on';

  // sinon je renvoie vers l'accueil
} else {
  header('Location: http://localhost/moreauandsons/controler/homepage/index.php');
}
