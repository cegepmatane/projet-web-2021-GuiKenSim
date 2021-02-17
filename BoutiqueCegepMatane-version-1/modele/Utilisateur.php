<?php

class Utilisateur{

    private $id;
    private $pseudo;
    private $courriel;
    private $motdepasse;

    function __construct($id, $pseudo, $courriel, $motdepasse){
        

        $pseudo = filter_var($pseudo,FILTER_SANITIZE_STRING);
        $courriel = filter_var($courriel,FILTER_SANITIZE_STRING);
        $motdepasse = filter_var($motdepasse,FILTER_SANITIZE_ENCODED);
        
        $this->setId($id);
        $this->setPseudo($pseudo);
        $this->setCourriel($courriel);
        $this->setMotDePasse($motdepasse);
        
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
        return $this->id;
    }
    
    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = filter_var($pseudo,FILTER_SANITIZE_STRING);;

        return $this->pseudo;
    }
    
    public function getCourriel()
    {
        return $this->courriel;
    }

    public function setCourriel($courriel)
    {
        $this->courriel = filter_var($courriel,FILTER_SANITIZE_STRING);

        return $this->courriel;
    }
    
    public function getMotDePasse()
    {
        return $this->motdepasse;
    }

    public function setMotDePasse($motdepasse)
    {
        $this->motdepasse = $motdepasse;

        return $this->motdepasse;
    }
    

}
?>