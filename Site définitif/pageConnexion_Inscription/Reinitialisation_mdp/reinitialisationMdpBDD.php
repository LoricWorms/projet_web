<?php
session_start();

//Vérification du remplissage de formulaire

if (isset($_POST['mailReinitialisationMDP']) && !empty($_POST['mailReinitialisationMDP'])) {
    include '../../bddacces.php';

    $mailReinitialisation = $_POST['mailReinitialisationMDP'];

    $req = "SELECT * FROM adherent WHERE mail= :mailLu";
    $reponse = $connexion->prepare($req);

    $reponse->bindParam(':mailLu', $mailReinitialisation);

    $reponse->execute();

    $exist = $reponse->rowCount();
    $donneesUser = $reponse->fetch();

    if ($exist == 0) {
        $_SESSION['userNotExist'] = "Le mail rentré est invalide. Veuillez en rentrez un valide.";
        header("Location: pageReinitialisationMdp.php");
    } else {
        $id = $donneesUser['id'];
        $cleReinitialisation = rand(1000000, 9000000);
        $dateActuelle = strtotime('+1 hour');
        $dateMaxValide = date('Y-m-d H:i:s', $dateActuelle);

        $requeteReinitialisation = "INSERT INTO recuperation_mdp (cleRecup, heureDate_validiteLien, idUserAdherent) VALUES (:cleRecup, :heureDate, :idUser)";

        $req = $connexion->prepare($requeteReinitialisation);

        $req->bindParam(':cleRecup', $cleReinitialisation);
        $req->bindParam(':heureDate', $dateMaxValide);
        $req->bindParam(':idUser', $id);

        $ok = $req->execute();

        if($ok) {
            //on récupère l'id, la clé de réinitialisation, le mail et le prénom de l'utilisateur
            $_SESSION['cleReinitialisation'] = $cleReinitialisation;
            $_SESSION['idUser'] = $id;
            $_SESSION['mailReinitialisation'] = $mailReinitialisation;
            $_SESSION['prenom'] = $donneesUser['prenom'];
            header('Location: emailReinitialisation.php');
        } else {
            $_SESSION['PbReinitialisation'] = true;
            header('Location: pageReinitialisationMdp.php');
        }
    }
} else {
    header('Location: ../../index.php');
}
