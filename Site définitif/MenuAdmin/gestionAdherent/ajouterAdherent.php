<!-- <head>
    <link rel="icon" href="images/Bookinerie_logo-removebg-preview.png" />
    <link rel="stylesheet" href="../../style.css">
</head> -->
<?php
session_start();
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../../bddacces.php';
    
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['email'];
    $mdp = $_POST['mdp'];
    $mdpHash = md5($mdp);
    $dateInscription = date("Y-m-d");
    $mailConfirme = 1;
    
    // Requête pour ajouter le livre dans la base de données
    $query = "INSERT INTO adherent (nom, prenom, mot_de_passe, mail, date_inscription, mailConfirme) VALUES ('$nom', '$prenom', '$mdpHash', '$mail', '$dateInscription', '$mailConfirme')";
    $ok = $connexion->query($query);

    if ($ok) {
        echo "<h2>Adérent ajouté avec succès.</h2>";
        echo "<main>"; 
        echo "<button><a href='gestionAdherents.php'>Retour</a></button>";
        echo "</main>";
    } else {
        echo "Erreur lors de l'ajout de l'adhérent";
    }
    
    $connexion=null;
} else {
    header("Location: ../gestionAdherents.php");
    exit();
}