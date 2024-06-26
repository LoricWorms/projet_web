<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des emprunts</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="icon" href="../../images/Bookinerie_logo-removebg-preview.png" />
</head>
<body>
<?php
 include '../../bddacces.php';

// Récupérer la référence du livre depuis l'URL
$ref = $_GET['ref'];

// Requête pour obtenir l'historique des emprunts du livre
$historique_query = "SELECT date_deb, date_fin, id_adherent FROM emprunt WHERE ref_livre = $ref";
$historique_result = $connexion->query($historique_query);

// Vérifier s'il y a des emprunts pour ce livre
if ($historique_result->rowCount() > 0) {
    echo "<h2>Historique des emprunts</h2>";
    echo "<table>";
    echo "<tr><th>Date de l'emprunt</th><th>Date du retour</th><th>Numéro de l'adhérent</th></tr>";
    while ($row = $historique_result->fetch()) {
        echo "<tr><td>" . $row['date_deb'] . "</td><td>" . $row['date_fin'] . "</td><td>" . $row['id_adherent'] . "</td></tr>";
    }
    echo "</table>";  
    echo "<main>"; 
    echo " <button><a href='gestionLivres.php'>Retour</a></button>";
    echo "</main>";
} else {
    echo "<h2>Aucun emprunt pour ce livre.</h2>";
    echo "<main>"; 
    echo " <button><a href='gestionLivres.php'>Retour</a></button>";
    echo "</main>";
}
?>
    <footer>
        <p>&copy; 2024 La Booquinerie. Tous droits réservés.</p>
    </footer>
</body>
</html>



