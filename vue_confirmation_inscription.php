<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>WR Clicker : Confirmation</title>
  <meta name="author" content="Grégoire Maréchal">
  <link href="style.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>
  <div class="container confirm">
    <h1>Confirmation d'inscription</h1>

    <?php
      $nb_lignes = $_GET["nb"]; // récupère le nombre de lignes insérées
      echo "<p class='resultat'>✅ Les informations ont bien été enregistrées !<br>
      🔢 Nombre de lignes insérées : <strong>$nb_lignes</strong></p>";
    ?>

    <a href="index.php" class="return-btn">🏠 Retour à l'accueil</a>
  </div>
</body>
</html>
