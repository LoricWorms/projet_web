<?php

session_start();

include "../../bddacces.php";

if(isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['cleReinitialisation']) && !empty($_GET['cleReinitialisation'])) {
    $getid = $_GET['id'];
    $getCleRei = $_GET['cleReinitialisation'];

    $requeteRecuperationMDP = "SELECT * FROM recuperation_mdp WHERE idUserAdherent = :id AND cleRecup = :cle";

    $recupRecuperationMDP = $connexion->prepare($requeteRecuperationMDP);

    $recupRecuperationMDP->bindParam(':id', $getid);
    $recupRecuperationMDP->bindParam(':cle', $getCleRei);

    $recupRecuperationMDP->execute();

    $rowCountRecuperationMDP = $recupRecuperationMDP->rowCount();
    $donneesRecuperationMDP = $recupRecuperationMDP->fetch();

    $verifDateLien = $donneesRecuperationMDP['heureDate_validiteLien'];
    $dateDuJour = date('Y-m-d H:i:s');

    if($rowCountRecuperationMDP > 0 && $verifDateLien > $dateDuJour) {
        if($donneesRecuperationMDP['lienUtilise'] != 1) {
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

            <header>
                <?php
                    if(isset($_SESSION['mdpNoCorrespond'])) {
                        echo "<h4 style='color: #ff0000;'>".$_SESSION['mdpNoCorrespond']."</h4>";
                    }
                ?>
            </header>

            <body class="body-connexion">
                <div class="reinitialisation">
                    <div class="form-box-reinitialisation reinitialisation">
                        <h2>
                            Réinitialisation du mot de passe
                        </h2>
                        <form class="ReinitialisationMDPform" action="MdpAJour.php" method="POST">
                                <div class="input-reinitialisation">
                                    <input type="password" id="mdpConnexion" name="NouveauMotDePasse" required />
                                    <label class="">Nouveau mot de passe</label>
                                    <i class='bx bxs-lock-alt'></i>
                                </div>
                                <div class="input-reinitialisation">
                                    <input type="password" id="mdpConnexion" name="NouveauMotDePasseConfirmer" required />
                                    <label class="">Confirmer le nouveau mot de passe</label>
                                    <i class='bx bxs-lock-alt'></i>
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
            <?php
        } else {
            echo "Le lien a déjà utilisé, vous ne pouvez pas le réutiliser.";
            echo "<a href='../../index.php'>Retour</a>";
        }
    } else {
        echo "Utilisateur inexistant ou lien invalide";
        echo "<p style='color: red; font-size: 30px;'>Veuillez contacter le support avec dans l'objet votre nom et prénom et comme code d'erreur : ERROR:R31MDP</p>";
        echo "<a href='mailto:bibliothequeprojet776@gmail.com'>Contacter le support</a>";
    }
} else {
    header('Location: ../../index.php');
}