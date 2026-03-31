<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>WR Clicker : Résultats de recherche</title>
  <meta name="author" content="Grégoire Maréchal">
  <link href="style.css" type="text/css" rel="stylesheet" media="all">
</head>
<body>
  <div class="container">
    <div class="form-header">
      <h1>🔍 Résultats de recherche</h1>
    </div>
    
    <?php
      $Id_Joueur = $_POST["Id_Joueur"];
      include 'fonctions.php';
      $joueur = obtenir_par_id($Id_Joueur); // appel de la fonction
      $nb = count($joueur); // nombre trouvé

      if ($nb == 0) { // aucun pour cet ID
        echo "<p>Aucun membre trouvé</p>";
      } else { // $nb > 0 donc on a trouvé 1
        $Id_Joueur = $joueur['Id_Joueur'];
        $Email_utilisateur = $joueur['Email_utilisateur'];
        $nickname = $joueur['nickname'];
        $mdp_utilisateur = $joueur['mdp_utilisateur'];}
        ?>
        
        <form method="POST" action="traitement_update.php" enctype="application/x-www-form-urlencoded">
  <div class="form-group">
    <label for="id">ID Joueur :</label>
    <input type="text" name="Id_Joueur" id="id" value="<?php echo $Id_Joueur; ?>" readonly>
  </div>
  
  <div class="form-group">
    <label for="email">Email :</label>
    <input type="email" name="Email_utilisateur" id="email" value="<?php echo $Email_utilisateur; ?>" required>
  </div>
  
  <div class="form-group">
    <label for="nickname">Nom d'utilisateur :</label>
    <input type="text" name="nickname" id="nickname" value="<?php echo $nickname; ?>" required>
  </div>
  
  <div class="form-group">
    <label for="mdp">Mot de passe :</label>
    <input type="password" name="mdp_utilisateur" id="mdp" value="<?php echo $mdp_utilisateur; ?>" required>
  </div>
  
  <div class="form-actions">
    <button type="submit" name="submit" class="submit-btn">🗑️ Supprimer</button>
  </div>
</form>

<ul>
  <li><a href="index.php" class="return-btn">🏠 Retour à l'accueil</a></li>
</ul>

      
    
    
  </div>
</body>
</html>
