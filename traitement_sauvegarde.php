<?php
session_start();

$score = $_POST["score"];
$nickname = $_SESSION['nickname'];
$Id_Joueur = $_SESSION['Id_Joueur'];

if(!isset($score) || $score === '')
{
    $message_erreur="ATTENTION : Il y a eu un problème lors de la sauvegarde, veuillez réessayer";
    header("Location: vue_erreur.php?erreur=$message_erreur");
    exit();
}
else
{
    include 'fonctions.php';

    $nb_lignes = insert_sauvegarde($score, $nickname);

    sauvegarder_bonus($Id_Joueur, 1, $_POST['prixbonus1']);
    sauvegarder_bonus($Id_Joueur, 2, $_POST['prixbonus2']);
    sauvegarder_bonus($Id_Joueur, 3, $_POST['prixbonus3']);
    sauvegarder_bonus($Id_Joueur, 4, $_POST['prixbonus4']);
    sauvegarder_bonus($Id_Joueur, 5, $_POST['prixbonus5']);

    sauvegarder_progression($Id_Joueur, $_POST['croissance'], $_POST['croissance2']);
    sauvegarder_dernierbonus($Id_Joueur, $_POST['dernierbonus']);

    if($nb_lignes > 0)
    {
        header("Location:vue_confirmation_sauvegarde.php?nb=$nb_lignes");
        exit();
    }
    else
    {
        $message_erreur="Erreur lors de l'insertion des données";
        header("Location: vue_erreur.php?erreur=$message_erreur");
    }
}
?>