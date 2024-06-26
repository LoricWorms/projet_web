<?php
session_start();
include "bddacces.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nous Contacter</title>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYdrtEL6KwioapYVht19RlCuaDcoV2o0w&callback=console.debug&libraries=maps,marker&v=beta"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/Bookinerie_logo-removebg-preview.png" />
	
</head>
<body>
    <header>
        
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="catalogue.php">Catalogue</a></li>
                <li><a href="libre.php">Événements</a></li>
                <li><a href="galerie.php">À propos</a></li>
                <!-- <li><a href="#">Contact</a></li> -->
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
		
		<h1>Nous contactez</h1>
		
    </header>
  
    <div class="main-container">
	
      <div class="map-container">
        <gmp-map center="47.2140007019043,-1.5537821054458618" zoom="14" map-id="DEMO_MAP_ID">
          <gmp-advanced-marker position="47.2140007019043,-1.5537821054458618" title="My location"></gmp-advanced-marker>
        </gmp-map>
      </div>

      <div class="coordinates-container">
        
          <h2>Coordonnées</h2>
          <p>Adresse : 1 Rue Léon Maître, 44000 Nantes</p>
          <p>Téléphone : +33 1 23 45 67 89</p>
          <a href="mailto:bibliothequeprojet776@gmail.com">Email : bookinerie@Association.fr</p>
     
      </div>
    
	</div>
	
	<footer>
        <p>&copy; 2024 La Bookinerie. Tous droits réservés.</p>
    </footer>
	
  </body>
</html>