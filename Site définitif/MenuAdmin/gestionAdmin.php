<?php
session_start();
if(isset($_SESSION['admin']) && $_SESSION['admin']) {


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Administrateur</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" href="../images/Bookinerie_logo-removebg-preview.png"/>
</head>
<body>
    <h2>Menu administrateur</h2>
    <ul class="menu-admin">
        <li><a href="gestionAdherent/gestionAdherents.php">Gestion Adhérents</a></li>
        <li><a href="gestionLivres/gestionLivres.php">Gestion Livres</a></li>
        <li><a href="../index.php">Retour accueil</a></li>
        <li><a href="../pageConnexion_Inscription/Deconnexion/logout.php">Se déconnecter</a></li>
    </ul>
    <footer>
        <p>&copy; 2024 La Bookinerie. Tous droits réservés.</p>
    </footer>
</body>
</html>
<?php
} else {
    header('Location: ../index.php');
}