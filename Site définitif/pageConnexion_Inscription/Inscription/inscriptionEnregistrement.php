<?php
session_start();

if (empty($_POST["nomInscription"]) || empty($_POST["prenomInscription"]) || empty($_POST["emailInscription"]) || empty($_POST["mdpInscription"])) {
    //renvoie l'utilisateur vers la page connexion.php et affiche un message d'erreur
    $_SESSION['champManquant'] = "Veuillez saisir tous les champs pour pouvoir vous inscrire.";
    header("Location: ../Connexion/connexion.php");
    exit;
} else {
    //récupération des données rentrées par l'utilisateur
    $nomInscription = $_POST["nomInscription"];
    $prenomInscription = $_POST["prenomInscription"];
    $emailInscription = $_POST["emailInscription"];
    $mdpInscription = $_POST["mdpInscription"];
    $dateInscription = date("Y-m-d");
    $cle = rand(1000000, 9000000);

    $mdpHash = md5($mdpInscription);

    //inclusion de la base de données
    include "../../bddacces.php";

    //requête pour envoyer les données dans la base de données
    $requete = 'INSERT INTO adherent (nom, prenom, mot_de_passe, mail, date_inscription, cle) VALUES ("'.$nomInscription.'","'.$prenomInscription.'","'.$mdpHash.'","'.$emailInscription.'","'.$dateInscription.'",'.$cle.')';
    $ok = $connexion->exec($requete);

    //récupération des données pour envoyer le mail de confirmation
    $recupUser = 'SELECT * FROM adherent WHERE mail = :mailUser';
    $reponse = $connexion->prepare($recupUser);

    $reponse->bindParam(':mailUser', $emailInscription);

    $reponse->execute();

    $rowCount = $reponse->rowCount();
    $recup = $reponse->fetch();

    if ($rowCount > 0 && $ok) {
        $_SESSION['id'] = $recup['id'];
        $_SESSION['cle'] = $recup['cle'];
        $_SESSION['emailInscription'] = $emailInscription;
        $_SESSION['prenomInscription'] = $prenomInscription;
        header("Location: inscriptionR.php");
    } else {
        $_SESSION['erreurIncription'] = "Erreur dans l'inscription";
        header("Location: ../Connexion/connexion.php");
    }
}