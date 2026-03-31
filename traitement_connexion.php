<?php
$nickname = $_POST["nickname"];
$mdp_utilisateur = $_POST["mdp_utilisateur"];
session_start();

if(empty($nickname) || empty($mdp_utilisateur))
{
    $message_erreur = "ATTENTION : L'un des champs n'a pas été rempli correctement, veuillez vérifier";
    header("Location: vue_erreur.php?erreur=$message_erreur");
    exit();
}
else
{
    include 'fonctions.php';

    $joueur = connexion($nickname, $mdp_utilisateur);

    if($joueur != false)
    {
        $_SESSION['nickname']  = $nickname;
        $_SESSION['Id_Joueur'] = $joueur['Id_Joueur']; // nouveau
        header("Location: vue_confirmation.php");
        exit();
    }
    else
    {
        $message_erreur = "Utilisateur inexistant";
        header("Location: vue_erreur.php?erreur=$message_erreur");
    }
}
?>