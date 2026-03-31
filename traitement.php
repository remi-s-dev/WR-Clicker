<?php
// page de controle de saisie, et appel de fonction d'insertion dans la base

// recuperation des variables du formulaire de annuaire1.php par le tableau associatif $_POST
$nickname=$_POST["nickname"];
$Email_utilisateur=$_POST["Email_utilisateur"];
$mdp_utilisateur=$_POST["mdp_utilisateur"];
// Vérification des champs nom et prenom (si il ne sont pas vides ?)
//if( empty($nom_utilisateur) || empty($email) || empty($motdepasse) )  // le signe || signifie OU
if( empty($nickname)  )  // le signe || signifie OU
{
	$message_erreur="ATTENTION : Le champ nom ou prénom n'a pas été rempli correctement, veuillez vérifier";
	// redirection vers la page vue erreur
	header("Location: vue_erreur.php?erreur=$message_erreur");
	exit(); // interruption après redirection
	
}
else // $nom et $prenom sont corrects  
{
	include 'fonctions.php'; // fichier externe contenant les fonctions d'accès à la base de données
	
	$nb_lignes=insert_membre($Email_utilisateur, $nickname, $mdp_utilisateur); // appel de fonction d'insertion (couche Modele)

	if($nb_lignes > 0) // on a inséré 1 ligne
	{
		header("Location:vue_confirmation_inscription.php?nb=$nb_lignes"); // page de confirmation
		exit(); // interruption de la fonction après redirection
	}
	else // il y a eu une erreur
	{
		$message_erreur="Erreur lors de l'insertion des données";
		// redirection vers la page vue erreur
		header("Location: vue_erreur.php?erreur=$message_erreur");
	}		
	
	
} // fin si empty nom


?>
