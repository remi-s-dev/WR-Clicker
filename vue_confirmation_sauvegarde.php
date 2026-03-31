<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>WR Clicker : Confirmation</title>
    <meta name="Author" content="Grégoire Maréchal">
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="centre">
        <?php
            // récupération du nombre de lignes traitées - dans le cas où on est après une insertion
            $n = $_GET["nb"]; // récupère la valeur transmise dans $url
            echo "<h2>✅ Confirmation</h2>";
            echo "<p>Les valeurs ont bien été sauvegardées.<br>$n ligne(s) mise(s) à jour.</p>";
        ?>
        <br>
        <a href="jeu.php" class="droite">🔙 Retour au jeu</a>
    </div>
</body>
</html>
