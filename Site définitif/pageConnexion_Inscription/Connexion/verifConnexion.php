<?php
session_start();

if (empty($_POST["mailConnexion"]) || empty($_POST["mdpConnexion"])) {
    //renvoie l'utilisateur vers la page connexion.php et affiche un message d'erreur
    $_SESSION['erreurConnexion'] = "Veuillez saisir un mail valide et un mot de passe. ";
    header("Location: connexion.php");
    exit;
} else {
    //récupération des données entrées
    $mailConnexion = $_POST["mailConnexion"];
    $mdpConnexion = $_POST["mdpConnexion"];

    $mdpConnexionHash = md5($mdpConnexion);
    
    //inclusion de la base de données
    include "../../bddacces.php";

    //mise en place de la reqûete pour récupérer l'utilisateur
    $req = "SELECT * FROM adherent WHERE mail= :mailLu AND mot_de_passe= :mdpLu";
    $reponse = $connexion->prepare($req);

    //utilisation de la reqûete préparée pour éviter les injections SQL
    $reponse->bindParam(':mailLu', $mailConnexion);
    $reponse->bindParam(':mdpLu', $mdpConnexionHash);

    //exécution de la requête SQL
    $reponse->execute();

    $numEnreg = $reponse->rowCount();
    
    $donnees = $reponse->fetch();
    $_SESSION['idUser'] = $donnees['id'];

    if ($numEnreg == 0) {
        $_SESSION['erreurConnexionFausse'] = "Le mail et/ou le mot de passe est invalide. ";
        header("Location: connexion.php");
        exit;
    } else {
        if ($donnees['mailConfirme'] == 1) {
            if ($donnees['admin'] == 1) {
                $_SESSION['admin'] = true;
                header('Location: ../../MenuAdmin/gestionAdmin.php');
            }
            else {
                header('Location: ../../index.php');
            }
        } else {
            session_destroy();
            session_start();
            $_SESSION['mailNonConfirme'] = 'Veuillez confirmer votre email.';
            header('Location: connexion.php');
        }
    }


}