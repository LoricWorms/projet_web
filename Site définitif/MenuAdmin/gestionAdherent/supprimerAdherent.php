<?php
session_start();
// Vérifier si la référence du livre à supprimer a été fournie dans l'URL
if(isset($_GET['id'])) {   

    include '../../bddacces.php';
    
    $id = $_GET['id'];

    //Vérification des entrées dans la table recuperation_mdp
    $selectRecupMdp = "SELECT * FROM recuperation_mdp WHERE idUserAdherent = :id";
    $reponseSelectRecupMdp = $connexion->prepare($selectRecupMdp);
    $reponseSelectRecupMdp->bindValue(':id', $id);
    $reponseSelectRecupMdp->execute();

    $rowCountRecupMdp = $reponseSelectRecupMdp->rowCount();
    $fetchRecupMdp = $reponseSelectRecupMdp->fetch();

    //Vérification des entrées dans la table emprunt
    $selectEmprunnt = "SELECT * FROM emprunt WHERE id_adherent = :id";
    $reponseSelectEmprunt = $connexion->prepare($selectEmprunnt);
    $reponseSelectEmprunt->bindValue(':id', $id);
    $reponseSelectEmprunt->execute();

    $rowCountEmprunt = $reponseSelectEmprunt->rowCount();
    $fetchemprunt = $reponseSelectEmprunt->fetch();

    //ENTREE POUR RECUPERATION_MDP ET EMPRUNT
    //S'il y a des entrées dans RECUP_MDP
    if($rowCountRecupMdp > 0) {
        //On supprime les entrées où l'id est = à $id
        $deleteRequeteRecupMdp = "DELETE FROM recuperation_mdp WHERE idUserAdherent = :id";
        $deleteRecupMdp = $connexion->prepare($deleteRequeteRecupMdp);
        $deleteRecupMdp->bindValue(':id', $id);
        $deleteRecupMdp->execute();

        //S'il y a des entrée dans EMPRUNT
        if($rowCountEmprunt > 0) {
            //On supprime les entrées avec l'id $id
            $deleteRequeteEmprunt = "DELETE FROM emprunt WHERE id_adherent = :id";
            $deleteEmprunt = $connexion->prepare($deleteRequeteEmprunt);
            $deleteEmprunt->bindValue(':id', $id);
            $deleteEmprunt->execute();

            //Toutes les entrées sont supprimées on peut tranquillement supprimés l'utilisateur
            $delete_query = "DELETE FROM adherent WHERE id = $id";

            if ($connexion->query($delete_query)) {
                // Rediriger vers la page de gestion des adhérents avec un message de succès
                $_SESSION['deleteSuccess'] = "Utilisateur supprimé avec succès";
                header("Location: gestionAdherents.php");
            } else {
                // Rediriger vers la page de gestion des adhérents avec un message d'erreur
                $_SESSION['deleteError'] = "Utilisateur non supprimé";
                header("Location: gestionAdherents.php?delete_error=true");
                
            }
        
        //Sinon s'il n'y a pas d'entrées dans les emprunts on supprime l'utilisateur de façon normale
        } else {
            $delete_query = "DELETE FROM adherent WHERE id = $id";
    
            if ($connexion->query($delete_query)) {
                // Rediriger vers la page de gestion des adhérents avec un message de succès
                $_SESSION['deleteSuccess'] = "Utilisateur supprimé avec succès";
                header("Location: gestionAdherents.php");
            } else {
                // Rediriger vers la page de gestion des adhérents avec un message d'erreur
                $_SESSION['deleteError'] = "Utilisateur non supprimé";
                header("Location: gestionAdherents.php?delete_error=true");
                
            }
        }
    //ENTREE EMPRUNT SEULEMENT
    } else {
        //Sinon s'il y a des entrées dans les emprunts et qu'il n'y en a pas dans la réinitialisation de mot de passe
        if($rowCountEmprunt > 0) {
            //On supprime les entrées avec l'id $id
            $deleteRequeteEmprunt = "DELETE FROM emprunt WHERE id_adherent = :id";
            $deleteEmprunt = $connexion->prepare($deleteRequeteEmprunt);
            $deleteEmprunt->bindValue(':id', $id);
            $deleteEmprunt->execute();

            //Toutes les entrées sont supprimées on peut tranquillement supprimés l'utilisateur
            $delete_query = "DELETE FROM adherent WHERE id = $id";

            if ($connexion->query($delete_query)) {
                // Rediriger vers la page de gestion des adhérents avec un message de succès
                $_SESSION['deleteSuccess'] = "Utilisateur supprimé avec succès";
                header("Location: gestionAdherents.php");
            } else {
                // Rediriger vers la page de gestion des adhérents avec un message d'erreur
                $_SESSION['deleteError'] = "Utilisateur non supprimé";
                header("Location: gestionAdherents.php?delete_error=true");
                
            }
        } else {
            //Sinon s'il y a aucun des 2 cas on supprime l'utilisateur de façon normale
            $delete_query = "DELETE FROM adherent WHERE id = $id";
    
            if ($connexion->query($delete_query)) {
                // Rediriger vers la page de gestion des adhérents avec un message de succès
                $_SESSION['deleteSuccess'] = "Utilisateur supprimé avec succès";
                header("Location: gestionAdherents.php");
            } else {
                // Rediriger vers la page de gestion des adhérents avec un message d'erreur
                $_SESSION['deleteError'] = "Utilisateur non supprimé";
                header("Location: gestionAdherents.php?delete_error=true");
                
            }
        }
    }

} else {
    header("Location: gestionAdherents.php");
}
?>