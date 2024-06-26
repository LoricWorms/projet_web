<?php
session_start();
include "bddacces.php"
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/Bookinerie_logo-removebg-preview.png" />
    <title>La Bookinerie</title>
</head>
<body>
    <header class="tetePage">
        
        <nav class="barreNav">
            <ul>
                <!-- <li><a class="naviguationButton" href="#">Accueil</a></li> -->
                <li><a class="naviguationButton" href="catalogue.php">Catalogue</a></li>
                <li><a class="naviguationButton" href="libre.php">Événements</a></li>
                <li><a class="naviguationButton" href="galerie.php">À propos</a></li>
                <li><a class="naviguationButton" href="contact.php">Contact</a></li>
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
		
		<h1>La Bookinerie</h1>
		
    </header>
	
	<div class="main-container">
	    <aside>
            <div id="weather-widget">
                <iframe id="widget_autocomplete_preview"  width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/441090##49271F"> </iframe>
            </div>
		</aside>

    <main>
    <section class="hero-section">
        <h2>Bienvenue à la La Booquinerie</h2>
        <p>Découvrez notre vaste collection de livres et participez à nos événements culturels.</p>
        <button><a href="#">Explorer</a></button>
    </section>

    <!-- <section class="featured-books">
        <h2>Livres en Vedette</h2>
  
    </section> -->
	</main>
	</div>

    <footer>
        <p>&copy; 2024 La Bookinerie. Tous droits réservés.</p>
    </footer>
</body>
</html>

