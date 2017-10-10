<?php session_start();

// Je verifie toutes les infos renseignés en premier lieu
if (isset($_GET['id_step']))
{

include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/model/espace_admin/espace_admin.php');
$id_step = htmlspecialchars($_GET['id_step']);
delete_step($id_step);
}

  header('Location: http://localhost/moreauandsons/controler/espace_admin/details.php?id_projet='.$_SESSION['id_projet'].'\'');
