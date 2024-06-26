<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css"/>
    <link rel="icon" href="../../images/Bookinerie_logo-removebg-preview.png" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Connexion</title>
</head>

<body class="body-connexion">
    <header>
        <?php
                    //Pour les erreurs de connexion
                    if (isset($_SESSION['erreurConnexion'])) {
                        echo ("<h4 class='animation' id='erreurConnexionJs' style='color: #ff0000; --i:0; --j:21;'>".$_SESSION['erreurConnexion']."</h4>");
                        unset($_SESSION['erreurConnexion']);
                    }
                    
                    elseif (isset($_SESSION['erreurConnexionFausse'])) {
                        echo ("<h4 id='erreurConnexionFausseJs' class='animation' style='color: #ff0000; --i:0; --j:21;'>".$_SESSION['erreurConnexionFausse']."</h4>");
                        unset($_SESSION['erreurConnexionFausse']);
                    }
                    //Pour la confirmation que l'email est existant
                    elseif (isset($_SESSION['mailConfirmationEnvoye'])) {
                        echo "<h4 style='color: #33cc33;'>".$_SESSION['mailConfirmationEnvoye']."</h4>";
                        unset($_SESSION['mailConfirmationEnvoye']);
                    }
                    elseif (isset($_SESSION['mailNonConfirme'])) {
                        echo "<h4 style='color: #ff0000;'>".$_SESSION['mailNonConfirme']."</h4>";
                        unset($_SESSION['mailNonConfirme']);
                    }
                    elseif (isset($_SESSION['mailDejaConfirme'])) {
                        echo "<h4 style='color: #33cc33;'>".$_SESSION['mailDejaConfirme']."</h4>";
                        unset($_SESSION['mailConfirmationEnvoye']);
                    }
                    elseif (isset($_SESSION['statutAJour'])) {
                        echo "<h4 style='color: #33cc33;'>".$_SESSION['statutAJour']."</h4>";
                        unset($_SESSION['statutAJour']);
                    }
                    //Pour la réinitialisation du mot de passe
                    elseif (isset($_SESSION['mailReinitialisationEnvoye'])) {
                        echo "<h4 style='color: #33cc33;'>".$_SESSION['mailReinitialisationEnvoye']."</h4>";
                        unset($_SESSION['mailReinitialisationEnvoye']);
                    }
                    elseif (isset($_SESSION['MdpChangez'])) {
                        echo "<h4 style='color: #33cc33;'>".$_SESSION['MdpChangez']."</h4>";
                        unset($_SESSION['MdpChangez']);
                    }
                    elseif (isset($_SESSION['MdpNoChanged'])) {
                        echo "<h4 style='color: #ff0000;'>".$_SESSION['MdpNoChanged']."</h4>";
                        unset($_SESSION['MdpNoChanged']);
                    }
                    elseif (isset($_SESSION['erreurIncription'])) {
                        echo "<h4 style='color: #ff0000;'>".$_SESSION['erreurIncription']."</h4>";
                        unset($_SESSION['erreurIncription']);
                    }
        ?>
    </header>
    <div class="wrapper">
        <span class="bg-animate"></span>
        <span class="bg-animate2"></span>
        <!--Pour la connexion-->
        <div class="form-box login">
            <a href="index.php" class="animation" style="--i:0; --j:21;">◀️ Retour</a>
            <h2 class="animation" style="--i:0; --j:21;">Connexion</h2>
            <form action="verifConnexion.php" method="POST">
                <div class="input-box animation" style="--i:1; --j:22;">
                    <input type="email" id="emailConnexion" inputmode="email" name="mailConnexion" required />
                    <label class="label-email">Email</label>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box animation" style="--i:2; --j:23;">
                    <input type="password" id="mdpConnexion" name="mdpConnexion" required />
                    <label class="label-mdp">Mot de passe</label>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" class="btn animation" style="--i:3; --j:24">Se connecter</button>
                <div class="logreg-link animation" style="--i:4; --j:25;">
                    <p>Pas de compte ? <a href="#" class="register-link">Créer un compte</a></p><br>
                    <p>Mot de passe oublié ?<br><a href="../Reinitialisation_mdp/pageReinitialisationMdp.php" class="register-link">Réinitialiser le mot de passe</a></p>
                </div>
            </form>
        </div>
        <div class="info-text login">
            <h2 class="animation" style="--i:0; --j:20;">Welcome back!</h2>
            <p class="animation" style="--i:1; --j:21;">
                Connectez vous pour empruntez des milliers de livres
                de la bibliothèque.
            </p>
        </div>
        <!--Pour l'inscription-->
        <header>
        <?php
            if (isset($_SESSION['champManquant'])) {
                echo ("<h4 class='animation' style='color: #ff0000; --i:0; --j:21;'>".$_SESSION['champManquant']."</h4>");
                unset($_SESSION['champManquant']);
            }
        ?>
        </header>
        <div class="form-box register">
            <h2 class="animation" style="--i:17;">Inscrivez-vous</h2>
            <form action="../Inscription/inscriptionEnregistrement.php" method="POST">
                <div class="input-box animation" style="--i:18; --j:0;">
                    <input type="text" name="nomInscription" required />
                    <label>Nom</label>
                    <i class='bx bxs-id-card'></i>

                </div>
                <div class="input-box animation" style="--i:19; --j:1;">
                    <input type="text" name="prenomInscription" required />
                    <label>Prénom</label>
                    <i class='bx bx-user'></i>
                </div>
                <div class="input-box animation" style="--i:20; --j:2;">
                    <input type="email" inputmode="email" name="emailInscription" required />
                    <label>Email</label>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box animation" style="--i:21; --j:3;">
                    <input type="password" name="mdpInscription" required />
                    <label>Mot de passe</label>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" class="btn animation" style="--i:22; --j:4;">S'inscrire</button>
                <div class="logreg-link animation" style="--i:23; --j:5;">
                    <p>Déjà un compte ? <a href="#" class="login-link">Se connecter</a></p>
                </div>
            </form>
        </div>
        
        <div class="info-text register">
            <h2 class="animation" style="--i:17; --j:0;">Inscrivez vous !</h2>
            <p class="animation" style="--i:18; --j:1;">
                Créez vous un compte pour accéder à des milliers
                de livres de la bibliothèque, et tout
                ça gratuitement.
            </p>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Bibliothèque Associative. Tous droits réservés.</p>
    </footer>
    <script src="../../javascript/script.js">
    </script>
</body>
</html>