<?php
  // Start the session
  session_start();
  include 'fonction.php';

  // Variables pour la connexion
  $server = 'localhost';
  $user = 'root';
  $password = 'root';
  $dataBase = 'site_recette';

  //Variables
  $recherche = $_POST['recherche'];

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

  <?php

  $bdd = connexion($server, $user, $password, $dataBase);

  $req_recherche = "SELECT * FROM Recette, User WHERE Recette.Titre LIKE '%$recherche%' OR User.Login LIKE '%$recherche%' LIMIT 5";
  $result = mysqli_query($bdd, $req_recherche);

  while ($row = mysqli_fetch_array($result)) {
  ?>

  <div class="row" style="margin:0">
    <div id="form" class="col-md-8 col-md-offset-3">
      <h2><?php echo htmlspecialchars($row['Titre']); ?></h2>
      <h5><?php echo htmlspecialchars($row['Date_creation']); ?><h5>
        <?php if($row['Photo'] !== NULL) {?>
        <img src="<?php echo htmlspecialchars($row['Photo']); ?>" alt="Bouffe" style="width:20%; height:20%;" />
        <?php } ?>      <p><?php echo htmlspecialchars($row['Contenu']); ?><p>
      <a href="http://localhost:8888/recette.php?id=<?php echo $row['ID'] ?>">Voir la recette</a>
    </div>
  </div>


  <?php
  }

  mysqli_free_result($result);

  deco($bdd);


  ?>

</body>
</html>
