<?php

/***
 * Classe pour interfacer le serveur PHP au serveur MySQL
 */
class PratiqueManager {
    private $db;

    public function __construct($db){
        $this->db = $db;
    }


    public function ajout($pratique){
        $requete = $this->db->prepare(
            'INSERT INTO pratique (id_personne,id_sport,niveau) VALUES
            (:id_personne, :id_sport, :niveau);');

        $requete->bindValue(':id_personne',$pratique->getidPersonne());
        $requete->bindValue(':id_sport',$pratique->getidSport());
        $requete->bindValue(':niveau',$pratique->getNiveau());


        $requete->execute();

        $requete->closeCursor();

    }



}

