<?php
session_start();
include "bddacces.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A propos</title>
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
                <!-- <li><a href="#">À propos</a></li> -->
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
        <h1>À propos</h1>
    </header>

    <div class="main-container">
    <div class="image-container">
        <img src="images/cover_page.png">
        <img src="images/reglement.jpg">
	
    </div>
        <div class="info-container">
          
                <h2>Horaires d'ouverture</h2>
                
                <br>
				
                <p>Mardi : 14h00 - 17h00</p>
                <p>Mercredi : 10h00 - 12h00 puis 14h00 - 17h00</p>
                <p>vendredi : 14h00 - 18h00</p>
                <p>Samedi : 10h00 - 12h30 puis 14h00 - 17h00</p>
                
                <br>
                <br>

                <h2>Dernières actualités</h2>
                
                <br>
				
                <h3>Ouverture d'une Nouvelle Section Jeunesse</h3>
				
                <p>Nous sommes ravis d'annoncer l'ouverture d'une toute nouvelle section dédiée aux enfants et aux jeunes lecteurs.</p>
                <p>Date : 5 mars 2024</p>
                
                <br>
				
		<h3>Recherche de bénévoles</h3>
				
		<p>Nous sommes à la recherche de bénévoles pour tenir l'accueil de la bibliothèque.</p>
		<p>Horaire :  1 demi journée par semaine </p><br>
        <p>Vous pouvez envoyer vos demandes <a style="color: red;" href="mailto:bibliothequeprojet776@gmail.com">ici</a> ou au mail : bookinerie@Association.fr</p><br>
		<p>Pour plus de renseignements, veuillez vous présenter à l'accueil.</p>
 
    </div>
	</div>
	

    <footer>
        <p>&copy; 2024 La Bookinerie. Tous droits réservés.</p>
    </footer>
</body>

</html>