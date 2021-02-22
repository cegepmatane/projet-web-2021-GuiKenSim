<?php
require_once "accesseur/BaseDeDonnees.php";
require_once "./modele/Transaction.php";

class TransactionDAO{

    public static function listerTransactionParPseudo($pseudo_utilisateur){
        $MESSAGE_SQL_LISTER_TRANSACTION_PAR_PSEUDO = "SELECT id, DATE(date), prix, nom_facture FROM transactions WHERE pseudo_utilisateur = ".":pseudo_utilisateur".";";
        $baseDeDonnees = BaseDeDonnees::getConnexion();
        $requetteListerTransactionParPseudo= $baseDeDonnees->prepare($MESSAGE_SQL_LISTER_TRANSACTION_PAR_PSEUDO);
        $requetteListerTransactionParPseudo->bindParam(':pseudo_utilisateur', $pseudo_utilisateur, PDO::PARAM_STR);
        $requetteListerTransactionParPseudo->execute();
        $listeTransactionParPseudo = $requetteListerTransactionParPseudo->fetchAll();
        $listeTransactionParPseudoModele = [];

        foreach($listeTransactionParPseudo as $transaction){
            $transactionModele = new Transaction($transaction);
            array_push($listeTransactionParPseudoModele, $transactionModele);
        }

        return $listeTransactionParPseudoModele;
    }

    public static function listerTransactionParId($utilisateur_id){
        $MESSAGE_SQL_LISTER_TRANSACTION_PAR_Id = "SELECT id, DATE(date), prix, nom_facture FROM transactions WHERE utilisateur_id = ".":utilisateur_id".";";
        $baseDeDonnees = BaseDeDonnees::getConnexion();
        $requetteListerTransactionParId = $baseDeDonnees->prepare($MESSAGE_SQL_LISTER_TRANSACTION_PAR_Id);
        $requetteListerTransactionParId->bindParam(':utilisateur_id', $utilisateur_id, PDO::PARAM_INT);
        $requetteListerTransactionParId->execute();
        $listeTransactionParId = $requetteListerTransactionParId->fetchAll();
        $listeTransactionParIdModele = [];

        foreach($listeTransactionParId as $transaction){
            $transactionModele = new Transaction($transaction);
            array_push($listeTransactionParIdModele, $transactionModele);
        }

        return $listeTransactionParIdModele;
    }

    public static function ajoutertransaction($transaction){
        $MESSAGE_SQL_AJOUTER_TRANSACTION = "INSERT INTO transactions (utilisateur_id, pseudo_utilisateur, date, prix, nom_facture) VALUES (".
            ":utilisateur_id," .
            ":pseudo_utilisateur," . 
            "now()," . 
            ":prix" .
            "CONCAT('facture_', DATE(now()),'_" . ":utilisateur_id" . "'));";
        $baseDeDonnees = BaseDeDonnees::getConnexion();
        $requetteAjouterTransaction = $baseDeDonnees->prepare($MESSAGE_SQL_AJOUTER_TRANSACTION);
        $requetteAjouterTransaction->bindParam(':utilisateur_id', $transaction->getUtilisateur_id(), PDO::PARAM_INT);
        $requetteAjouterTransaction->bindParam(':pseudo_utilisateur', $transaction->getPseudo_utilisateur(), PDO::PARAM_STR);
        $requetteAjouterTransaction->bindParam(':prix', $transaction->getPrix(), PDO::PARAM_STR);
        $reussiteAjout = $requetteAjouterTransaction->execute();

        if($reussiteAjout == false)
            print_r($requetteAjouterTransaction->errorInfo());
    }
}
?>