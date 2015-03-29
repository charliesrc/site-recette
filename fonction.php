<?php

session_start();

// Connexion BDD
function connexion($server, $user, $password, $dataBase){
  $bdd = mysqli_connect($server, $user, $password, $dataBase);

  if (!$bdd) {
    die('Erreur de connexion : ' . mysqli_connect_error());
  }
  else{
    // echo ("Connect ");
    return $bdd;
  }
}

function inscription($prenom, $nom, $adresse, $code, $pays, $mail, $login, $mdp, $userType, $bdd){

  try{
    mysqli_autocommit($bdd, FALSE); // transaction
    $req_verif_pseudo = "SELECT Login FROM User WHERE Login = '$login'";
    $reponse_verif = mysqli_query($bdd, $req_verif_pseudo);
    if(mysqli_num_rows($reponse_verif) >= 1){
      //Pseudo utilisé
      echo 'Ce pseudo est pris !';
      mysqli_rollback($bdd);
    }
    else{
      //Pseudo libre
      $query = "INSERT INTO UserProfile (Prenom, Nom, Adresse, CodePostal, Pays, Mail) VALUES ('$prenom', '$nom', '$adresse', '$code', '$pays', '$mail')";
      mysqli_query($bdd, $query);
      $idUser = mysqli_insert_id($bdd);
      // echo 'newUserProfile';
      // echo $idUser;
      $req_user = "INSERT INTO User (Id, Login, mdp, userType) VALUES ('$idUser', '$login', '$mdp', '$userType')";
      mysqli_query($bdd, $req_user);
      // echo ' newUser';
      mysqli_commit($bdd); // validation de la transaction
      mysqli_free_result($reponse_verif);
      header('Location: http://localhost:8888/connexion.php');
    }
  }
  catch (mysqli_sql_exception $e){
    mysqli_rollback($bdd);
    throw $e;
  }

}


// Connexion de l'utilisateur
function connexionUser($login, $mdp, $bdd){

  $reqConnectUser = "SELECT * FROM User WHERE Login = '$login' AND mdp = '$mdp' LIMIT 1";
  $result = mysqli_query($bdd, $reqConnectUser);
  $row = mysqli_num_rows($result);
  if($row == 1){
    $_SESSION['login'] = $login;
    foreach ($result as $key => $value) {
      foreach ($value as $key2 => $value2) {
        if($key2 == 'Id'){
          $_SESSION['id']= $value2;
        }
      }
    }
    header('Location: http://localhost:8888/accueil.php');
  }
  else{
    echo "Mauvais pseudo/mdp";
  }
}

//Poster recette
function newRecette($titre, $photo, $contenu, $plat, $difficulte, $regime, $prix, $bdd){

  $post_recette = "INSERT INTO Recette (AuteurId, Photo, Titre, Contenu, Type, Difficulte, Regime, Prix) VALUES ('{$_SESSION['id']}', '$photo', '$titre', '$contenu', '$plat', '$difficulte', '$regime', '$prix')";
  mysqli_query($bdd, $post_recette);
  header('Location: http://localhost:8888/accueil.php');
}

//Poster commentaire
function newCom($commentaire, $id, $bdd){

  $post_com = "INSERT INTO Commentaire (Recette_id, Auteur, Contenu) VALUES ('$id', '{$_SESSION['id']}', '$commentaire')";
  mysqli_query($bdd, $post_com);
  header('Location: http://localhost:8888/recette.php?id='.$id);

}

function noteCom($id, $note, $bdd){

  $verifNote = "SELECT * FROM Note_recette WHERE user_id = '{$_SESSION['id']}' AND recette_id='$id' LIMIT 1";
  $verifResult = mysqli_query($bdd, $verifNote);
  $row = mysqli_num_rows($verifResult);
  if($row == 0){
    $note_com = "INSERT INTO Note_recette (recette_id, user_id, Valeur) VALUES ('$id', '{$_SESSION['id']}', '$note')";
    mysqli_query($bdd, $note_com);
  }
  else{
    $note_modif = "UPDATE Note_recette SET Valeur ='$note' WHERE user_id='{$_SESSION['id']}' AND recette_id='$id'";
    $result1 = mysqli_query($bdd, $note_modif);
  }

  header('Location: http://localhost:8888/recette.php?id='.$id);

}

// Affiche les 10 derniers login créés.
function printLogin($bdd){
  $req_user = "SELECT Login FROM User LIMIT 10";
  $result = mysqli_query($bdd, $req_user);
  var_dump($result);
  foreach ($result as $key => $value) {
    foreach ($value as $key2 => $value2) {
      echo "<br/>key =".$key2." value =".$value2."<br/>";
    }
  }
}

//Afficher le mot de passe et le login recherché
function printLoginMdp($recherche, $bdd){
  $req_login = "SELECT Login, mdp FROM User WHERE Login='$recherche' LIMIT 10";
  $result = mysqli_query($bdd, $req_login);
  foreach ($result as $key => $value) {
    foreach ($value as $key2 => $value2) {
      echo "<br/>key =".$key2." value =".$value2."<br/>";
    }
  }
}

//Modifier le mot de passe de mirabelle
function newMdp($newPassword, $userModif, $bdd){
  $req_modif = "UPDATE User SET mdp ='$newPassword' WHERE Login='$userModif'";
  $result1 = mysqli_query($bdd, $req_modif);
}

// Déconnexion de la BDD
function deco($bdd){
  if($deco = mysqli_close($bdd)){
    // echo " Deconnect\n";
  }
  else{
    echo "problème";
  }
}

?>
