<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css"/>
    <link rel="icon" href="images/Bookinerie_logo-removebg-preview.png" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Réinitialiser le mot de passe</title>
</head>

<body class="body-connexion">
    <header>
        <?php
            if(isset($_SESSION['userNotExist'])) {
                echo "<h4 style='color: #ff0000;'>".$_SESSION['userNotExist']."</h4>";
                unset($_SESSION['userNotExist']);
            }
            elseif(isset($_SESSION['PbReinitialisation'])) {
                echo "<h4 style='color: #ff0000;'>Il y a eu un problème au niveau de la réinitialisation du mot de passe<br>Veuillez contacter le support à l'adresse : bibliothequeprojet776@gmail.com <br> avec comme objet : ERROR:B0101ACC3Sx</h4>";
                unset($_SESSION['PbReinitialisation']);
            }
        ?>
    </header>
    <div class="reinitialisation">
        <div class="form-box-reinitialisation reinitialisation">
            <h2>
                Réinitialisation du mot de passe
            </h2>
            <form class="ReinitialisationMDPform" action="reinitialisationMdpBDD.php" method="POST">
                    <div class="input-reinitialisation">
                        <input type="email" id="emailConnexion" inputmode="email" name="mailReinitialisationMDP" required />
                        <label class="">Email</label>
                        <i class='bx bxs-envelope'></i>
                    </div>
                    <button type="submit" class="btn animation reinitialisation">Envoyer</button>
            </form>
        </div>
    </div>
    <footer>    
        <p>&copy; 2024 Bibliothèque Associative. Tous droits réservés.</p>
    </footer>
</body>
</html>