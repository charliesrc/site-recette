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

  // Variables
  $commentaire = $_POST['commentaire'];
  $id = $_GET['id'];

  /////////////////////////////////////////////////////////////////
  ///////////////////////// APPEL FONCTIONS ///////////////////////
  /////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////

  // Connexion à la BDD

  $bdd = connexion($server, $user, $password, $dataBase);

  newCom($commentaire, $id, $bdd);

  deco($bdd);

?>
