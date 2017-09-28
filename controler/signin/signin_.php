<?php

if (isset($_POST["nom"]) AND
isset($_POST["prenom"]) AND
isset($_POST["email"]) AND
isset($_POST["mdp"]) AND
isset($_POST["mdp2"]) AND
$_POST["mdp"] === $_POST["mdp2"]
) {

$nom = htmlspecialchars($_POST['nom']) ;
$prenom = htmlspecialchars($_POST['prenom']);
$mail = htmlspecialchars($_POST['email']);
$mdp = password_hash(htmlspecialchars($_POST['mdp']), PASSWORD_DEFAULT);

include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/model/signin/add_account.php');

// ici metter une condition si email deja utilise avec une requete qui fetchAll

$mail_list = existing_mail();
// var_dump($mail_list);

foreach($mail_list as $unmail)
{
  print_r($unmail);
  // if ($mail)
  // $billets[$cle]['titre'] = htmlspecialchars($billet['titre']);
  // $billets[$cle]['contenu'] = nl2br(htmlspecialchars($billet['contenu']));
}
}
//
// add_account($mdp, $mail, $prenom, $nom);
//
//   // header('Location: http://localhost/moreauandsons/index.php');
// } else {
//   echo "raté";
// }
//

// boolean password_verify ( string $password , string $hash )


// PSEUDO CODE
// verifier que j'ai des issets partout
// enlever les balises html
// mettre des regex pour verifier les passwords et mail et nom et prenom
// appeler la fonction add account
