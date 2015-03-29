<?php

session_start();

/////////////////////////////////////////////////////////////////
//////////////////////////// INCLUDE  ///////////////////////////
/////////////////////////// VARIABLES ///////////////////////////
/////////////////////////////////////////////////////////////////

  include 'fonction.php';

  // Variables pour la connexion
  $server = 'localhost';
  $user = 'root';
  $password = 'root';
  $dataBase = 'site_recette';

  // Variables pour la connexion
  $titre = $_POST['titre'];
  $photo = $_POST['photo'];
  $contenu = $_POST['contenu'];
  $plat = $_POST['type'];
  $difficulte = $_POST['difficulte'];
  $regime = $_POST['regime'];
  $prix = $_POST['prix'];

  /////////////////////////////////////////////////////////////////
  ///////////////////////// APPEL FONCTIONS ///////////////////////
  /////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////

  // Connexion à la BDD
  $bdd = connexion($server, $user, $password, $dataBase);
  $titre = mysqli_real_escape_string($bdd, $titre);
  $contenu = mysqli_real_escape_string($bdd, $contenu);

  newRecette($titre, $photo, $contenu, $plat, $difficulte, $regime, $prix, $bdd);

  deco($bdd);

?>
