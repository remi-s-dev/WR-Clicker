<?php
// page de controle de saisie, et appel de fonction d'insertion dans la base

// recuperation des variables du formulaire
$bouton=$_POST['submit']; 
$Id_Joueur=$_POST["Id_Joueur"];
$Email_utilisateur=$_POST["Email_utilisateur"];
$nickname=$_POST["nickname"];
$mdp_utilisateur=$_POST["mdp_utilisateur"];
// Vérification des champs nom et prenom (si il ne sont pas vides ?)
if($bouton == "Enregistrer")
{
	if( empty($nickname) || empty($Email_utilisateur)  )  // le signe || signifie OU
		{
		$message_erreur="ATTENTION : Le champ nickname ou Email_utilisateur n'a pas été rempli correctement, veuillez vérifier";
	// redirection vers la page vue erreur
		header("Location: vue_erreur.php?erreur=$message_erreur");
		exit(); // interruption après redirection
	
		}
	else // $nom et $prenom sont corrects  
		{	
			include 'fonctions.php'; // fichier externe contenant les fonctions d'accès à la base de données
	
			$nb_lignes=update_membre($Id_Joueur, $Email_utilisateur, $nickname, $mdp_utilisateur); // appel de fonction de modification (couche Modele)

			if($nb_lignes > 0) // on a inséré 1 ligne
			{
						header("Location:vue_confirmation_inscription.php?nb=$nb_lignes"); // page de confirmation
						exit(); // interruption de la fonction après redirection
			}
				else // il y a eu une erreur
					{
					$message_erreur="Aucune modification";
		// redirection vers la page vue erreur
					header("Location: vue_erreur.php?erreur=$message_erreur");
					}		
		}
}
else {
	include 'fonctions.php'; // fichier externe contenant les fonctions d'accès à la base de données
	
	$nb_lignes=supprimer_membre($Id_Joueur); // appel de fonction de modification (couche Modele)

		if($nb_lignes > 0) // on a inséré 1 ligne
		{
			header("Location:vue_erreur.php?nb=$nb_lignes"); // page de confirmation
			exit(); // interruption de la fonction après redirection
		}
			else // il y a eu une erreur
			{
				$message_erreur="Aucune modification";
		// redirection vers la page vue erreur
				header("Location: vue_erreur.php?erreur=$message_erreur");
			}		
		}

 // fin si empty nom


?>
