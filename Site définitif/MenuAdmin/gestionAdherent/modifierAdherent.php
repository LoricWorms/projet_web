<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier les Adhérents</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="icon" href="../../images/Bookinerie_logo-removebg-preview.png" />
</head>
<body>
<?php
include '../../bddacces.php';

// Vérifier si la référence du livre est passée dans l'URL
if(!empty($_GET['id'])) {
    
    $_SESSION['id'] = $_GET['id'];

    // Requête pour obtenir les informations de l'adhérent
    $info_query = "SELECT * FROM adherent WHERE id = ".$_SESSION['id']; 
    $info_result = $connexion->query($info_query);

    echo "<h2>Informations de l'adhérent</h2>";
    echo "<main>"; 
    echo "<table>";
    echo "<tr><th class='tableau-adherent'>ID</th><th class='tableau-adherent'>Nom</th><th class='tableau-adherent'>Prénom</th><th class='tableau-adherent'>Mot de passe</th><th class='tableau-adherent'>Mail</th><th class='tableau-adherent'>Date d'inscription</th></tr>";

    ?>
    <header>
        <?php
            if (isset($_SESSION['champsManquant'])) {
                echo ("<h4 style='color: #ff0000;'>".$_SESSION['champsManquant']."</h4>");
                unset($_SESSION['champsManquant']);
            }
            elseif (isset($_SESSION['errorModif'])) {
                echo ("<h4 style='color: #ff0000;'>".$_SESSION['errorModif']."</h4>");
                unset($_SESSION['errorModif']);
            }
        ?>
    </header>
    <?php
    while ($row = $info_result->fetch()) {
        echo "<tr>";
        echo "<td class='tableau-adherent'>" . $row['id'] . "</td>";
        echo "<td class='tableau-adherent'>" . $row['nom'] . "</td>";
        echo "<td class='tableau-adherent'>" . $row['prenom'] . "</td>";
        echo "<td class='tableau-adherent'>" . $row['mot_de_passe'] . "</td>";
        echo "<td class='tableau-adherent'>" . $row['mail'] . "</td>";
        echo "<td class='tableau-adherent'>" . $row['date_inscription'] . "</td>";
        echo "</tr>";
    
    echo "</table>";  
?>
    <div class="modifInfosAdherent">
<?php
    echo "<h3>Modifier les informations de l'adhérent</h3>";
    echo "<form class='formModifAdherent' action='adherentTotalModifier.php' method='post'>";
    echo "<label for='nom'>Nom : </label>";
    echo "<input type='text' id='nom' name='nom' value='" . $row['nom'] . "'><br>";
    echo "<label for='prenom'>Prénom : </label>";
    echo "<input type='text' id='prenom' name='prenom' value='" . $row['prenom'] . "'><br>";
    echo "<label for='mdp'>Mot de passe : </label>";
    echo "<input type='text' id='mdp' name='mdp' value='" . $row['mot_de_passe'] . "'><br>";
    echo "<label for='mail'>Mail : </label>";
    echo "<input type='text' id='mail' name='mail' value='" . $row['mail'] . "'><br>";
    ?>
        <span class="button-modifAdherent">
    <?php
        echo "<button type='submit'>Modifier</button>";
        echo "</form>";
        echo "<button><a href='gestionAdherents.php'>Retour</a></button>";
    ?>
        </span>
    </div>
    <?php
    echo "</main>";
    }
} else {
    header('Location: gestionAdherent.php');
}

// if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mdp']) && isset($_POST['mail'])) {
//     if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mdp']) && !empty($_POST['mail'])) {
//             // Récupérer les données du formulaire
//             $nom = $_POST['nom'];
//             $prenom = $_POST['prenom'];
//             $mdp = $_POST['mdp'];
//             $mdpHash = md5($mdp);
//             $mail = $_POST['mail'];

//             // Requête pour mettre à jour les informations de l'adhérent
//             $query = "UPDATE adherent SET nom = '$nom', prenom = '$prenom', mot_de_passe = '$mdpHash', mail = '$mail' WHERE id = '$id'";
//             if($connexion->query($query)) {
//                 echo "<h2>Les informations de l'adhérent ont été mises à jour avec succès.</h2>";
//                 echo "<main>"; 
//                 echo "<button><a href='gestionAdherents.php'>Retour</a></button>";
//                 echo "</main>";
//             } else {
//                 echo "Erreur lors de la mise à jour des informations de l'adhérent";
//             }
//     } else {
//         $_SESSION['champsManquant'] = "Veuillez remplir tous les champs.";
//         header('Location: modifierAdherent.php?id='.$_SESSION['id']);
//     }
// }

// $connexion->close();
?>

<footer>
    <p>&copy; 2024 La Bookinerie. Tous droits réservés.</p>
</footer>
</body>
</html>
