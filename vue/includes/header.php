<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Moreau and Sons | page d'accueil </title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" type="image/png" href="logo.ico" />
      <link rel="stylesheet" href="http://localhost/moreauandsons/css/main.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.js">




      <!-- <link href="vue/blog/main.css" rel="stylesheet" /> -->
      <!-- <link rel="stylesheet" href="css/normalize.css"> -->
    </head>


    <body>
      <header class="">
        <nav class="teal darken-1 nav-extended">
          <div class="nav-wrapper">
            <a href="/moreauandsons/index.php" class="brand-logo"><h1>MOREAU&Sons</h1></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
              <li>
                <a href="#login" class="modal-trigger">
                  <a href=<?php if (isset($_SESSION["prenom"])) {echo '"http://localhost/moreauandsons/controler/espace_admin/espace_admin.php"';} else {echo '"#login"';}?> class="modal-trigger">
                    <span style="line-height : 10px;">
                    <?php if (isset($_SESSION["prenom"])){echo $_SESSION['prenom']. ' ';} ?>
                    </span>
                  <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
            <ul id="mobile-demo" class="side-nav">
              <li>
                <a href=<?php if (isset($_SESSION["prenom"])) {echo '"http://localhost/moreauandsons/controler/espace_admin/espace_admin.php"';} else {echo '"#login"';}?> class="modal-trigger">
                  <span style="line-height : 10px;" class="teal-text">
                  <?php if (isset($_SESSION["prenom"])){echo $_SESSION['prenom']. ' ';} ?>
                  </span> <br>
                  <i class="fa fa-user fa-2x teal-text" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
