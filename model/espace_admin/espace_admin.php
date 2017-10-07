<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/model/connexion_sql.php');

function add_project($nom_projet, $delai, $nom_client, $budget, $categorie, $city)
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

    $req = $bdd->prepare('SELECT ID,
    nom_projet,
    DATE_FORMAT(delai, \'%d/%m/%Y\') AS delai,
    DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation,
    nom_client,
    budget,
    categorie,
    ville
    FROM projets
    WHERE admin_ID = :admin_ID
    ORDER BY date_creation DESC');
    $req -> execute(array('admin_ID'=>$id));
    $projets = $req->fetchAll();


    return $projets;
}






function get_details_project($id_project) {

  global $bdd;

  $req = $bdd->prepare('SELECT ID,
    nom_projet,
    DATE_FORMAT(delai, \'%d/%m/%Y\') AS delai,
    DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation,
    nom_client, budget,
    categorie,
    ville
    FROM projets
    WHERE ID = :ID');
  $req -> execute(array('ID'=>$id_project));
  $ONEproject = $req->fetch();


  return $ONEproject;

}





function add_step($ID_projets, $intitule_etape, $date_expiration)
{
    global $bdd;
    $req = $bdd->prepare('INSERT INTO etapes (ID_projets, intitule_etape, etat, date_expiration)
    VALUES(:ID_projets, :intitule_etape, 0, :date_expiration)');
    $req->execute(array(
      'ID_projets' => $ID_projets,
      'intitule_etape' => $intitule_etape,
      'date_expiration' => $date_expiration
    	));

}



function get_all_steps($id_project)
{
    global $bdd;

    $req = $bdd->prepare('SELECT ID,
      ID_projets,
      intitule_etape,
      etat,
      DATE_FORMAT(date_expiration, \'%d/%m/%Y\') AS date_expiration
    FROM etapes
    WHERE ID_projets = :ID_projet
    ORDER BY date_expiration DESC');
    $req -> execute(array(
      'ID_projet'=> $id_project,
    ));
    $all_steps = $req->fetchAll();


    return $all_steps;
}


function get_all_steps_by_project()
{
    global $bdd;

    $req = $bdd->prepare('SELECT ID,
      ID_projets,
      intitule_etape,
      etat,
      DATE_FORMAT(date_expiration, \'%d/%m\') AS date_expiration
    FROM etapes
    -- WHERE ID_projets = :ID_projet
    ORDER BY date_expiration');
    $req -> execute(array(
      // 'ID_projet'=> $id_project,
    ));
    $all_steps_by_project = $req->fetchAll();


    return $all_steps_by_project;
}





function add_mission($etape_ID, $intitule_mission)
{
    global $bdd;
    $req = $bdd->prepare('INSERT INTO missions (etape_ID, intitule_mission, etat)
    VALUES(:etape_ID, :intitule_mission, 0)');
    $req->execute(array(
      'etape_ID' => $etape_ID,
      'intitule_mission' => $intitule_mission
    	));

}
