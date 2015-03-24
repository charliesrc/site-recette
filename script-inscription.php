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

  // Variables création profil
  $prenom = $_POST['prenom'];
  $nom = $_POST['nom'];
  $adresse = $_POST['adresse'];
  $code = $_POST['code'];
  $pays = $_POST['pays'];
  $mail = $_POST['mail'];

  // Variables création user
  $login = $_POST['login'];
  $mdp = $_POST['mdp'];
  $userType = 'Auteur';

  // Login recherche
  $recherche = "TintinBelge";

  // Nouveau mdp
  $userModif = "mirabelle"; // Le login qui souhaite changer de mdp
  $newPassword = "new"; // Entrer le nouveau mdp

  /////////////////////////////////////////////////////////////////
  ///////////////////////// APPEL FONCTIONS ///////////////////////
  /////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////

  // Connexion à la BDD
  $bdd = connexion($server, $user, $password, $dataBase);

  inscription($prenom, $nom, $adresse, $code, $pays, $mail, $login, $mdp, $userType, $bdd);


  // // Création nouveau UserProfile
  // $idUser = newUserProfile($prenom, $nom, $adresse, $code, $pays, $mail, $bdd);
  //
  // // Création nouveau User (lié correctement avec l'id de UserProfile)
  // newUser($idUser, $login, $mdp, $userType, $bdd);

  // Affiche les 10 derniers Login
  // printLogin($bdd);

  // Affiche le Login et le mdp recherché
  // printLoginMdp($recherche, $bdd);

  // Change le mot de passe de l'user choisi
  // newMdp($newPassword, $userModif, $bdd);

  // Déconnexion
  deco($bdd);

?>
