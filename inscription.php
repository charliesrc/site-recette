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

  <div class="row" style="margin:0">
    <div class="col-md-6 col-md-offset-3">
      <h1 id="inscription">INSCRIPTION</h1>
    </div>
  </div>

  <div class="row" style="margin:0">
    <div id="form" class="col-md-6 col-md-offset-3">

      <form class="form-horizontal" action="script-inscription.php" method="post">
      <fieldset>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="prenom">Prénom :</label>
        <div class="col-md-4">
        <input id="prenom" name="prenom" type="text" placeholder="Ton prénom" class="form-control input-md" required="">

        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="nom">Nom :</label>
        <div class="col-md-4">
        <input id="nom" name="nom" type="text" placeholder="Ton nom" class="form-control input-md" required="">

        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="adresse">Adresse :</label>
        <div class="col-md-4">
        <input id="adresse" name="adresse" type="text" placeholder="Où habites-tu ?" class="form-control input-md">

        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="code">Code Postal :</label>
        <div class="col-md-4">
        <input id="code" name="code" type="text" placeholder="Ton code postal" class="form-control input-md">

        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="pays">Pays :</label>
        <div class="col-md-4">
        <input id="pays" name="pays" type="text" placeholder="Ton pays" class="form-control input-md">

        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="mail">eMail :</label>
        <div class="col-md-4">
        <input id="mail" name="mail" type="text" placeholder="Ton adresse @ !" class="form-control input-md" required="">

        </div>
      </div>

      <hr>

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

  </body>
</html>
