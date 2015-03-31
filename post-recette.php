<?php
  // Start the session
  session_start();

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
      <form class="navbar-form navbar-right" role="search" action="recherche.php" method="post">
        <div class="form-group">
          <input type="text" name="recherche" class="form-control" placeholder="Une recette, un ami...">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Rechercher</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="row" style="margin:0">
  <div id="form" class="col-md-6 col-md-offset-3">

    <form class="form-horizontal" action="script-post-recette.php" method="post">
    <fieldset>


    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="titre">Titre de la recette :</label>
      <div class="col-md-4">
      <input id="titre" name="titre" type="text" placeholder="" class="form-control input-md" required="">

      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="titre">URL d'une photo :</label>
      <div class="col-md-4">
      <input id="photo" name="photo" type="text" placeholder="" class="form-control input-md" required="">

      </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="type">Type de recette :</label>
      <div class="col-md-4">
        <select id="type" name="type" class="form-control">
          <option value="Entree">Entrée</option>
          <option value="Plat">Plat</option>
          <option value="Dessert">Dessert</option>
        </select>
      </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="difficulte">Difficulté :</label>
      <div class="col-md-4">
        <select id="difficulte" name="difficulte" class="form-control">
          <option value="Facile">Facile</option>
          <option value="Moyen">Moyen</option>
          <option value="Difficile">Difficile</option>
        </select>
      </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="prix">Prix :</label>
      <div class="col-md-4">
        <select id="prix" name="prix" class="form-control">
          <option value="1">€</option>
          <option value="2">€€</option>
          <option value="3">€€€</option>
        </select>
      </div>
    </div>

    <!-- Multiple Radios -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="regime">Régime</label>
      <div class="col-md-4">
      <div class="radio">
        <label for="regime-0">
          <input type="radio" name="regime" id="regime-0" value="Aucun" checked="checked">
          Aucun
        </label>
    	</div>
      <div class="radio">
        <label for="regime-1">
          <input type="radio" name="regime" id="regime-1" value="Vegetarien">
          Végétarien
        </label>
    	</div>
      <div class="radio">
        <label for="regime-2">
          <input type="radio" name="regime" id="regime-2" value="Halal">
          Halal
        </label>
    	</div>
      <div class="radio">
        <label for="regime-3">
          <input type="radio" name="regime" id="regime-3" value="Casher">
          Casher
        </label>
    	</div>
      </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="contenu">Recette :</label>
      <div class="col-md-4">
        <textarea class="form-control" id="contenu" name="contenu"></textarea>
      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton"></label>
      <div class="col-md-4">
        <button id="singlebutton" name="singlebutton" class="btn btn-block btn-default">Poster !</button>
      </div>
    </div>

    </fieldset>
    </form>
    </div>
  </div>

</body>
</html>
