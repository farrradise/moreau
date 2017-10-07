<?php session_start();

if (isset($_GET['id_step']) AND isset($_POST['mission_name']))
{


  $ID_projets = $_SESSION["id_projet"]; // ne pas oublier de le supprimer dès que l'insertion est réaliser

// verifier les informations renseignées

// ID automatique

// etape_ID
  $etape_ID = htmlspecialchars($_GET['id_step']);

// intitule_mission
  $intitule_mission = htmlspecialchars($_POST['mission_name']);
  if (strlen($intitule_mission) > 150) {
    header("Location: http://localhost/moreauandsons/controler/espace_admin/details.php?result=wrong&id_projet=$ID_projets");
  }





      // ICI appeler la fonction du model pour inserer une nouvelle mission
      include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/model/espace_admin/espace_admin.php');
      add_mission($etape_ID, $intitule_mission);
      header("Location: http://localhost/moreauandsons/controler/espace_admin/details.php?result=success&id_projet=$ID_projets");


}
else
{
  header("Location: http://localhost/moreauandsons/controler/espace_admin/details.php?result=wrong&id_projet=$ID_projets");
}







?>
