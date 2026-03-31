<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>WR Clicker : Erreur</title>
  <meta name="author" content="Grégoire Maréchal">
  <link href="style_op.css" type="text/css" rel="stylesheet" media="all">
</head>
<body>
  <div class="container">
    <div class="form-header">
      <h1>❌ Une erreur est survenue</h1>
    </div>
    
    <?php
      session_start();
      $erreur = $_GET["erreur"];
      echo "<p class='erreur'>$erreur</p>";
      session_destroy();
    ?>

    <div class="form-actions">
      <a href="index.php" class="return-btn">Retour à l'accueil</a>
    </div>
  </div>
</body>
</html>
