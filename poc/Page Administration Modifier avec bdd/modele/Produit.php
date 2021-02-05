<?php​
class Produit{
​
    private $id;
    private $titre;
    private $description;
    private $prix;
    private $image;
​
    function __construct($id, $titre, $description, $prix, $image){
        $this.setId($id);
        $this.setTitre($titre);
        $this.setDescription($description);
        $this.setPrix($prix);
        $this.setImage($image);
    }
​
    public function getId()
    {
        return $this->id;
    }
​
    public function setId($id)
    {
        $this->id = $id;
​
        return $this->id;
    }
​
    public function getTitre()
    {
        return $this->titre;
    }
​
    public function setTitre($titre)
    {
        $this->titre = $titre;
​
        return $this->titre;
    }
​
    public function getDescription()
    {
        return $this->description;
    }
​
    public function setDescription($description)
    {
        $this->description = $description;
​
        return $this->description;
    }
​
    public function getPrix()
    {
        return $this->prix;
    }
​
    public function setPrix($prix)
    {
        $this->prix = $prix;
​
        return $this->prix;
    }
​
    public function getImage()
    {
        return $this->image;
    }
​
    public function setImage($image)
    {
        $this->image = $image;
​
        return $this->image;
    }
}
?>