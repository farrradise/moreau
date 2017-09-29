<?php

// verification des informations bien rentrées
if (isset($_POST["email"]) AND isset($_POST["mdp"])) {

  include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/model/signin/add_account.php');
  $mdp = password_hash(htmlspecialchars($_POST['mdp']), PASSWORD_DEFAULT);

  // recuperer la liste des mails existants
  $mail_list = existing_mail();
  $existingmail = false;
  $mail = $_POST['email'];

  // faire une boucle pour voir si le mail renseigner est unique
  foreach($mail_list as $cle => $unmail)
  {
    echo 'cle = '. $cle . '<br>';
    if ($mail == $mail_list[$cle]['email']) {
      $existingmail = true;
      break;
    }
  }

  if ($existingmail == false) {
    echo 'votre mail ne correspond a aucun profil';
  } else {
    echo 'bravo';
  }

// pseudo code
// OK verifier que le mail existe dans la BDD
// une fois la requete réalisé crypter le mdp renseigner
// et le comparer au mdp de l'entrée du mail avec un WHERE mail =


// isset($_POST["mdp2"]) AND $_POST["mdp"] === $_POST["mdp2"]

}
// enlever les balises + crypter le mdp
  // $nom = htmlspecialchars($_POST['nom']) ;
  // $prenom = htmlspecialchars($_POST['prenom']);
