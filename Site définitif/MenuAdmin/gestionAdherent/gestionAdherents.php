<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Adhérents</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="icon" href="../../images/Bookinerie_logo-removebg-preview.png" />
</head>
<body class="fondEcranAdmin">
    <h2>Gestion des Adhérents</h2>
    
    <main>
    <form class="formAjouterAdherent" action="ajouterAdherent.php" method="POST">
        <h3>Ajouter un Adhérent</h3>
        <!-- <label for="nom">Nom :</label> -->
        <input type="text" id="nom" name="nom" placeholder="Nom" required><br>
        <!-- <label for="prenom">Prénom :</label> -->
        <input type="text" id="prenom" name="prenom" placeholder="Prénom" required><br>
        <!-- <label for="mdp">Mot de passe :</label> -->
        <input type="email" id="email" name="email" placeholder="Mail" required><br>
        <input type="text" id="mdp" name="mdp" placeholder="Mot de passe" required><br>
        <input type="submit" value="Ajouter">
    </form>
         
    </main>

    <header>
    <?php
        if(isset($_SESSION['deleteSuccess'])) {
            echo "<h4 style='color: #33cc33;'>".$_SESSION['deleteSuccess']."</h4>";
            unset($_SESSION['deleteSuccess']);
        }
        elseif (isset($_SESSION['deleteError'])) {
            echo "<h4 style='color: #ff0000;'>".$_SESSION['deleteError']."</h4>";
            unset($_SESSION['deleteError']);
        }
        ?>
    </header>

    <section id="book-list">
        <?php
        include '../../bddacces.php';

        // Récupérer les adhérents de la base de données
        $adherent_query = "SELECT * FROM adherent";
        $adherent_result = $connexion->query($adherent_query);

        // Afficher les adhérents
        while ($row = $adherent_result->fetch()) {
            echo "<div class=\"adherent\">";
            echo "<li>Nom: " . $row['nom'] . "</li>";
            echo "<li>Prénom: " . $row['prenom'] . "</li>";
            echo "<li>Mail: ".$row['mail']."</li>";
            echo "<li class='modif'><a href=\"modifierAdherent.php?id=" . $row['id'] . "\">Modifier</a></li>";
            echo "<li class='modif'><a href=\"supprimerAdherent.php?id=" . $row['id'] . "\">Supprimer</a></li>";
            echo "</div>";
        }

        // $connexion->close();
        ?>
    </section>
    
    <a class="buttonRetour" href="../gestionAdmin.php">Retour</a>

    <footer>
        <p>&copy; 2024 La Bookinerie. Tous droits réservés.</p>
    </footer>
</body>
</html>