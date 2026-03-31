<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">
<!-- ce DOCTYPE est nécessaire avec IE pour les marges automatiques -->
<html>
<head>
<title>WR CLicker : Affichage d'erreur</title>
 <meta NAME="Author" CONTENT="Grégoire Maréchal">
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
  <!-- appel feuille de style -->
 <link href="style.css" type="text/css" rel="stylesheet" media="all">
 </head>
 <!-- ci-dessous traitement du retour d'information après insertion -->
<?php
// récupération du nombre de lignes traitées - dans le cas où on est après une insertion
	echo "<p class='resultat'>Confirmation<br /> Vous vous êtes bien connecté, vous allez être redirigé dans quelques secondes.</p>";
  header("refresh:3;url=jeu.php"); 
?>
 <!-- Lien pour retourner à la page initiale -->
 <a href="index.php">Retour accueil</a>
<body>
</html>