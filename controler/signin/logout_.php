<?php session_start();
// echo $_POST['deconnexion'];
// verification des informations bien rentrées
if (isset($_POST["deconnexion"])) {
  if ($_POST['deconnexion'] == 'oui') {
    // destroy session et unset variable
    unset($_SESSION['prenom']);
    unset($_SESSION['admin']);
    session_destroy();
    header('Location: http://localhost/moreauandsons/controler/homepage/index.php');
  } elseif ($_POST['deconnexion'] == 'non') {
    header('Location: http://localhost/moreauandsons/controler/espace_admin/espace_admin.php');
  }
}
