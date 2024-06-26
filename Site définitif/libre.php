<?php
session_start();
include "bddacces.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>evenement</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/Bookinerie_logo-removebg-preview.png" />
	
</head>
<body>
    <header>
        
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="catalogue.php">Catalogue</a></li>
                <!-- <li><a href="#">Événements</a></li> -->
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
		
		<h1>Événements</h1>
		
    </header>
  
    <main style="margin-bottom: 3%;">
        <section class="event">
            <h2>Club de Lecture Mensuel</h2>
            <p>Date : 15 mars 2024</p>
            <p>Heure : 17h30 - 19h30</p>
            <p>Rejoignez-nous pour discuter du dernier livre sélectionné.</p>
            <a href="#">Détails</a>
        </section>

        <section class="event">
            <h2>Atelier pour Enfants</h2>
            <p>Date : 20 mars 2024</p>
            <p>Heure : 14h00 - 16h00</p>
            <p>Activités amusantes et éducatives pour les enfants de tous âges.</p>
            <a href="#">Détails</a>
        </section>
    </main>
   

	
	<footer>
        <p>&copy; 2024 La Bookinerie. Tous droits réservés.</p>
    </footer>
	
  </body>
</html>