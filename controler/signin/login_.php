<?php

// verification des informations bien rentrées
if (isset($_POST["email"]) AND isset($_POST["mdp"])) {

  include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/model/signin/add_account.php');
  // enlever les balises html et hasher le mdp renseingé
  $mdp = sha1(htmlspecialchars($_POST['mdp']));
  $mail = htmlspecialchars($_POST['email']);

  // recuperer la liste des mails existants et verifier que le mail renseigné existe dans la BDD
  $mail_list = existing_mail();
  foreach ($mail_list as $key => $value) {
    $realmail = $mail_list[$key]['email'];
    break;
  }



  // REQUETE QUI DEMANDE DE RECUPERER LE MDP DE LEMAIL CORRESPONDANT
  $check_mdp = check_mdp($mail);
  foreach ($check_mdp as $key => $value) {
    $realpassword = $check_mdp[$key]['password'];
    break;
  }


    if ($mail == $realmail AND $mdp == $realpassword) {
      // ici demarrer la session avec une variable superglobale
      header('Location: http://localhost/moreauandsons/controler/espace_admin/espace_admin.php');
    } else {
      echo 'email ou mot de passe incorrect';
      // renvoyer vers la page d'accueil avec une bulle d'info
    }
  }

// }

  // si false cela veut dire que le mail n'existe pas il faut recommencer
  // if ($existingmail == false AND $motdepasse != true) {
  //   echo 'votre mail ne correspond a aucun profil, ou le mdp est erroné';
  // } else {
  //   echo 'bravo';
  // }

  // var_dump($mdp);
  // echo '<br> et mot de passe <br> ';
  // print_r($lemotdepasse);


// pseudo code
// OK verifier que le mail existe dans la BDD
// OK une fois la requete réalisé crypter le mdp renseigné
// et le comparer au mdp de l'entrée du mail avec un WHERE mail =


// }
