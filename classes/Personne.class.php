<?php

class Personne {
    private $idPersonne;
    private $nom;
    private $prenom;
    private $idDepartement;
    private $mail;
    private $mdp;

    public function __construct($valeurs = array()){
        if (!empty($valeurs)){
            $this->affecte($valeurs);
        }
    }
    
    private function affecte($donnees){
        foreach($donnees as $attribut =>$valeur){
            switch($attribut){
                case 'ID_PERSONNE':$this->setidPersonne($valeur);break;
                case 'NOM':$this->setNom($valeur);break;
                case 'PRENOM':$this->setPrenom($valeur);break;
                case 'ID_DEOARTEMENT':$this->setIDDepartement($valeur);break;
                case 'MAIL':$this->setMail($valeur);break;
                case 'MDPHASH':$this->setMDP($valeur);break;
            }
        }
    }
    
    /**
     * @return mixed
     */
    public function getidPersonne(){
        return $this->idPersonne;
    }

    /**
     * @return mixed
     */
    public function getNom(){
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom(){
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getIdDepartement(){
        return $this->idDepartement;
    }

    /**
     * @return mixed
     */
    public function getMail(){
        return $this->mail;
    }

    /**
     * @return mixed
     */
    public function getMDP(){
        return $this->mdp;
    }


    /**
     * @param mixed $id
     */
    public function setidPersonne($idPersonne){
        $this->idPersonne = $idPersonne;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom){
        $this->nom = $nom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom){
        $this->nom = $prenom;
    }

    /**
     * @param mixed $idDepartement
     */
    public function setIDDepartement($idDepartement){
        $this->nom = $idDepartement;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail){
        $this->nom = $mail;
    }

    /**
     * @param mixed $mdp
     */
    public function setMDP($mdp){
        $this->nom = $mdp;
    }

    

    
}

