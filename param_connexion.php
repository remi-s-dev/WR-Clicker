<?php
// paramètres de connexion
   $monserveur = "localhost";	// adresse du serveur sql
   $monlogin = "root";	// login
   $monpass = "";		// mot de passe
   $mabase="wr_clicker";	// nom de la BDD

	// connexion au SGBD
	date_default_timezone_set('Europe/Paris');
	$lien_base= mysqli_connect($monserveur,$monlogin,$monpass,$mabase) ;
	mysqli_set_charset ( $lien_base ,  'utf8' );
	
?>