<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/model/connexion_sql.php');

function add_project($nom_projet, $delai, $nom_client, $budget, $categorie)
{
    global $bdd;
    $req = $bdd->prepare('INSERT INTO projets (nom_projet, delai, date_creation, admin_ID, etat_archive, nom_client, budget, categorie, ville)
    VALUES(:nom_projet, :delai, now(), :admin_ID, 0, :nom_client, :budget, :categorie, :city)');
    $req->execute(array(
      'nom_projet' => $nom_projet,
      'delai' => $delai,
      'admin_ID' => $_SESSION['id'],
    	'nom_client' => $nom_client,
    	'budget' => $budget,
      'categorie' => $categorie,
      'city' => $city
    	));

}



function get_projects($id)
{
    global $bdd;

    $req = $bdd->prepare('SELECT ID, nom_projet, DATE_FORMAT(delai, \'%d/%m/%Y\') AS delai, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation, nom_client, budget, categorie, ville FROM projets WHERE admin_ID = :admin_ID ORDER BY date_creation DESC');
    $req -> execute(array('admin_ID'=>$id));
    $projets = $req->fetchAll();


    return $projets;
}
