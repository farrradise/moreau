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
    AND etat_archive = 0
    ORDER BY delai DESC');
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




function get_all_missions()
{
    global $bdd;

    $req = $bdd->prepare('SELECT *
    FROM missions');
    $req -> execute(array());
    $get_all_missions = $req->fetchAll();


    return $get_all_missions;
}


function validate_mission($id)
{
  global $bdd;

  $id = (int) $id;
  $req = $bdd->prepare('UPDATE missions
  SET etat = :etat
  WHERE ID = :id');
  $req -> execute(array(
    'id' => $id,
    'etat' => 1));

}


function unvalidate_mission($id)
{
  global $bdd;

  $id = (int) $id;
  $req = $bdd->prepare('UPDATE missions
  SET etat = :etat
  WHERE ID = :id');
  $req -> execute(array(
    'id' => $id,
    'etat' => 0));

}



function delete_mission($id)
{
  global $bdd;

  $id = (int) $id;
  $req = $bdd->prepare('DELETE FROM missions
  WHERE ID = :id');
  $req -> execute(array('id' => $id));

}


function update_step_state($id, $etat)
{
  global $bdd;

  $id = (int) $id;
  $etat = (int) $etat;

  $req = $bdd->prepare('UPDATE etapes
  SET etat = :etat
  WHERE ID = :id');
  $req -> execute(array(
    'id' => $id,
  'etat' => $etat));
}


function get_all_missions_by_step($id_step)
{
    global $bdd;

    $req = $bdd->prepare('SELECT *
    FROM missions
    WHERE etape_ID = :etape_ID');
    $req -> execute(array(
      'etape_ID'=> $id_step,
    ));

    $all_steps = $req->fetchAll();
    return $all_steps;
}



function delete_step($ID)
{
  global $bdd;

  $ID = (int) $ID;
  $req = $bdd->prepare('DELETE FROM etapes
    WHERE ID = :id;');
  $req -> execute(array('id' => $ID));

}


function delete_project($ID)
{
  global $bdd;

  $ID = (int) $ID;
  $req = $bdd->prepare('DELETE FROM projets
    WHERE ID = :id;');
  $req -> execute(array('id' => $ID));

}



function archive_project($ID)
{
  global $bdd;

  $ID = (int) $ID;
  $req = $bdd->prepare('UPDATE projets
    SET etat_archive = 1
    WHERE ID = :id;');
  $req -> execute(array('id' => $ID));

}



function get_archived_projects($id)
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
    AND etat_archive = 1
    ORDER BY delai DESC');
    $req -> execute(array('admin_ID'=>$id));
    $projets = $req->fetchAll();


    return $projets;
}
