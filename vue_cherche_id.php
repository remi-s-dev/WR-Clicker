<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>WR Clicker : Rechercher un joueur</title>
  <meta name="author" content="Grégoire Maréchal">
  <link href="style.css" type="text/css" rel="stylesheet" media="all">
</head>
<body>
  <div class="centre">
    <div class="haut">
      <img src="images/logo.png" alt="Logo WR Clicker" class="gauche">
      <h1>🔍 Rechercher un joueur</h1>
      <a href="index.php" class="droite">Accueil</a>
    </div>

    <form method="POST" action="vue_update.php" enctype="application/x-www-form-urlencoded">
      <div class="form-group">
        <label for="id">ID recherché :</label>
        <input type="text" name="Id_Joueur" id="id" placeholder="Entrez un ID" required>
      </div>
      <button type="submit">Rechercher ID</button>
    </form>
  </div>
</body>
</html>

