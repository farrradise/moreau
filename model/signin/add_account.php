<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/model/connexion_sql.php');

function add_account($mdp, $mail, $prenom, $nom)
{
    global $bdd;
    $req = $bdd->prepare('INSERT INTO admins (password, email, prenom, nom)
    VALUES(:mdp, :mail, :prenom, :nom)');
    $req->execute(array(
      'nom' => $nom,
      'mail' => $mail,
    	'prenom' => $prenom,
    	'mdp' => $mdp
    	));

    $ajouter = "Votre espace d'administration a bien été créé";

    return $ajouter;



    // $offset = (int) $offset;
    // $limit = (int) $limit;
    //
    // $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT :offset, :limit');
    // $req->bindParam(':offset', $offset, PDO::PARAM_INT);
    // $req->bindParam(':limit', $limit, PDO::PARAM_INT);
    // $req->execute();
    // $billets = $req->fetchAll();


    // return $billets;
}


function existing_mail()
{
    global $bdd;

    $req = $bdd->query('SELECT email FROM admins');
    $mail_list = $req->fetchAll();


    return $mail_list;
}