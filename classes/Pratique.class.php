<?php

class Pratique {
    private $idPersonne;
    private $idSport;
    private $niveau;
    private $nbParticipant;
    private $nomSport;


    public function __construct($valeurs = array()){
        if (!empty($valeurs)){
            $this->affecte($valeurs);
        }
    }

    private function affecte($donnees){
        foreach($donnees as $attribut =>$valeur){
            switch($attribut){
                case 'ID_PERSONNE':$this->setidPersonne($valeur);break;
                case 'ID_SPORT':$this->setidSport($valeur);break;
                case 'NIVEAU':$this->setNiveau($valeur);break;
                case 'NBPARTICIPANTS': $this->setnbParticipants($valeur); break;
                case 'NOM'; $this->setNomSport($valeur); break;
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
    public function getidSport(){
        return $this->idSport;
    }
    /**
     * @return mixed
     */
    public function getNiveau(){
        return $this->niveau;
    }
    /**
     * @return mixed
     */
    public function getnbParticipant(){
        return $this->nbParticipant;
    }
    /**
     * @return mixed
     */
    public function getNomSport(){
        return $this->nomSport;
    }

    public function setidPersonne($idPersonne){
        $this->idPersonne = $idPersonne;
    }


    public function setidSport($idSport){
        $this->idSport = $idSport;
    }
    public function setNiveau($niveau){
        $this->niveau = $niveau;
    }
    public function setnbParticipants($nbParticipant) {
        $this->nbParticipant = $nbParticipant;
    }
    public function setNomSport ($nomSport) {
        $this->nomSport= $nomSport;
    }



}


