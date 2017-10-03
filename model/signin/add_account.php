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
}


function existing_mail($mail)
{
    global $bdd;

    $req = $bdd->prepare('SELECT email FROM admins WHERE email = :email');
    $req -> execute(array('email'=>$mail));
    $mail_list = $req->fetchAll();

    return $mail_list;
}



function get_name($mail)
{
  global $bdd;

  $req = $bdd -> prepare('SELECT prenom FROM admins WHERE email =:email');
  $req -> execute(array('email'=>$mail));
  $admin_name = $req->fetchAll();

  return $admin_name;
}


function get_id($mail)
{
  global $bdd;

  $req = $bdd -> prepare('SELECT id FROM admins WHERE email =:email');
  $req -> execute(array('email'=>$mail));
  $admin_id = $req->fetchAll();

  return $admin_id;
}




function check_mdp($mail)
{
    global $bdd;

    $req = $bdd -> prepare('SELECT password FROM admins WHERE email =:email');
    $req -> execute(array('email'=>$mail));
    $mdpcheck = $req->fetchAll();

    return $mdpcheck;
}
