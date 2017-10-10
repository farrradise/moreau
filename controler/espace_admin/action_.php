<?php session_start();


include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/model/espace_admin/espace_admin.php');


$get_all_missions = get_all_missions();

if (isset($_POST['action'])) {


    foreach($get_all_missions as $mission)
    {
      $la_mission =  'mission_'. $mission['ID'];
      // echo $test . '<br>';

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
        else
        {
        // rediriger.
        }
        // echo $mission['intitule_mission'];
      }
    ?>

    <?php
      // }  // end of condition
    } // end loop
    header('Location: http://localhost/moreauandsons/controler/espace_admin/details.php?id_projet='.$_SESSION['id_projet']."'");
    // var_dump($_SESSION['id_projet']);
}
