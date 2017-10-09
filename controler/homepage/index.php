<?php
// $_SESSION['admin'] == "off";

// On demande d'afficher les 20 derniers projets créés
include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/model/homepage/index.php');
$get_20_projects = get_20_projects();
// var_dump($get_20_projects);
include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/model/espace_admin/espace_admin.php');
$steps = get_all_steps_by_project();

// On affiche la page (vue)
include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/vue/homepage/index.php');


// ICI on doit verifier les infos du modal login
