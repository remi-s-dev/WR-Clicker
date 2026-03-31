<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>WR Clicker - Jeu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        session_start();
        if (!isset($_SESSION['nickname'])) {
            $message_erreur = "Utilisateur inexistant";
            header("Location: vue_erreur.php?erreur=$message_erreur");
        }
        include 'fonctions.php';
        $Id_Joueur = $_SESSION['Id_Joueur'];
        $bonus_joueur = obtenir_bonus_joueur($Id_Joueur);
        $score_sauvegarde        = obtenir_score($Id_Joueur);
        $dernierbonus_sauvegarde = obtenir_dernierbonus($Id_Joueur);
        $progression             = obtenir_progression($Id_Joueur);

        $prix = [1 => 25, 2 => 150, 3 => 1000, 4 => 5000, 5 => 15000];
        foreach ($bonus_joueur as $b) {
            $prix[$b['Id_Bonus']] = $b['prix_bonus'];
        }
    ?>
    <script>
        var score        = <?= $score_sauvegarde ?>;
        var croissance   = <?= $progression['croissance'] ?>;
        var croissance2  = <?= $progression['croissance2'] ?>;
        var dernierbonus = <?= $dernierbonus_sauvegarde ?>;
        var prixbonus1   = <?= $prix[1] ?>;
        var prixbonus2   = <?= $prix[2] ?>;
        var prixbonus3   = <?= $prix[3] ?>;
        var prixbonus4   = <?= $prix[4] ?>;
        var prixbonus5   = <?= $prix[5] ?>;
    </script>
    <script src="script.js"></script>

    <!-- Header -->
    <div class="haut">
        <div class="gauche">
            <img src="images/logo.png" alt="Logo" width="80">
        </div>
        <h1>WR Clicker</h1>
        <div class="droite">
            <a href="aideJeu.html">❓ Aide</a>
            <a href="vue_classement.php">🏆 Classement</a>
        </div>
    </div>

    <!-- Zone de jeu -->
    <div class="centre">
        <input type="image" id="voiture" src="images/voitur.png" onclick="clic()" alt="Click Car" class="click-btn">

        <div class="score-section">
            <h2>Score :</h2>
            <p id="score2"><span id="score">0</span> km</p>
        </div>

        <div class="buttons-section">
            <button onclick="passif();bonus1();" id="bonus1">🏁 25km</button>
            <button onclick="bonus2()" id="bonus2">💨 150km</button>
            <button onclick="passif();bonus3();" id="bonus3">🛣️ 1000km</button>
            <button onclick="bonus4()" id="bonus4">🚚 5000km</button>
            <button onclick="passif();bonus5();" id="bonus5">🌍 15000km</button>
        </div>
    </div>

    <form action="traitement_sauvegarde.php" method="POST" id="formSauvegarde" enctype='application/x-www-form-urlencoded' class="save-form">
        <input type="hidden" name="score"      id="sauvegarde"        value="0">
        <input type="hidden" name="prixbonus1" id="hidden_prixbonus1" value="25">
        <input type="hidden" name="prixbonus2" id="hidden_prixbonus2" value="150">
        <input type="hidden" name="prixbonus3" id="hidden_prixbonus3" value="1000">
        <input type="hidden" name="prixbonus4" id="hidden_prixbonus4" value="5000">
        <input type="hidden" name="prixbonus5" id="hidden_prixbonus5" value="15000">
        <input type="hidden" name="croissance"   id="hidden_croissance"   value="0">
        <input type="hidden" name="croissance2"  id="hidden_croissance2"  value="1">
        <input type="hidden" name="dernierbonus" id="hidden_dernierbonus" value="0">
        <button type="submit" class="save-btn">💾 Sauvegarder</button>
    </form>
</body>
</html>