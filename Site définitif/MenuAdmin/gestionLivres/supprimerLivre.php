<?php
session_start();
// Vérifier si la référence du livre à supprimer a été fournie dans l'URL
if(isset($_GET['ref'])) {   

    include '../../bddacces.php';
    
    $ref = $_GET['ref'];
    
    $delete_query = "DELETE FROM livre WHERE ref = $ref";
    
    if ($connexion->query($delete_query)) {
        // Rediriger vers la page de gestion des livres avec un message de succès
        $_SESSION['livreDeleteSuccess'] = "Livre supprimé avec succès.";
        header("Location: gestionLivres.php");
    } else {
        // Rediriger vers la page de gestion des livres avec un message d'erreur
        $_SESSION['livreDeleteError'] = "Erreur dans la suppression du livre.";
        header("Location: gestionLivres.php");
    }
    
    
    $conn->close();
} else {
    header("Location: gestionLivres.php");
    exit();
}
?>
