<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/model/connexion_sql.php');

function get_20_projects()
{
    global $bdd;

    $req = $bdd->prepare('SELECT projets.ID, projets.nom_projet, DATE_FORMAT(projets.delai, \'%d/%m/%Y\') AS delai, DATE_FORMAT(projets.date_creation, \'%d/%m/%Y\') AS date_creation, projets.nom_client, projets.budget, projets.categorie, projets.ville, admins.prenom
    FROM  projets
    INNER JOIN admins ON projets.admin_ID = admins.id;
    -- WHERE projets\.admin_ID = admins\.id
    ORDER BY projets.date_creation DESC
    LIMIT 0, 20');
    $req -> execute();
    $last_20_projects = $req->fetchall();
    return $last_20_projects;
}
