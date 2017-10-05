<?php session_start();

// Je verifie toutes les infos renseigné en premier lieu

// Si tous les éléments obligatoires sont renseigné
if (isset($_POST['name_project']) AND isset($_POST['date_real']) AND isset($_POST['montant_devis']) AND isset($_POST['name_customer']) AND isset($_POST['categorie'])) {

  // ID généré automatiquement donc inutile de le verifier

  // nom du projet
  $name_project = htmlspecialchars($_POST['name_project']);

  // date delai
  $date_real = htmlspecialchars( $_POST['date_real']);
  // regex pour verifier le format
    if (preg_match("#(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)#", $date_real))
    {
      $date_real = str_replace('/', '-', $date_real);
      $date_real = date('Y-m-d', strtotime($date_real));
    }
    else {
      echo "ça marche pas";
      // faire break pour renvoyer message derreur apres redirection
    }


  // date creation généré automatique avec  now() pendant l'insertion

  // var superglobale ID
  $admin_ID = $_SESSION['id'];
  // echo  'id : '. $_SESSION['id']. '<br>';

  // nom du client
  $name_customer = htmlspecialchars($_POST['name_customer']);
  // limiter à 30 caracteres
  if (strlen($name_customer) < 30) {
      $name_customer = strtoupper($name_customer);
  }
  else {
    // renvoyer vers page creation avec message derreur
    // break le code
  }


  // vérifier qu'il s'agit d'un nbr
  $montant_devis = (int) htmlspecialchars( $_POST['montant_devis']);
  if (!is_int($montant_devis) OR $montant_devis == 0) {
    // ce n'est PAS un entier !!';
    // renvoyer vers page creation avec message derreur
    // break le code
  }

  // nom du projet
  $city = htmlspecialchars($_POST['city']);
  if (strlen($city)> 50) {
    //renvoyer vers page creation car ville trop longue
  }

  $categorie = htmlspecialchars( $_POST['categorie']);

// ICI appeler la fonction du model pour inserer un nouveau projet
include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/model/espace_admin/espace_admin.php');
add_project($name_project, $date_real, $name_customer, $montant_devis, $categorie, $city);
header('Location: http://localhost/moreauandsons/controler/espace_admin/espace_admin.php');
}


else
{
  // redirection vers la page est prévenir que tous les champs n'ont pas été correctement renseignés
}

?>
