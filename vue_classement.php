<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>WR Clicker - Classement</title>
  <meta name="author" content="Grégoire Maréchal">
  <link href="style.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>
  <div class="container">
    <div class="form-header">
      <h1>🏆 Classement des 5 meilleurs joueurs</h1>
    </div>

    <table class="styled-table">
      <tr>
        <th>ID Joueur</th>
        <th>Nom d'utilisateur</th>
        <th>Score</th>
      </tr>
      <?php
        include 'fonctions.php';
        $classement = array(); 
        $classement = obtenir_classement(); 
        $nb = count($classement); 
        $i = 0;

        while ($i < $nb) {
          $joueur = $classement[$i];
          $id = $joueur['Id_Joueur'];
          $nickname = $joueur['nickname'];
          $score = $joueur['score'];

          echo "<tr><td>$id</td><td>$nickname</td><td>$score</td></tr>";
          $i++;
        }
      ?>
    </table>

    <div class="form-actions">
      <a href='jeu.php' class="return-btn">🏠 Retour au jeu</a>
    </div>
  </div>
</body>
</html>
