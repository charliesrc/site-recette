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
  <script src="js/less.js" type="text/javascript"></script>
  <title>MIAM'IMAC</title>
</head>
<body>
  <div id="row-connexion"class="row" style="margin:0">
    <div class="col-md-6 col-md-offset-3">
      <h1>CONNEXION</h1>
    </div>
  </div>

  <div class="row" style="margin:0">
    <div id="form" class="col-md-6 col-md-offset-3">

      <form class="form-horizontal" action="script-connexion.php" method="post">
      <fieldset>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="mail">Login :</label>
        <div class="col-md-4">
        <input id="login" name="login" type="text" placeholder="Ton login de cuistot" class="form-control input-md" required="">

        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="mail">Mot de passe :</label>
        <div class="col-md-4">
        <input id="mdp" name="mdp" type="password" placeholder="Ton mdp top secret" class="form-control input-md" required="">

        </div>
      </div>

      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="submit"></label>
        <div class="col-md-4">
          <button id="submit" name="submit" class="btn btn-block btn-success">Valider</button>
        </div>
      </div>

      </fieldset>
      </form>
    </div>
  </div>


  </div>
</body>
</html>
