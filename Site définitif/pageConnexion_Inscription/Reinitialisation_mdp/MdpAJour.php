<?php
session_start();

include "../../bddacces.php";

if(isset($_POST['NouveauMotDePasse']) && isset($_POST['NouveauMotDePasseConfirmer']) && !empty($_POST['NouveauMotDePasse']) && !empty($_POST['NouveauMotDePasseConfirmer'])) {
    if($_POST['NouveauMotDePasse'] == $_POST['NouveauMotDePasseConfirmer']) {
        $requeteRecupMdp = "UPDATE recuperation_mdp SET lienUtilise = :fait WHERE idUserAdherent = :id";
        $reponseRecupMdp = $connexion->prepare($requeteRecupMdp);
        $id = $_SESSION['idUser'];

        $reponseRecupMdp->bindValue(':fait', 1);
        $reponseRecupMdp->bindValue(':id', $id);

        $okRecupMdp = $reponseRecupMdp->execute();

        if($okRecupMdp) {
            $nouveauMotDePasse = $_POST['NouveauMotDePasseConfirmer'];
            $nouveauMotDePasseHash = md5($nouveauMotDePasse);

            $requeteNouveauMotDePasse = "UPDATE adherent SET mot_de_passe = :mdp WHERE id = :id";

            $reponseNouveauMotDePasse = $connexion->prepare($requeteNouveauMotDePasse);

            $reponseNouveauMotDePasse->bindParam(':mdp', $nouveauMotDePasseHash);
            $reponseNouveauMotDePasse->bindValue(':id', $id);

            $ok = $reponseNouveauMotDePasse->execute();

            if($ok) {
                session_destroy();
                session_start();
                $_SESSION['MdpChangez'] = "Votre mot de passe a été changé avec succès.";
                header('Location: ../Connexion/connexion.php');
            } else {
                session_destroy();
                session_start();
                $_SESSION['MdpNoChanged'] = "Le mot de passe n'a pu être changé, veuillez recommencer une procédure d'envoi.";
                header('Location: ../Connexion/connexion.php');
            }
        } else {
            echo "Erreur au niveau de la base de données";
            echo "<p style='color: red; font-size: 30px;'>Veuillez contacter le support avec dans l'objet votre nom et prénom et comme code d'erreur : ERROR:B4S3DON</p>";
            echo "<a href='mailto:bibliothequeprojet776@gmail.com'>Contacter le support</a>";
        }


    } else {
        $_SESSION['mdpNoCorrespond'] = "Les mots de passe ne correspondent pas, veuillez les faire correspondre.";
        header('Location: ReinitialiserMDP.php?id='.$_SESSION['idUser'].'&cleReinitialisation='.$_SESSION['cleReinitialisation']);
    }
} else {
    header('Location: ../../index.php');
}