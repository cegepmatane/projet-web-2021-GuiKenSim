<?php
require "BaseDeDonnees.php";

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
        return $produit;
    }

    public static function modifierProduit($id,$titre,$description,$prix,$image){
        $MESSAGE_SQL_MODIFIER_PRODUIT = "UPADTE produit SET id=".":id".",titre=".":titre".",".":description".",".":prix".",".":image".");";
        $baseDeDonnees = BaseDeDonnees::getConnexion();
        $requetteModifierProduits = $baseDeDonnees->prepare($MESSAGE_SQL_MODIFIER_PRODUIT);
        $requetteModifierProduits->bindParam(':id', $id, PDO::PARAM_STR);
        $requetteModifierProduits->bindParam(':titre', $titre, PDO::PARAM_STR);
        $requetteModifierProduits->bindParam(':description', $description, PDO::PARAM_STR);
        $requetteModifierProduits->bindParam(':prix', $prix, PDO::PARAM_INT);
        $requetteModifierProduits->bindParam(':image', $image, PDO::PARAM_STR);
        $requetteModifierProduits->execute();

        return true;
    }
}
?>