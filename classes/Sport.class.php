<?php

class Sport {
    private $idSport;
    private $nom;


    public function __construct($valeurs = array()){
        if (!empty($valeurs)){
            $this->affecte($valeurs);
        }
    }
    
    private function affecte($donnees){
        foreach($donnees as $attribut =>$valeur){
            switch($attribut){
                case 'ID_SPORT':$this->setidSport
        
        ($valeur);break;
                case 'NOM':$this->setNom($valeur);break;
            }
        }
    }
    
    /**
     * @return mixed
     */
    public function getidSport()
    {
        return $this->idSport        ;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }


    /**
     * @param mixed $id
     */
    public function setidSport($idSport)
    {
        $this->idSport        = $idSport ;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    
}

