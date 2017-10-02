<?php

$mdplength = strlen($_POST['mdp']);
// verification des informations bien rentrées
if (isset($_POST["nom"]) AND $_POST["nom"] != "" AND
isset($_POST["prenom"]) AND $_POST["prenom"] != "" AND
isset($_POST["email"]) AND $_POST["email"] != "" AND
isset($_POST["mdp"]) AND $_POST["mdp"] != "" AND
isset($_POST["mdp2"]) AND $_POST["mdp"] === $_POST["mdp2"]
) {
// enlever les balises + crypter le mdp
  $nom = htmlspecialchars($_POST['nom']) ;
  $prenom = htmlspecialchars($_POST['prenom']);
  $mail = htmlspecialchars($_POST['email']);
  $mdp = sha1(htmlspecialchars($_POST['mdp']));

  include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/model/signin/add_account.php');

  // recuperer la liste des mails existants
  $mail_list = existing_mail($mail);
  $existingmail = false;

  // faire une boucle pour voir si le mail renseigné est unique
  foreach($mail_list as $cle => $unmail)
  {
    if ($mail == $mail_list[$cle]['email']) {
      $existingmail = true;
      break;
    }
  }

  $tooshort = false;

  if ($mdplength < 5) {
    $tooshort = true;
  }

// si mail déjà existant, prevenir l'user sinon le renvoyer sur son espace d'administration en ouvrant une session

  if ($existingmail == true OR $tooshort == true) {

    if ($existingmail == true AND $tooshort == true) {
      header('Location: http://localhost/moreauandsons/controler/signin/signin.php?info=wrong&length=wrong');
    } elseif ($existingmail == true) {
      header('Location: http://localhost/moreauandsons/controler/signin/signin.php?info=wrong');
    } else {
      header('Location: http://localhost/moreauandsons/controler/signin/signin.php?length=wrong');
    }
  } else {
    add_account($mdp, $mail, $prenom, $nom);
    $_SESSION['prenom'] = $prenom;
    $_SESSION['admin'] = "on";
    header('Location: http://localhost/moreauandsons/controler/espace_admin/espace_admin.php');
  }
}
else {
  header('Location: http://localhost/moreauandsons/controler/signin/signin.php?complete=wrong');
}

// mettre des regex pour verifier les passwords et mail et nom et prenom
