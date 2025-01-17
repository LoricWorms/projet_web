<?php
session_start();
$mailDestination = $_SESSION['emailInscription'] ?? '';

$destinataire = $mailDestination;
$sujet = "Confirmation de mail";
$message = "<!DOCTYPE html>
<html>
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@0,400..900;1,400..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap');

        /* Style pour le bouton */
        .button {
            background: linear-gradient(55deg, #0033cc, #cc00ff, #cc00ff);
            outline: none;
            border: none;
            border-radius: 60px;
            padding: 20px 40px 20px 40px;
            width: 100px; /* Largeur ajustée */
            height: 100px; /* Hauteur ajustée */
            color: white;
            font-family: Fjalla One, sans-serif;
            font-size: large;
            margin-right: 10px;
            cursor: pointer; /* Curseur */
            text-decoration: none;
        }
        .corps-mail{
            background: linear-gradient(55deg, #0066ff, #ff3333);
        }
    </style>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body style='margin: 0; padding: 0;'>
    <table width='100%' height='100%' cellpadding='0' cellspacing='0' border='0' bgcolor='#f4f4f4'>
        <tr>
            <td align='center' valign='middle'>
                <table class='corps-mail' width='600' cellpadding='0' cellspacing='0' border='0' bgcolor='#ffffff' style='border-radius: 10px;'>
                    <tr>
                        <td align='center' style='padding: 20px;'>
                            <img src='https://static.wixstatic.com/media/00cf09_bda8041262774b7898f4e56f0ab654ba~mv2.png/v1/crop/x_0,y_110,w_6912,h_3235/fill/w_940,h_440,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/Bookinerie_banniere.png' width='400' height='auto' style='margin-bottom: 10px; margin-top: 20px;'>
                            <h1 style='font-family: Great Vibes, cursive; font-size: 30px; margin: 0; color: white;'>Bienvenue dans la bibliothèque Bookinerie!</h1>
                        </td>
                    </tr>
                    <tr>
                        <td align='center' style='padding: 20px; font-family: Alegreya, serif;'>
                            <h3 style='margin: 0; color: white;'>Vous vous êtes bien inscrit dans la bibliothèque Bookinerie, et nous vous en remercions ! 👻 </h3>
                            <p style='margin: 20px 0; font-size: 16px; color: white;'>
                                Bookinerie est une bibliothèque associative fondée par Titouan Tribaleau, Loric Worms, Damien Talpot et Tom Labruyère. Leur vision était de créer un espace où les lecteurs pouvaient partager leur passion pour la littérature tout en favorisant l'accès à la lecture pour tous. Grâce à leur dévouement et à leur engagement, la Bookinerie est devenue un lieu vibrant où les histoires se rencontrent et où la communauté trouve inspiration et enrichissement.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td align='center' style='padding: 20px; font-family: Alegreya, serif; font-size: 30px; margin: 0;'>
                            <h3 style='margin: 0; color: white;'>⬇️ Vérifie ton mail ici ⬇️</h3>
                        </td>
                    </tr>
                    <tr>
                        <td align='center' style='padding: 50px;'>
                            <a href='http://localhost/projet_site_internet/pageConnexion_Inscription/Inscription/verifInscriptionMail.php?id=".$_SESSION['id']."&cle=".$_SESSION['cle']."' class='button' style='color: white;'>Vérifie ton mail</a>
                            <p style='color: red; font-size: 30px;'>🔴‼️ ATTENTION ‼️🔴</p>
                            <p style='color: red; font-size: 20px;'>LE LIEN NE SERA VALIDE QU'AUJOURD'HUI, VOUS NE POURREZ PLUS LE VALIDER LE LENDEMAIN</p>
                        </td>
                    </tr>
                    <tr>
                        <td align='center' style='padding: 20px;'>
                            <a href='http://localhost/projet_site_internet/libre.php'>
                                <img src='https://static.wixstatic.com/media/00cf09_0e9c32922ca942d4bb4859a9495028b4~mv2.png/v1/fill/w_1685,h_690,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/00cf09_0e9c32922ca942d4bb4859a9495028b4~mv2.png' width='400' height='auto' style='margin-bottom: 10px; margin-top: 20px;'>
                            </a>
                            <h2 style='font-family: Great Vibes, cursive; font-size: 30px; margin: 0; color: white;'>
                                <p>⬇️ Retrouver toutes nos actualités ⬇️</p><br>
                                <a href='http://localhost/projet_site_internet/libre.php' class='button' style='color: white;'>Actualités</a>
                            </h2><br>
                        </td>
                    </tr>
                    <tr>
                        <td align='center' style='padding: 20px;'>
                            <h2 style='font-family: Great Vibes, cursive; font-size: 30px; margin: 0; color: white;'>
                                <p>👻 Retrouvez nous sur tous nos réseaux 👻</p>
                            </h2>
                            <div style='display: flex; flex-direction: row; justify-content: center; align-items: center; flex-wrap: wrap; align-content: center;'>
                                <a href='https://www.instagram.com/bibliotheque_bookinerie?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==' style='margin-right: 10%;'>
                                    <img src='https://static.wixstatic.com/media/00cf09_ef3dd162706f4d90976757562258fa81~mv2.png/v1/fill/w_94,h_94,al_c,lg_1,q_85,enc_auto/instagram-logo-60.png' width='30' height='auto' style='margin-top: 20px; margin-right: 30%;'>
                                </a>
                                <a href='#' style='margin-right: 10%;'>
                                    <img src='https://cdn-icons-png.flaticon.com/512/733/733603.png' width='30' height='auto' style='margin-top: 20px; margin-right: 30%;'>
                                </a>
                                <a href='mailto:bibliothequeprojet776@gmail.com'>
                                    <img src='https://cdn-icons-png.flaticon.com/512/8504/8504650.png' width='30' height='auto' style='margin-top: 20px; margin-right: 30%;'>
                                </a>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>";
$headers = "From: <no.reply.bookinerie@gmail.com>\n";
$headers .= "Content-Type:text/html; charset=\"iso-8859-1\"";

if(mail($destinataire, $sujet, $message, $headers)) {
    $_SESSION['mailConfirmationEnvoye'] = "Un mail de confirmation a bien été envoyé dans votre boîte mail.";
    header('Location: ../Connexion/connexion.php');
} else {
    echo "Le mail de confirmation n'a pu être envoyé.";
}