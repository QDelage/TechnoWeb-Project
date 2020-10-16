<?php

class Departement {
    private $idDepartement;
    private $nom;


    public function __construct($valeurs = array()){
        if (!empty($valeurs)){
            $this->affecte($valeurs);
        }
    }
    
    private function affecte($donnees){
        foreach($donnees as $attribut =>$valeur){
            switch($attribut){
                case 'ID_DEPARTEMENT':$this->setIdDepartement($valeur);break;
                case 'NOM':$this->setNom($valeur);break;
            }
        }
    }
    
    /**
     * @return mixed
     */
    public function getIdDepartement()
    {
        return $this->idDepartement;
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
    public function setIdDepartement($idDepartement)
    {
        $this->idDepartement = $idDepartement;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    
}

