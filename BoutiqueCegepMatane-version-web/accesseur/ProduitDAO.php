<?php
require_once "accesseur/BaseDeDonnees.php";
require_once "./modele/Produit.php";
class ProduitDAO{
    
    public static function listerProduits(){
        $MESSAGE_SQL_LISTER_PRODUITS = "SELECT id, titre, description, prix, image FROM produit;";
        $baseDeDonnees = BaseDeDonnees::getConnexion();
        $requetteListerProduits = $baseDeDonnees->prepare($MESSAGE_SQL_LISTER_PRODUITS);
        $requetteListerProduits->execute();
        $listeProduits = $requetteListerProduits->fetchAll(PDO::FETCH_OBJ);

        return $listeProduits;
    }

    public static function listerProduitParId($id){
        $MESSAGE_SQL_LISTER_PRODUIT_PAR_ID = "SELECT id, titre, description, prix, image FROM produit WHERE id=".":id".";";
        $baseDeDonnees = BaseDeDonnees::getConnexion();
        $requetteListerProduitsParId = $baseDeDonnees->prepare($MESSAGE_SQL_LISTER_PRODUIT_PAR_ID);
        $requetteListerProduitsParId->bindParam(':id', $id, PDO::PARAM_INT);
        $requetteListerProduitsParId->execute();
    
        $produit = $requetteListerProduitsParId->fetch();
        $produitModele = new Produit($produit);
        return $produitModele;
    }
    
    public static function ajouterProduit($titre,$description,$prix,$image){
        $MESSAGE_SQL_AJOUTER_PRODUIT = "INSERT INTO produit (titre, description, prix, image) VALUES (".":titre".",".":description".",".":prix".",".":image".");";
        $baseDeDonnees = BaseDeDonnees::getConnexion();
        $titre = filter_var($titre,FILTER_SANITIZE_STRING);
        $description = filter_var($description,FILTER_SANITIZE_STRING);
        if (!filter_var($prix, FILTER_SANITIZE_NUMBER_FLOAT) === false) {
            $requetteAjouterProduits= $baseDeDonnees->prepare($MESSAGE_SQL_AJOUTER_PRODUIT);
            $requetteAjouterProduits->bindParam(':titre', $titre, PDO::PARAM_STR);
            $requetteAjouterProduits->bindParam(':description', $description, PDO::PARAM_STR);
            $requetteAjouterProduits->bindParam(':prix', $prix, PDO::PARAM_STR);
            $requetteAjouterProduits->bindParam(':image', $image, PDO::PARAM_STR);
            $requetteAjouterProduits->execute();
            $req = pg_get_result($requetteAjouterProduits);
            echo pg_result_error($req);
            return true;
          
        } else {
          return false;
        }
        
    }

    public static function modifierProduit($id,$titre,$description,$prix,$image){
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
    }

    public static function supprimerProduit($idProduit){
        $MESSAGE_SQL_SUPPRIMER_PRODUIT = "DELETE FROM produit WHERE id=".":id".";";
        $baseDeDonnees = BaseDeDonnees::getConnexion();
        $requetteSupprimerProduit = $baseDeDonnees->prepare($MESSAGE_SQL_SUPPRIMER_PRODUIT);
        $requetteSupprimerProduit->bindParam(':id', $idProduit, PDO::PARAM_STR);
        $requetteSupprimerProduit->execute();
    }
}
?>