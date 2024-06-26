<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier les livres</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="icon" href="../../images/Bookinerie_logo-removebg-preview.png" />
</head>
<body>
<?php
include '../../bddacces.php';

// Vérifier si la référence du livre est passée dans l'URL
if(isset($_GET['ref'])) {
    $ref = $_GET['ref'];

    // Requête pour obtenir les informations du livre
    $info_query = "SELECT * FROM livre INNER JOIN categorie ON id_cat = id WHERE ref = $ref"; 
    $info_result = $connexion->query($info_query);

    echo "<h2>Informations du livre</h2>";
    echo "<table>";
    echo "<tr><th>ref</th><th>ISBN</th><th>titre</th><th>auteur</th><th>langue</th><th>année</th><th>catégorie</th></tr>"; // Correction de la structure de la table
    while ($row = $info_result->fetch()) {
        echo "<tr><td>" . $row['ref'] . "</td><td>" . $row['iban'] . "</td><td>" . $row['titre'] . "</td><td>" . $row['auteur'] . "</td><td>" . $row['langue'] . "</td><td>" . $row['annee'] . "</td><td>" . $row['libelle'] . "</td></tr>";
    
    echo "</table>";  

    echo "<main>"; 
    echo "<h3>Modifier les informations du livre</h3>";
    echo "<form action='modifierLivres.php' method='post'>";
    echo "<input type='hidden' name='ref' value='$ref'>";
    echo "<label for='iban'>ISBN :</label>";
    echo "<input type='text' id='iban' name='iban' value='" . $row['iban'] . "'><br>";
    echo "<label for='titre'>Titre :</label>";
    echo "<input type='text' id='titre' name='titre' value='" . $row['titre'] . "'><br>";
    echo "<label for='auteur'>Auteur :</label>";
    echo "<input type='text' id='auteur' name='auteur' value='" . $row['auteur'] . "'><br>";
    echo "<label for='langue'>Langue :</label>";
    echo "<input type='text' id='langue' name='langue' value='" . $row['langue'] . "'><br>";
    echo "<label for='annee'>Année :</label>";
    echo "<input type='text' id='annee' name='annee' value='" . $row['annee'] . "'><br>";
    echo "<label for='id_cat'>Catégorie :</label>";
    //echo "<input type='text' id='id_cat' name='id_cat' value='" . $row['id_cat'] . "'><br>"; // Utiliser id_cat
    ?>
                <select id="cat" name="cat">
                
                <?php
            // Connexion à la base de données
            include '../../bddacces.php';
    
            // Récupérer les catégories depuis la base de données
            $categories_query = "SELECT id, libelle FROM categorie ORDER BY id";
            $categories_result = $connexion->query($categories_query);
    
            // Générer les options de sélection
            while ($row = $categories_result->fetch()) {
                echo "<option value=\"" . $row['id'] . "\">" . $row['libelle'] . "</option>";
            }
            ?>
            
            </select><br>
    <?php
    echo "<button align='center' class='button-ModifLivres' type='submit'>Modifier</button>";
    echo "</form>";
    echo "<button align='center' style='margin-top: 3%; width: 100%;'><a href='gestionLivres.php'>Retour</a></button>";
    echo "</main>";
    }
}

if(!empty($_POST['ref']) && !empty($_POST['iban']) && !empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['langue']) && !empty($_POST['annee']) && isset($_POST['cat'])) {
    // Récupérer les données du formulaire
    $ref = $_POST['ref'];
    $iban = $_POST['iban'];
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $langue = $_POST['langue'];
    $annee = $_POST['annee'];
    $cat = $_POST['cat'];

    // Requête pour mettre à jour les informations du livre
    $query = "UPDATE livre SET iban = '$iban', titre = '$titre', auteur = '$auteur', langue = '$langue', annee = '$annee', id_cat = '$cat' WHERE ref = '$ref'";
    if($connexion->query($query)) {
        echo "<h2>Les informations du livre ont été mises à jour avec succès.</h2>";
        echo "<main>"; 
        echo "<button><a href='gestionLivres.php'>Retour</a></button>";
        echo "</main>";
    } else {
        echo "Erreur lors de la mise à jour des informations du livre";
    }
}
?>

<footer>
    <p>&copy; 2024 La Bookinerie. Tous droits réservés.</p>
</footer>
</body>
</html>

