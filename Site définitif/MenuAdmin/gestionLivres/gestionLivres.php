<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Livres</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="icon" href="../../images/Bookinerie_logo-removebg-preview.png" />
</head>
<body>
    <h2>Gestion des Livres</h2>
    <main>
    <?php
    if(isset($_SESSION['livreChampVide'])) {
        echo "<h4 style='color: #ff0000;' align='center'>".$_SESSION['livreChampVide']."</h4>";
        unset($_SESSION['livreChampVide']);
    }
    elseif(isset($_SESSION['livreDeleteSuccess'])) {
        echo "<h4 style='color: #33cc33;' align='center'>".$_SESSION['livreDeleteSuccess']."</h4>";
        unset($_SESSION['livreDeleteSuccess']);
    }
    elseif(isset($_SESSION['livreDeleteError'])) {
        echo "<h4 style='color: #ff0000;' align='center'>".$_SESSION['livreDeleteError']."</h4>";
        unset($_SESSION['livreDeleteError']);
    }
    ?>
        
        <form action="ajouterLivre.php" method="post">
            <h3 align="center">Ajouter un livre</h3>
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" required><br>
            <label for="auteur">Auteur :</label>
            <input type="text" id="auteur" name="auteur" required><br>
            <label for="langue">Langue :</label>
            <input type="text" id="langue" name="langue" required><br>
            <label for="annee">Année :</label>
            <input type="number" id="annee" name="annee" required><br>
            <label for="cat">Catégorie :</label>
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
            <input type="submit" value="Ajouter">
        </form>
         
    </main>

    <section id="book-list">
        <?php

        // Récupérer les livres de la base de données
        $books_query = "SELECT lien_image, ref, titre, auteur FROM livre ORDER BY titre";
        $books_result = $connexion->query($books_query);

        // Afficher les livres
        while ($row = $books_result->fetch()) {
            echo "<div class=\"livre\">";
            echo "<li><img src='" . $row['lien_image'] . "'</li>";
            echo "<li>Titre: " . $row['titre'] . "</li>";
            echo "<li>Auteur: " . $row['auteur'] . "</li>";
            echo "<li><a href=\"historique_emprunt.php?ref=" . $row['ref'] . "\">Historique</a></li>";
            echo "<li><a href=\"modifierLivres.php?ref=" . $row['ref'] . "\">Modifier</a></li>";
            echo "<li><a href=\"supprimerLivre.php?ref=" . $row['ref'] . "\">Supprimer</a></li>";
            echo "</div>";
        }
        ?>
    </section>

    <a class="buttonRetour  " href="../gestionAdmin.php">Retour</a>
    
    <footer>
        <p>&copy; 2024 La Bookinerie. Tous droits réservés.</p>
    </footer>
</body>
</html>



