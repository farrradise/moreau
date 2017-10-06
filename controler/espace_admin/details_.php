<?php session_start();

// Je verifie toutes les infos renseignés en premier lieu

// Si tous les champs de la table sont bien renseignés
if (isset($_POST['name_step']) AND isset($_POST['date_step']))
{

  // ID automatique

  // ID projets
  $ID_projets = $_SESSION["id_projet"]; // ne pas oublier de le supprimer dès que l'insertion est réaliser

  // intitule_etape max 100 char
  $intitule_etape = htmlspecialchars($_POST['name_step']);
  if (strlen($intitule_etape) > 100) {
    // rediriger vers une page details avec un message d'erreur
  }

  // etat par défaut 0

  // date_expiration
  $date_expiration = htmlspecialchars($_POST['date_step']);
  // regex pour verifier le format
    if (preg_match("#(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)#", $date_expiration))
    {
      $date_expiration = str_replace('/', '-', $date_expiration);
      $date_expiration = date('Y-m-d', strtotime($date_expiration));
    }
    else {
      echo "ça marche pas";
      // faire break pour renvoyer message derreur apres redirection
    }


    // ICI appeler la fonction du model pour inserer un nouveau projet
    include($_SERVER['DOCUMENT_ROOT'].'/moreauandsons/model/espace_admin/espace_admin.php');
    add_step($ID_projets, $intitule_etape, $date_expiration);
    unset($_SESSION['id_projet']);
    header("Location: http://localhost/moreauandsons/controler/espace_admin/details.php?id_projet=$ID_projets");


}
else {
  // renvoyer un vers la page détails avec un message d'erreur
}
