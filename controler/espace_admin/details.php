<?php session_start();
// Si la session est ouverte je donne l'accès à la page
if (isset($_SESSION['admin']) AND isset($_GET['id_projet'])) {
  $_SESSION['admin'] = 'off';
  $_SESSION['id_projet'] = (int) htmlspecialchars($_GET['id_projet']);

 // On demande d'afficher les projets de l'admin de la session
 include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/model/espace_admin/espace_admin.php');
 $id_projet = $_SESSION['id_projet'];
 $ONEproject = get_details_project($id_projet);
 $get_all_steps = get_all_steps($id_projet);
 $get_all_missions = get_all_missions();




 // mettre un code pour valider en vert quand toutes les missions sont à l'état 1
 // quand dans table mission grace à boucle toutes les missions avec un id_etape = à l'id renseigné (selon l'admin) ont un état = 1 (fait)
 // il faut changer lupdate avec update_step_state($id, $etat);
//
// foreach ($get_all_steps as $step) {
//   // $etat_etape = 1;
//
//   $get_all_missions_by_step = get_all_missions_by_step($step['ID']);
//   foreach ($get_all_missions_by_step as $mission) {
//     // $etat_etape = 1;
//         // echo $mission['etape_ID']. '<br>';
//         // echo $step['ID'] . '<br>';
//         // echo "<br> stepID <br>";
//         // var_dump((int)$step['ID']);
//         // echo "<br> mission[etape_ID] <br>";
//         // var_dump((int)$mission['etape_ID']);
//
//     if($mission['etape_ID'] == $step['ID'])
//     {
//       if ($mission['etat'] != 1 )
//       {
//       $etat_etape = 0;
//       }
//
//
//     }
//
//     if (!isset($etat_etape) OR $etat_etape != 0)
//     {
//       update_step_state($step['ID'], 1);
//       $etat_etape = 1;
//     }
//     else
//     {
//       update_step_state($step['ID'], 0);
//     }
//   }
//   // echo '<br> stop <br>';
//
// }

  include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/espace_admin/details.php');
  $_SESSION['admin']= 'on';
  // sinon je renvoie vers l'accueil
} else {

  header('Location: http://localhost/moreauandsons/controler/homepage/index.php');
}
