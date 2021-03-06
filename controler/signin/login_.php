<?php session_start();

// verification des informations bien rentrées
if (isset($_POST["email"]) AND isset($_POST["mdp"])) {

  include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/model/signin/add_account.php');
  // enlever les balises html et hasher le mdp renseingé
  $mdp = sha1(htmlspecialchars($_POST['mdp']));
  $mail = htmlspecialchars($_POST['email']);
  $realmail = "";
  $realpassword = "";

  // recuperer la liste des mails existants et verifier que le mail renseigné existe dans la BDD
  $mail_list = existing_mail($mail);
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


  // REQUETE QUI DEMANDE DE RECUPERER LE PRENOM DE LEMAIL CORRESPONDANT
  $admin_name = get_name($mail);
  foreach ($admin_name as $key => $value) {
    // $admin_id = $admin[$key]['id'];
    $admin_name = $admin_name[$key]['prenom'];
    // echo $admin_name;
    break;
  }


  // REQUETE QUI DEMANDE DE RECUPERER L ID DE LEMAIL CORRESPONDANT
  $admin_id = get_id($mail);
  foreach ($admin_id as $key => $value) {
    $admin_id = $admin_id[$key]['id'];
    break;
  }


    if ($mail == $realmail AND $mdp == $realpassword) {
      // ici demarrer la session avec une variable superglobale
      $_SESSION['prenom'] = $admin_name;
      $_SESSION['admin'] = "on";
      $_SESSION['id'] = $admin_id;
      header('Location: http://localhost/moreauandsons/controler/espace_admin/espace_admin.php');
    } else {
      header('Location: http://localhost/moreauandsons/controler/homepage/index.php?id=wrong');
    }
  }
