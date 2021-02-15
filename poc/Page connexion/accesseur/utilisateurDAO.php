<?php
require "BaseDeDonnees.php";
require "./modele/Utilisateur.php"; 
class UtilisateurDAO{
    
    /*public static function listerProduits(){
        $MESSAGE_SQL_LISTER_PRODUITS = "SELECT id, titre, description, prix, image FROM produit;";
        $baseDeDonnees = BaseDeDonnees::getConnexion();
        $requetteListerProduits = $baseDeDonnees->prepare($MESSAGE_SQL_LISTER_PRODUITS);
        $requetteListerProduits->execute();
        $listeProduits = $requetteListerProduits->fetchAll(PDO::FETCH_OBJ);

        return $listeProduits;
    }*/

    public static function recupUtilisateurParPseudo($pseudo){
        $MESSAGE_SQL_LISTER_PRODUIT_PAR_ID = "SELECT id, pseudo, courriel, motdepasse FROM utilisateurs WHERE pseudo=".":pseudo".";";
        $baseDeDonnees = BaseDeDonnees::getConnexion();
        $requetterecupUtilisateurParPseudo = $baseDeDonnees->prepare($MESSAGE_SQL_LISTER_PRODUIT_PAR_ID);
        $requetterecupUtilisateurParPseudo->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $requetterecupUtilisateurParPseudo->execute();
    
        $utilisateurs = $requetterecupUtilisateurParPseudo->fetch();
        return $utilisateurs;
    }
    
    public static function ajouterUtilisateur($utilisateur){
        
        echo "pseudo : ".$utilisateur->getPseudo();
        $MESSAGE_SQL_PSEUDO_EXISTANT = "SELECT pseudo FROM utilisateurs WHERE pseudo = :pseudo";
        $baseDeDonnees = BaseDeDonnees::getConnexion();
        $requetteChercherUtilisateur = $baseDeDonnees->prepare($MESSAGE_SQL_PSEUDO_EXISTANT);
        $pseudoUtilisateur = $utilisateur->getPseudo();
        $requetteChercherUtilisateur->bindParam(':pseudo', $pseudoUtilisateur, PDO::PARAM_STR);
        $requetteChercherUtilisateur->execute();
        $utilisateur = $requetteChercherUtilisateur->fetch(PDO::FETCH_ASSOC);

        if (isset($utilisateur) && !empty($utilisateur)){
        return "utilisateur ou pseudo déjà existant";
        }
       /* $MESSAGE_SQL_AJOUTER_UTILISATEUR = "INSERT INTO utilisateurs ($utilisateur->getPseudo(), courriel, motdepasse) VALUES (".":pseudo".",".":courriel".",".":motdepasse".");";
        $baseDeDonnees = BaseDeDonnees::getConnexion();
        
        if (!filter_var($prix, FILTER_SANITIZE_NUMBER_FLOAT) === false) {
            $requetteAjouterUtilisateur= $baseDeDonnees->prepare($MESSAGE_SQL_AJOUTER_UTILISATEUR);
            $requetteAjouterUtilisateur->bindParam(':pseudo', $titre, PDO::PARAM_STR);
            $requetteAjouterUtilisateur->bindParam(':courriel', $description, PDO::PARAM_STR);
            $requetteAjouterUtilisateur->bindParam(':motdepasse', $prix, PDO::PARAM_STR);
            $requetteAjouterUtilisateur->execute();
            $req = pg_get_result($requetteAjouterProduits);
            echo pg_result_error($req);
            return false;
          
        } else {
          return true;
        }*/
        
    }

    /*public static function modifierProduit($id,$titre,$description,$prix,$image){
        $MESSAGE_SQL_MODIFIER_PRODUIT = "UPDATE produit SET titre=".":titre".", description=".":description".", prix=".":prix".", image=".":image"." WHERE id=".":id".";";
        $baseDeDonnees = BaseDeDonnees::getConnexion();
        $requetteModifierProduits= $baseDeDonnees->prepare($MESSAGE_SQL_MODIFIER_PRODUIT);
        $requetteModifierProduits->bindParam(':id', $id, PDO::PARAM_STR);
        $requetteModifierProduits->bindParam(':titre', $titre, PDO::PARAM_STR);
        $requetteModifierProduits->bindParam(':description', $description, PDO::PARAM_STR);
        $requetteModifierProduits->bindParam(':prix', $prix, PDO::PARAM_STR);
        $requetteModifierProduits->bindParam(':image', $image, PDO::PARAM_STR);
        $requetteModifierProduits->execute();
        $req = pg_get_result($requetteModifierProduits);
        echo pg_result_error($req);
        return true;
    }*/
}
?>