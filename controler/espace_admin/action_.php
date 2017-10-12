<?php

if (isset($_POST['action'])) {


    foreach($get_all_missions as $mission)
    {
      $la_mission =  'mission_'. $mission['ID'];

      if (isset($_POST[$la_mission])) {

        if($_POST['submit'] == "effacer")
        {
          delete_mission($mission['ID']);
        }
        elseif ($_POST['submit'] == "valider")
        {
          validate_mission($mission['ID']);
        }
        elseif ($_POST['submit'] == "à faire")
        {
          unvalidate_mission($mission['ID']);
        }
      }
    } // end loop
    // header('Location: http://localhost/moreauandsons/controler/espace_admin/details.php?id_projet='.$_SESSION['id_projet']."'");
}
