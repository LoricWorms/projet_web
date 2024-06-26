<?php
session_start();

include "../../bddacces.php";

//Si l'id et la clé existe et qu'ils ne sont pas vides dans l'url
if(isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['cle']) && !empty($_GET['cle'])) {
    //récupération de l'id et de la clé dans l'URL
    $getid = $_GET['id'];
    $getcle = $_GET['cle'];

    //requete pour récupérer l'adhérent avec l'id et la clé correspondant
    $requeteUser = "SELECT * FROM adherent WHERE id= :id AND cle = :cle";

    $recupUser = $connexion->prepare($requeteUser);

    $recupUser->bindParam(':id', $getid);
    $recupUser->bindParam(':cle', $getcle);

    $recupUser->execute();

    $rowCount = $recupUser->rowCount();
    $donnees = $recupUser->fetch();

    //Ajout d'une sécurité sur la validité du lien qui permet de ne pas que le lien dure plus que le lendemain.
    $dateCreationCompte = $donnees['date_inscription'];
    $dateDuJour = date("Y-m-d");

    if($rowCount > 0 && $dateCreationCompte == $dateDuJour) {
        if($donnees['mailConfirme'] != 1) {
            $requeteConfirmation = "UPDATE adherent SET mailConfirme = :statutConfirmation WHERE id = :idUser";
            $updateUser = $connexion->prepare($requeteConfirmation);

            $updateUser->bindValue(':statutConfirmation', 1);
            $updateUser->bindParam(':idUser', $getid);

            $updateUser->execute();

            $_SESSION['statutAJour'] = "Votre email à bien été confirmé ! Bienvenue 👻";
            header('Location: ../Connexion/connexion.php');
        } else {
            $_SESSION['mailDejaConfirme'] = "Votre email a déjà été confirmé";
            header('Location: ../Connexion/connexion.php');
        }
    } else {
        echo "Votre identifiant ou votre clé d'identifiant est incorrecte ou plus valide";
        echo "<p style='color: red; font-size: 30px;'>Veuillez contacter le support avec dans l'objet votre nom et prénom et comme code d'erreur : ERROR:M41LCONF</p>";
        echo "<a href='mailto:bibliothequeprojet776@gmail.com'>Contacter le support</a>";
    }

} else {
    header('Location: ../../index.php');
}