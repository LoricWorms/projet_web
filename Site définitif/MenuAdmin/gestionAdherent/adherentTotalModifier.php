<?php
session_start();

include "../../bddacces.php";

if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mdp']) && isset($_POST['mail'])) {
    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mdp']) && !empty($_POST['mail'])) {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $mdp = $_POST['mdp'];
            $mdpHash = md5($mdp);
            $mail = $_POST['mail'];
            $id = $_SESSION['id'];

            // Requête pour mettre à jour les informations de l'adhérent
            $query = "UPDATE adherent SET nom = '$nom', prenom = '$prenom', mot_de_passe = '$mdpHash', mail = '$mail' WHERE id = '$id'";
            if($connexion->exec($query)) {
                echo "<h2>Les informations de l'adhérent ont été mises à jour avec succès.</h2>";
                echo "<main>"; 
                echo "<button><a href='gestionAdherents.php'>Retour</a></button>";
                echo "</main>";
            } else {
                echo "Erreur lors de la mise à jour des informations de l'adhérent";
            }
    } else {
        $_SESSION['champsManquant'] = "Veuillez remplir tous les champs.";
        header('Location: modifierAdherent.php?id='.$_SESSION['id']);
    }
}