<?php

// page contenant les différentes fonctions d'accès à la base

//_______________________________________________________________
function insert_membre($Email_utilisateur, $nickname, $mdp_utilisateur) // insere un nouveau membre  dans la table membres
{
	include 'param_connexion.php'; // fichier externe car la connexion est utilisée dans différentes pages
	$nb_lignes=0; // initialisation de la variable à zéro
	
	// Requete d'insertion MYSQL. 
	$requete= "INSERT INTO joueur (Email_utilisateur,nickname, mdp_utilisateur) VALUES ('$Email_utilisateur','$nickname','$mdp_utilisateur');";
	
	// tentative d'execution de la requete INSERT dans la base
	$reponse_serveur=mysqli_query($lien_base, "$requete");
	if($reponse_serveur==false) // si false : impossible d'exécuter la requête INSERT
	{	
		$message_erreur="Impossible d'executer la requete: $requete " . mysqli_error($lien_base);
		echo $message_erreur;
		die();
		header("Location:vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
		exit(); // interruption de la fonction après redirection
	}
	else // insert réussi
	{
		$nb_lignes=mysqli_affected_rows($lien_base); // compte le nombre de lignes affectées (normalement 1 ligne insérée)

	}

	return $nb_lignes ; // renvoie le nb de lignes insérées : normalement 1


 } // fin fonction insert_membre
 //_______________________________________________________________
 
 function insert_sauvegarde($score, $nickname) // insere le score d'une sauvegarde
 {
	 include 'param_connexion.php'; // fichier externe car la connexion est utilisée dans différentes pages
	 $nb_lignes=0; // initialisation de la variable à zéro
	 
	 // Requete d'insertion MYSQL. 
	 $requete= "UPDATE joueur set score='$score' where nickname='$nickname';";
	 
	 // tentative d'execution de la requete INSERT dans la base
	 $reponse_serveur=mysqli_query($lien_base, "$requete");
	 if($reponse_serveur==false) // si false : impossible d'exécuter la requête INSERT
	 {	
		 $message_erreur="Impossible d'executer la requete: $requete " . mysqli_error($lien_base);
		 echo $message_erreur;
		 die();
		 header("Location:vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
		 exit(); // interruption de la fonction après redirection
	 }
	 else // insert réussi
	 {
		 $nb_lignes=mysqli_affected_rows($lien_base); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
 
	 }
 
	 return $nb_lignes ; // renvoie le nb de lignes insérées : normalement 1
 
 
  } // fin fonction insert_sauvegarde
 
  //_______________________________________________________________
 /*function obtenir_liste_des_joueurs() // fonction qui renvoie un tableau de tous les adherents
 {
	require 'param_connexion.php'; // pour connexion au SGBD
	
	$les_adherents = array(); // création du tableau
	$requete="select * from joueur";
	$resultat_sql = mysqli_query($lien_base, "$requete");
	if($resultat_sql == false) // si impossible d'exécuter la requête SELECT
	{	
		die("Impossible d'executer la requete: $requete " . mysqli_error());
	}
	else // SELECT réussi
	{
		$nb_lignes=mysqli_affected_rows($lien_base); // compte le nombre de lignes du SELECT
		$i=1; // compteur
		while($i<=$nb_lignes)
		{
			// ajout des résultats du select
			$les_adherents[] = mysqli_fetch_array($resultat_sql); 
			$i=$i+1; // incrémentation
		}
		
	}

	return $les_adherents;// le tableau sera vide en cas d'erreur
}// fin fonction()

//_________________________________________________________________

  //_______________________________________________________________
// fin fonction()*/
//______________________________________

function connexion($nickname, $mdp_utilisateur)
{
    require 'param_connexion.php';

    $requete = "SELECT * FROM joueur WHERE nickname='$nickname' AND mdp_utilisateur='$mdp_utilisateur'";
    $resultat_sql = mysqli_query($lien_base, $requete);

    if($resultat_sql === false)
    {
        return false;
    }
    else
    {
        if(mysqli_num_rows($resultat_sql) == 1)
        {
            $joueur = mysqli_fetch_array($resultat_sql);
            return $joueur; // retourne le tableau complet au lieu de true
        }
        else
        {
            return false;
        }
    }
}


function obtenir_par_id($Id_Joueur) // fonction qui renvoie un  adherent
 {
	require 'param_connexion.php'; // pour connexion au SGBD
	
	$joueur = array(); // création du tableau (le résultat du SELECT est toujours un tableau)
	$joueur=array(); // tableau pour extraire le 1er adherent trouvé
	$requete="select * from joueur where Id_Joueur=$Id_Joueur";
	$resultat_sql = mysqli_query($lien_base, "$requete");
	if($resultat_sql == false) // si impossible d'exécuter la requête SELECT
	{	
		die("Impossible d'executer la requete: $requete " . mysqli_error());
	}
	else // SELECT réussi : il ne peut y avoir qu'un adherent
	{
			$joueur[] = mysqli_fetch_array($resultat_sql);
			$joueur=$joueur[0];
			
	}
	return $joueur;// le tableau sera vide en cas d'erreur
}// fin fonction()
//________________________________________

//_______________________________________________________________
function update_membre($Id_Joueur,$Email_utilisateur, $nickname, $mdp_utilisateur) // insere un nouveau membre  dans la table membres
{
	include 'param_connexion.php'; // fichier externe car la connexion est utilisée dans différentes pages
	$nb_lignes=0; // initialisation de la variable à zéro
	
	// Requete d'insertion MYSQL. 
	$requete= "UPDATE  joueur set Email_utilisateur='$Email_utilisateur', nickname='$nickname', mdp_utilisateur='$mdp_utilisateur' where Id_Joueur=$Id_Joueur";
	
	// tentative d'execution de la requete INSERT dans la base
	$reponse_serveur=mysqli_query($lien_base, "$requete");
	if($reponse_serveur==false) // si false : impossible d'exécuter la requête INSERT
	{	
		$message_erreur="Impossible d'executer la requete: $requete " . mysqli_error($lien_base);
		echo $message_erreur;
		die();
		header("Location:vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
		exit(); // interruption de la fonction après redirection
	}
	else // insert réussi
	{
		$nb_lignes=mysqli_affected_rows($lien_base); // compte le nombre de lignes affectées (normalement 1 ligne insérée)

	}

	return $nb_lignes ; // renvoie le nb de lignes insérées : normalement 1


 } // fin fonction update_membre
 function supprimer_membre($Id_Joueur) // insere un nouveau membre  dans la table membres
 {
	 include 'param_connexion.php'; // fichier externe car la connexion est utilisée dans différentes pages
	 $nb_lignes=0; // initialisation de la variable à zéro
	 
	 // Requete d'insertion MYSQL. 
	 $requete= "DELETE from joueur where Id_Joueur=$Id_Joueur";
	 
	 // tentative d'execution de la requete INSERT dans la base
	 $reponse_serveur=mysqli_query($lien_base, "$requete");
	 if($reponse_serveur==false) // si false : impossible d'exécuter la requête INSERT
	 {	
		 $message_erreur="Impossible d'executer la requete: $requete " . mysqli_error($lien_base);
		 echo $message_erreur;
		 die();
		 header("Location:vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
		 exit(); // interruption de la fonction après redirection
	 }
	 else // insert réussi
	 {
		 $nb_lignes=mysqli_affected_rows($lien_base); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
 
	 }
 
	 return $nb_lignes ; // renvoie le nb de lignes insérées : normalement 1
 
 
  }

  function obtenir_classement() 	// fonction qui renvoie un tableau de tous les adherents
  {
	 require 'param_connexion.php'; 		// pour connexion au SGBD
	 
	 $classement = array(); 			// création du tableau
	 
	 $requete="select * from joueur order by score desc limit 5;";
	 $pointeur = mysqli_query($lien_base, "$requete");		//tentative d'exécution de la requête
	 
	 if($pointeur == false) 			// si impossible d'exécuter la requête SELECT
	 {	
		 die("Impossible d'executer la requete: $requete " . mysqli_error());
	 }
	 else // SELECT réussi
	 {
 
		 while ($joueur = mysqli_fetch_array($pointeur) )  	// boucle "tant que..." récupère les lignes une par une
		 {
			 // ajouter des données $un_adherent au tableau $les_adherents
			 $classement[]=$joueur;
		 }
		 
	 }
 
	 return $classement;			// le tableau sera vide en cas d'erreur
}// fin fonction()

 	function sauvegarder_bonus($Id_Joueur, $Id_Bonus, $prix_bonus) {
		require 'param_connexion.php';
		$requete = "INSERT INTO appartenir (Id_Joueur, Id_Bonus, prix_bonus)
					VALUES ('$Id_Joueur', '$Id_Bonus', '$prix_bonus')
					ON DUPLICATE KEY UPDATE prix_bonus = '$prix_bonus'";
		mysqli_query($lien_base, $requete);
	}

	function sauvegarder_dernierbonus($Id_Joueur, $dernierbonus) {
		require 'param_connexion.php';
		$requete = "UPDATE joueur SET dernierbonus='$dernierbonus' WHERE Id_Joueur='$Id_Joueur'";
		mysqli_query($lien_base, $requete);
	}

	function obtenir_bonus_joueur($Id_Joueur) {
		require 'param_connexion.php';
		$bonus = array();
		$requete = "SELECT * FROM appartenir WHERE Id_Joueur='$Id_Joueur'";
		$resultat = mysqli_query($lien_base, $requete);
		while ($ligne = mysqli_fetch_array($resultat)) {
			$bonus[] = $ligne;
		}
		return $bonus;
	}

	function obtenir_dernierbonus($Id_Joueur) {
		require 'param_connexion.php';
		$requete = "SELECT dernierbonus FROM joueur WHERE Id_Joueur='$Id_Joueur'";
		$resultat = mysqli_query($lien_base, $requete);
		$ligne = mysqli_fetch_array($resultat);
		return $ligne['dernierbonus'] ?? 0;
	}

	function obtenir_score($Id_Joueur) {
		require 'param_connexion.php';
		$requete = "SELECT score FROM joueur WHERE Id_Joueur='$Id_Joueur'";
		$resultat = mysqli_query($lien_base, $requete);
		$ligne = mysqli_fetch_array($resultat);
		return $ligne['score'] ?? 0;
	}

	function sauvegarder_progression($Id_Joueur, $croissance, $croissance2) {
		require 'param_connexion.php';
		$requete = "UPDATE joueur SET croissance='$croissance', croissance2='$croissance2' WHERE Id_Joueur='$Id_Joueur'";
		mysqli_query($lien_base, $requete);
	}

	function obtenir_progression($Id_Joueur) {
		require 'param_connexion.php';
		$requete = "SELECT croissance, croissance2 FROM joueur WHERE Id_Joueur='$Id_Joueur'";
		$resultat = mysqli_query($lien_base, $requete);
		$ligne = mysqli_fetch_array($resultat);
		return [
			'croissance'  => $ligne['croissance']  ?? 0,
			'croissance2' => $ligne['croissance2'] ?? 1
		];
	}
   ?>