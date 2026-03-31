<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion - WR Clicker</title>
  <meta name="author" content="Grégoire Maréchal">
  <link href="style.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>
  <div class="centre">
    <div class="form-header">
      <h1>🔒 Connexion à <span class="highlight">WR Clicker</span></h1>
    </div>

    <form method="POST" action="traitement_connexion.php">
      <div class="form-group">
        <label for="nickname">Nom d'utilisateur :</label>
        <input type="text" name="nickname" id="nickname" required>
      </div>

      <div class="form-group">
        <label for="password">Mot de passe :</label>
        <input type="password" name="mdp_utilisateur" id="password" required>
      </div>

      <button type="submit" class="submit-btn">✅ Se connecter</button>
    </form>
  </div>
</body>
</html>

