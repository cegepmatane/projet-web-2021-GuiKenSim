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

    public static function testCourrielExistant($courriel){
        $MESSAGE_SQL_COURRIEL_EXISTANT = "SELECT courriel FROM utilisateurs WHERE courriel=".":courriel".";";
        $baseDeDonnees = BaseDeDonnees::getConnexion();
        $requettetestCourrielExistant = $baseDeDonnees->prepare($MESSAGE_SQL_COURRIEL_EXISTANT);
        $requettetestCourrielExistant->bindParam(':courriel', $courriel, PDO::PARAM_STR);
        $requettetestCourrielExistant->execute();
        
        
        $courriel = $requettetestCourrielExistant->fetch();
        if (empty($courriel)){
        return "courriel non existant";
        }
        return $courriel;
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
        $requetteAjouterUtilisateur= $baseDeDonnees->prepare($MESSAGE_SQL_AJOUTER_UTILISATEUR);
        $requetteAjouterUtilisateur->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $requetteAjouterUtilisateur->bindParam(':courriel', $courriel, PDO::PARAM_STR);
        $requetteAjouterUtilisateur->bindParam(':motdepasse', $motdepasse, PDO::PARAM_STR);
        $requetteAjouterUtilisateur->execute();
        $req = pg_get_result($requetteAjouterUtilisateur);
        echo pg_result_error($req);
        return false;

        
    }
    public static function modifierUtilisateur($utilisateur,$changementsUtilisateur){
        
        
        $ancienPseudo = $utilisateur->getPseudo();
        $nouveauPseudo = $changementsUtilisateur->getPseudo();
        $ancienCourriel = $utilisateur->getCourriel();
        $nouveauCourriel = $changementsUtilisateur->getCourriel();
     
        // fonction pour vérifier que qu'un autre utilisateur n'a pas déjà le pseudo choisi
        if($ancienPseudo != $nouveauPseudo){
            $MESSAGE_SQL_PSEUDO_EXISTANT = "SELECT pseudo FROM utilisateurs WHERE pseudo = :pseudo";
            $baseDeDonnees = BaseDeDonnees::getConnexion();
            $requetteChercherUtilisateur = $baseDeDonnees->prepare($MESSAGE_SQL_PSEUDO_EXISTANT);
            $requetteChercherUtilisateur->bindParam(':pseudo', $nouveauPseudo, PDO::PARAM_STR);
            $requetteChercherUtilisateur->execute();
            $utilisateurExistant = $requetteChercherUtilisateur->fetch(PDO::FETCH_ASSOC);

            if (isset($utilisateurExistant) && !empty($utilisateurExistant)){
                return "Le pseudo choisi est déjà pris";
            }

        }
        // fonction pour vérifier que qu'un autre utilisateur n'a pas déjà le courriel choisi
        if($ancienCourriel != $nouveauCourriel){
            $MESSAGE_SQL_COURRIEL_EXISTANT = "SELECT courriel FROM utilisateurs WHERE courriel = :courriel";
            $baseDeDonnees = BaseDeDonnees::getConnexion();
            $requetteChercherCourriel = $baseDeDonnees->prepare($MESSAGE_SQL_COURRIEL_EXISTANT);
            $requetteChercherCourriel->bindParam(':courriel', $nouveauCourriel, PDO::PARAM_STR);
            $requetteChercherCourriel->execute();
            $courrielExistant = $requetteChercherCourriel->fetch(PDO::FETCH_ASSOC);

            if (isset($courrielExistant) && !empty($courrielExistant)){
            return "Le courriel choisi est déjà pris";
            }
        }
        
        
        // Création de la requête et bind param des arguments puis exécution
        //UPDATE utilisateurs SET pseudo= 'simone',courriel= 'simon.delarue2@gmail.com' WHERE pseudo = 'simon';
        $MESSAGE_SQL_MODIFIER_UTILISATEUR = "UPDATE utilisateurs SET pseudo = :pseudo , courriel = :courriel WHERE pseudo = :ancienPseudo";
        $baseDeDonnees = BaseDeDonnees::getConnexion();
        $requetteModifierUtilisateur = $baseDeDonnees->prepare($MESSAGE_SQL_MODIFIER_UTILISATEUR);
        $requetteModifierUtilisateur->bindParam(':pseudo', $nouveauPseudo, PDO::PARAM_STR);
        $requetteModifierUtilisateur->bindParam(':courriel', $nouveauCourriel, PDO::PARAM_STR);
        $requetteModifierUtilisateur->bindParam(':ancienPseudo', $ancienPseudo, PDO::PARAM_STR);
        $requetteModifierUtilisateur->execute();
        
        $req = pg_get_result($requetteModifierUtilisateur);
        echo pg_result_error($req);
        return false;

        
    }
    
    public static function modifierMotDePasse($utilisateur){
        
        $motdepasse = $utilisateur->getMotDePasse();
        $pseudo = $utilisateur->getPseudo();
        // Création de la requête et bind param des arguments puis exécution
        
        $MESSAGE_SQL_MODIFIER_MOTDEPASSE = "UPDATE utilisateurs SET motdepasse = :motdepasse WHERE pseudo = :pseudo";
        $baseDeDonnees = BaseDeDonnees::getConnexion();
        $requetteModifierMotDePasse = $baseDeDonnees->prepare($MESSAGE_SQL_MODIFIER_MOTDEPASSE);
        $requetteModifierMotDePasse->bindParam(':motdepasse', $motdepasse , PDO::PARAM_STR);
        $requetteModifierMotDePasse->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $requetteModifierMotDePasse->execute();
        
        $req = pg_get_result($requetteModifierMotDePasse);
        echo pg_result_error($req);
        return false;
        
    }

}
?>