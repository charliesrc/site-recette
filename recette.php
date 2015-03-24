<?php
  // Start the session
  session_start();
  include 'fonction.php';

  // Variables pour la connexion
  $server = 'localhost';
  $user = 'root';
  $password = 'root';
  $dataBase = 'site_recette';

?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="author" content="Charlie DARRAUD Nancy RADJAYA" />
  <meta name="keywords" content="IMAC 1 BDD site recette" />
  <meta name="description" content="site de recette créé par Charlie et Nancy" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet/less" type="text/css" href="css/style.less" />
  <!-- JS -->
  <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <script src="js/less.js" type="text/javascript"></script>
  <title>MIAM'IMAC</title>
</head>
<body>

  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://localhost:8888/index.php">MIAM'IMAC</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="http://localhost:8888/accueil.php">Accueil <span class="sr-only">(current)</span></a></li>
        <li><a href="http://localhost:8888/post-recette.php">Rédiger recette</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            Bonjour <?php print_r($_SESSION['login']); ?>
            <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="http://localhost:8888/user-deconnect.php">Déconnexion</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-right" role="search" action="recherche.php" method="post" >
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Une recette, un ami...">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Rechercher</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

  <?php

  $id = $_GET['id'];

  $bdd = connexion($server, $user, $password, $dataBase);



  $recette = "SELECT ID, Titre, Contenu, Photo, Type, Difficulte, Prix, Date_creation FROM Recette WHERE ID='$id'";
  $result = mysqli_query($bdd, $recette);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  $com = "SELECT * FROM Commentaire INNER JOIN User ON Commentaire.Auteur = User.Id WHERE Commentaire.Recette_id='$id' ORDER BY Commentaire.Id DESC LIMIT 0, 5";
  $result2 = mysqli_query($bdd, $com);

  $calculMoyenne = "SELECT AVG(Valeur) AS moy FROM Note_recette WHERE recette_id=".$_GET['id'];
  $moy = mysqli_query($bdd, $calculMoyenne);
  $result_moy = mysqli_fetch_array($moy, MYSQLI_ASSOC);
  $moyenne = round($result_moy['moy'], 2);
  ?>

  <div class="row" style="margin:0">
    <div id="form" class="col-md-8 col-md-offset-2">
      <h2><?php echo htmlspecialchars($row['Titre']); ?></h2>
      <h5><?php echo htmlspecialchars($row['Date_creation']); ?><h5>
      <?php if($row['Photo'] !== NULL) {?>
      <img src="<?php echo htmlspecialchars($row['Photo']); ?>" alt="Bouffe" style="width:20%; height:20%;" />
      <?php } ?>
      <p><?php echo htmlspecialchars($row['Contenu']); ?><p>
    </div>
  </div>


  <div class="row" style="margin:0">
    <div id="note" class="col-md-2 col-md-offset-2">
      <form class="form-horizontal" action="script-note-com.php?id=<?php echo $id ?>" method="post">
  <fieldset>

  <!-- Form Name -->
  <legend>Note :</legend>

    <!-- Select Basic -->
    <div class="form-group">
    <label class="col-md-4 control-label" for="note"></label>
        <div class="col-md-5">
          <select id="note" name="note" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10,">10</option>
            <option value="11,">11</option>
            <option value="12,">12</option>
            <option value="13,">13</option>
            <option value="14,">14</option>
            <option value="15,">15</option>
            <option value="16,">16</option>
            <option value="17,">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
          </select>
        </div>
    </div>

    <!-- Button -->
    <div class="form-group">
    <label class="col-md-3 control-label" for="singlebutton"></label>
    <div class="col-md-4">
      <button id="singlebutton" name="singlebutton" class="btn btn-primary">Notez !</button>
    </div>
    </div>

    </fieldset>
    </form>
    <hr>
    <p><?php print_r($result_moy['moy']); ?>/20</p>
    </div>

    <div id="com" class="col-md-5 col-md-offset-1">
      <legend>Commentaires :</legend>
    </br>
    <?php
      while ($row2 = mysqli_fetch_array($result2)) {
    ?>

      <h5><?php echo htmlspecialchars($row2['Login']); ?><h5>
      <p><?php echo htmlspecialchars($row2['Contenu']); ?><p>
    <?php
      }

      mysqli_free_result($result2);

    ?>
      </br>

      <form class="form-horizontal" action="script-post-com.php?id=<?php echo $id ?>" method="post">
      <fieldset>

        <p><?php print_r($_SESSION['login']); ?> dit :</p>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-1 control-label" for="commentaire"></label>
        <div class="col-md-5">
        <input id="commentaire" name="commentaire" type="text" placeholder="Donne ton avis" class="form-control input-md" required="">

        </div>
      </div>

      <!-- Button -->
      <div class="form-group">
        <label class="col-md-1 control-label" for="button"></label>
        <div class="col-md-1">
          <button id="button" name="button" class="btn btn-primary">Envoyer</button>
        </div>
      </div>

      </fieldset>
      </form>
    </div>
  </div>

  <?php


  mysqli_free_result($result);

  deco($bdd);


  ?>

</body>
</html>
