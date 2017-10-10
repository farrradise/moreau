<?php session_start();

include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/model/espace_admin/espace_admin.php');

if (isset($_GET['id_projet']))
{

$id_project = (int) htmlspecialchars($_GET['id_projet']);
delete_project($id_project);
}


if (isset($_GET['archive']))
{
$id_project = (int) htmlspecialchars($_GET['archive']);
archive_project($id_project);
}

header('Location: http://localhost/moreauandsons/controler/espace_admin/espace_admin.php');
