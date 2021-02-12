<?php
require "BaseDeDonnees.php";
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
    
        $produit = $requetteListerProduitsParId->fetch();
        return $produit;
    }
    
    public static function ajouterUtilisateur($pseudo,$courriel,$motdepasse){
        
        echo $pseudo;
        
       /* $MESSAGE_SQL_AJOUTER_UTILISATEUR = "INSERT INTO utilisateurs (pseudo, courriel, motdepasse) VALUES (".":pseudo".",".":courriel".",".":motdepasse".");";
        $baseDeDonnees = BaseDeDonnees::getConnexion();
        
        if (!filter_var($prix, FILTER_SANITIZE_NUMBER_FLOAT) === false) {
            $requetteAjouterProduits= $baseDeDonnees->prepare($MESSAGE_SQL_AJOUTER_PRODUIT);
            $requetteAjouterProduits->bindParam(':pseudo', $titre, PDO::PARAM_STR);
            $requetteAjouterProduits->bindParam(':courriel', $description, PDO::PARAM_STR);
            $requetteAjouterProduits->bindParam(':motdepasse', $prix, PDO::PARAM_STR);
            $requetteAjouterProduits->execute();
            $req = pg_get_result($requetteAjouterProduits);
            echo pg_result_error($req);
            return true;
          
        } else {
          return false;
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