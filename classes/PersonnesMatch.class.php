<?php

class PersonnesMatch {
    private $idPersonne1;
    private $idPersonne2;
    private $statutPers1;
    private $statutPers2;


    public function __construct($valeurs = array()){
        if (!empty($valeurs)){
            $this->affecte($valeurs);
        }
    }
    
    private function affecte($donnees){
        foreach($donnees as $attribut =>$valeur){
            switch($attribut){
                case 'ID_PERSONNE1':$this->setIdPersonne1($valeur);break;
                case 'ID_PERSONNE2':$this->setIdPersonne2($valeur);break;
                case 'STATUTPERSONNE1':$this->setStatutPers1($valeur);break;
                case 'STATUTPERSONNE2':$this->setStatutPers2($valeur);break;
            }
        }
    }
    
    /**
     * @return mixed
     */
    public function getIdPersonne1() {
        return $this->idPersonne1;
    }

    /**
     * @return mixed
     */
    public function getIdPersonne2() {
        return $this->idPersonne2;
    }

    /**
     * @return mixed
     */
    public function getStatutPers1() {
        return $this->statutPers1;
    }

    /**
     * @return mixed
     */
    public function getStatutPers2() {
        return $this->statutPers2;
    }


    /**
     * @param mixed $id
     */
    public function setIdPersonne1($idPersonne1) {
        $this->idPersonne1 = $idPersonne1;
    }

    /**
     * @param mixed $id
     */
    public function setIdPersonne2($idPersonne2) {
        $this->idPersonne2 = $idPersonne2;
    }

    /**
     * @param mixed $statutPers1
     */
    public function setStatutPers1($statutPers1) {
        $this->statutPers1 = $statutPers1;
    }

    /**
     * @param mixed $statutPers2
     */
    public function setStatutPers2($statutPers2) {
        $this->statutPers2 = $statutPers2;
    }
}

