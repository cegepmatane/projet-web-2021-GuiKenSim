<?php

class Transaction{

    public static $filtres = array(
        'id' => FILTER_VALIDATE_INT,
        'utilisateur_id' => FILTER_VALIDATE_INT,
        'pseudo_utilisateur' => FILTER_SANITIZE_STRING,
        'date' => FILTER_SANITIZE_STRING,
        'prix' => FILTER_SANITIZE_ENCODED,
        'nom_facture' => FILTER_SANITIZE_STRING
    );

    private $id;
    private $utilisateur_id;
    private $pseudo_utilisateur;
    private $date;
    private $prix;
    private $nom_facture;

    function __construct($tableau){
        $tableau = filter_var_array($tableau, Transaction::$filtres);

        $this->setId($tableau['id']);
        $this->setUtilisateur_id($tableau['utilisateur_id']);
        $this->setPseudo_utilisateur($tableau['pseudo_utilisateur']);
        $this->setDate($tableau['date']);
        $this->setPrix($tableau['prix']);
        $this->setNom_facture($tableau['nom_facture']);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this->id;
    }

    public function getUtilisateur_id()
    {
        return $this->utilisateur_id;
    }

    public function setUtilisateur_id($utilisateur_id)
    {
        $this->utilisateur_id = $utilisateur_id;

        return $this->utilisateur_id;
    }

    public function getPseudo_utilisateur()
    {
        return $this->pseudo_utilisateur;
    }

    public function setPseudo_utilisateur($pseudo_utilisateur)
    {
        $this->pseudo_utilisateur = $pseudo_utilisateur;

        return $this->pseudo_utilisateur;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;

        return $this->date;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this->prix;
    }

    public function getNom_facture()
    {
        return $this->nom_facture;
    }

    public function setNom_facture($nom_facture)
    {
        $this->nom_facture = $nom_facture;

        return $this->nom_facture;
    }
}
?>