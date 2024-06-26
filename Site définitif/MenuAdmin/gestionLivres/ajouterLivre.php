<?php
session_start();
?>
<head>
<link rel="stylesheet" href="../../style.css">
</head>
<?php
// Vérifier si le formulaire a été soumis
if (isset($_POST['titre']) && isset($_POST['auteur']) && isset($_POST['langue']) && isset($_POST['annee']) && isset($_POST['cat'])) {
    if(!empty($_POST['titre']) && !empty($_POST['titre']) && !empty($_POST['titre']) && !empty($_POST['titre']) && !empty($_POST['titre'])) {
        include '../../bddacces.php';
    
        // Récupérer les données du formulaire
        $titre = $_POST['titre'];
        $auteur = $_POST['auteur'];
        $langue = $_POST['langue'];
        $annee = $_POST['annee'];
        $cat = $_POST['cat'];
        
        // Requête pour ajouter le livre dans la base de données
        $query = "INSERT INTO livre (titre, auteur, langue, annee, id_cat) VALUES ('$titre', '$auteur', '$langue', '$annee', '$cat')";
        
        if ($connexion->query($query)) {
            echo "<h2>Livre ajouté avec succès.</h2>";
            echo "<main>"; 
            echo "<button><a href='gestionLivres.php'>Retour</a></button>";
            echo "</main>";
        } else {
            echo "Erreur lors de l'ajout du livre";
        }
    } else {
        $_SESSION['livreChampVide'] = "Veuillez remplir tous les champs";
        header('Location: gestionLivres.php');
    }

} else {
    header("Location: gestionLivres.php");
}
?>
