<?php
session_start();
include "bddacces.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/Bookinerie_logo-removebg-preview.png" />
</head>
<body>
    <header>
        
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <!-- <li><a href="#">Catalogue</a></li> -->
                <li><a href="libre.php">Événements</a></li>
                <li><a href="galerie.php">À propos</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php
                if(isset($_SESSION['idUser'])) {
                    $idUser = $_SESSION['idUser'];
                    $requete = "SELECT nom, prenom FROM adherent WHERE id = ".$idUser;
                    $reponse = $connexion->query($requete);
                    $connect = $reponse->fetch();
                    if(isset($_SESSION['admin'])) {
                        ?>
                        <li><a href="MenuAdmin/gestionAdmin.php">Menu Admin</a></li>
                        <?php
                        echo "<li><a href='#'>".$connect['nom'].$connect['prenom']."</a></li>";
                    } else {
                        echo "<li><a href='#'>".$connect['nom']."_".$connect['prenom']."</a></li>";
                        echo "<li><a href='pageConnexion_Inscription/Deconnexion/logout.php'>Se déconnecter</a></li>";
                    }

                } else {
                    ?>
                    <button><a href="pageConnexion_Inscription/Connexion/connexion.php">Se connecter</a></button> 
                    <?php
                }
                ?>
            </ul>
        </nav>
		
		<h1>Catalogue</h1>
		
    </header>

<main style='width:100%;'>
        <form style="position: relative; display: flex; flex-direction: row; justify-content: center;" id="category-form" action="catalogue.php" method="post">
            <label style="margin-top: 1%; margin-right: 2%;" for="category">Sélectionner une catégorie :</label>
            <select style="margin-right: 2%;" id="category" name="category">
    <?php

    // Récupérer les catégories depuis la base de données
    $categories_query = "SELECT id, libelle FROM categorie ORDER BY libelle";
    $categories_result = $connexion->query($categories_query);

    // Générer les options de sélection
    while ($row = $categories_result->fetch()) {
        echo "<option value=\"" . $row['id'] . "\">" . $row['libelle'] . "</option>";
    }
    ?>
            </select>
              
            <button type="submit">Afficher les livres</button>
            
        </form>

        <section style="margin-bottom: 3%;" id="book-list">
        
    <?php
    // Vérifier si la catégorie a été sélectionnée
    if (isset($_POST['category'])) {
    $category_id = $_POST['category'];

    // Récupérer le libellé de la catégorie
    $category_query = "SELECT libelle FROM categorie WHERE id = $category_id";
    $category_result = $connexion->query($category_query);
    $donnees = $category_result->fetch();
    $category_name = $donnees['libelle'];

    // Récupérer les livres de la catégorie sélectionnée
    $books_query = "SELECT * FROM livre WHERE id_cat = $category_id ORDER BY titre";
    $books_result = $connexion->query($books_query);

    // Afficher les livres
    echo "<h2>Livres de la catégorie \"$category_name\"</h2>";
    while ($row = $books_result->fetch()) {
        echo "<div class=\"livre\">";
        echo "<li><img src='" . $row['lien_image'] . "'</li>";
        echo "<li>Titre: " . $row['titre'] . "</li>";
        echo "<li>Auteur: " . $row['auteur'] . "</li>";
        echo "<li>Langue : " . $row['langue'] . "</li>";
        echo "<li>année : " . $row['annee'] . "</li>";
        echo "</div>";

        }
    }
?>
            
        </section>
    </main>

    <footer>
        <p>&copy; 2024 La Bookinerie. Tous droits réservés.</p>
    </footer>

</body>
</html>
