<?php

class Produit{
    
    public static $filtres = array(
        'id' => FILTER_VALIDATE_INT,
        'titre' => FILTER_SANITIZE_STRING,
        'description' => FILTER_SANITIZE_STRING,
        'prix' => FILTER_SANITIZE_ENCODED,
        'image' => FILTER_SANITIZE_STRING
    );

    private $id;
    private $titre;
    private $description;
    private $prix;
    private $image;

    function __construct($tableau){
        $tableau = filter_var_array($tableau ,Produit::$filtres);

        $this->setId($tableau['id']);
        $this->setTitre($tableau['titre']);
        $this->setDescription($tableau['description']);
        $this->setPrix($tableau['prix']);
        $this->setImage($tableau['image']);
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

    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this->titre;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this->description;
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

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this->image;
    }
}
?>