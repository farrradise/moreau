<?php session_start();

include_once('model/connexion_sql.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('controler/homepage/index.php');
}
