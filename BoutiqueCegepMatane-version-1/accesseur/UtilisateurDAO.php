<?php
require_once "BaseDeDonnees.php";
require_once "./modele/Utilisateur.php"; 
class UtilisateurDAO{

    public static function recupUtilisateurParPseudo($pseudo){
        $MESSAGE_SQL_LISTER_PRODUIT_PAR_ID = "SELECT id, pseudo, courriel, motdepasse FROM utilisateurs WHERE pseudo=".":pseudo".";";
        $baseDeDonnees = BaseDeDonnees::getConnexion();
        $requetterecupUtilisateurParPseudo = $baseDeDonnees->prepare($MESSAGE_SQL_LISTER_PRODUIT_PAR_ID);
        $requetterecupUtilisateurParPseudo->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $requetterecupUtilisateurParPseudo->execute();
        
        
        $utilisateur = $requetterecupUtilisateurParPseudo->fetch();
        if (empty($utilisateur)){
        return "utilisateur non existant";
        }
        return $utilisateur;
    }
    
    public static function ajouterUtilisateur($utilisateur){
        
        //echo "pseudo : ".$utilisateur->getPseudo();
        $MESSAGE_SQL_PSEUDO_EXISTANT = "SELECT pseudo FROM utilisateurs WHERE pseudo = :pseudo";
        $baseDeDonnees = BaseDeDonnees::getConnexion();
        $requetteChercherUtilisateur = $baseDeDonnees->prepare($MESSAGE_SQL_PSEUDO_EXISTANT);
        $pseudoUtilisateur = $utilisateur->getPseudo();
        $requetteChercherUtilisateur->bindParam(':pseudo', $pseudoUtilisateur, PDO::PARAM_STR);
        $requetteChercherUtilisateur->execute();
        $utilisateurExistant = $requetteChercherUtilisateur->fetch(PDO::FETCH_ASSOC);

        if (isset($utilisateurExistant) && !empty($utilisateurExistant)){
        return "utilisateur ou pseudo déjà existant";
        }
        
        $MESSAGE_SQL_COURRIEL_EXISTANT = "SELECT courriel FROM utilisateurs WHERE courriel = :courriel";
        $baseDeDonnees = BaseDeDonnees::getConnexion();
        $requetteChercherCourriel = $baseDeDonnees->prepare($MESSAGE_SQL_COURRIEL_EXISTANT);
        $courrielUtilisateur = $utilisateur->getCourriel();
        $requetteChercherCourriel->bindParam(':courriel', $courrielUtilisateur, PDO::PARAM_STR);
        $requetteChercherCourriel->execute();
        $courrielExistant = $requetteChercherCourriel->fetch(PDO::FETCH_ASSOC);

        if (isset($courrielExistant) && !empty($courrielExistant)){
        return "courriel déjà existant";
        }
        
        
        
        $MESSAGE_SQL_AJOUTER_UTILISATEUR = "INSERT INTO utilisateurs (pseudo, courriel, motdepasse) VALUES (".":pseudo".",".":courriel".",".":motdepasse".");";
        $baseDeDonnees = BaseDeDonnees::getConnexion();
        $pseudo = $utilisateur->getPseudo();
        $courriel = $utilisateur->getCourriel();
        $motdepasse = $utilisateur->getMotDePasse();
        print_r($pseudo.$motdepasse.$courriel);
        $requetteAjouterUtilisateur= $baseDeDonnees->prepare($MESSAGE_SQL_AJOUTER_UTILISATEUR);
        $requetteAjouterUtilisateur->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $requetteAjouterUtilisateur->bindParam(':courriel', $courriel, PDO::PARAM_STR);
        $requetteAjouterUtilisateur->bindParam(':motdepasse', $motdepasse, PDO::PARAM_STR);
        $requetteAjouterUtilisateur->execute();
        $req = pg_get_result($requetteAjouterUtilisateur);
        echo pg_result_error($req);
        return false;

        
    }

}
?>