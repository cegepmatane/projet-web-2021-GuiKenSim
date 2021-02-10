<?php

class Utilisateur{

    private $id;
    private $pseudo;
    private $email;
    private $motdepasse;

    function __construct($id, $pseudo, $email, $motdepasse){
        $this.setId($id);
        $this.setTitre($pseudo);
        $this.setDescription($email);
        $this.setPrix($motdepasse);
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
    

}
?>