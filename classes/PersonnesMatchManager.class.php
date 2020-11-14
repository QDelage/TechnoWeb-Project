<?php

/***
 * Classe pour interfacer le serveur PHP au serveur MySQL
 */
class PersonnesMatchManager {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }


    /**
     * Savoir si un match existe déjà entre deux personnes (pour ne pas le duppliquer dans l'autre sens)
     */
    public function getMatchEntre($id1, $id2) {
        $requete = $this->db->prepare(
            'SELECT ID_PERSONNE1, ID_PERSONNE2, STATUTPERSONNE1, STATUTPERSONNE2
                FROM personnesmatch
                WHERE ID_PERSONNE1 = :id1 AND ID_PERSONNE2 = :id2
                OR ID_PERSONNE1 = :id2 AND ID_PERSONNE2 = :id1');

        $requete->bindValue(':id1', $id1);
        $requete->bindValue(':id2', $id2);


        $requete->execute();
        while ($personneMatch = $requete->fetch(PDO::FETCH_OBJ)) {
            $personneMatchs[] = new PersonnesMatch($personneMatch);
        }
        $requete->closeCursor();


        if (isset($personneMatchs[0])) {
            return $personneMatchs[0];
        }else{
            return false;
        }
    }

    /**
     * Crée un match entre deux personnes
     *  $id1 : la personne ÉMÉTRICE du match, $id2 : la réceptrice
     */
    public function createMatchEntre($id1, $id2) {
        $requete = $this->db->prepare(
            'INSERT INTO personnesmatch (ID_PERSONNE1, ID_PERSONNE2, STATUTPERSONNE1, STATUTPERSONNE2)
                VALUES (:id1, :id2, "DEMANDE", "EN ATTENTE")');

        $requete->bindValue(':id1', $id1);
        $requete->bindValue(':id2', $id2);


        $requete->execute();
        $requete->closeCursor();

    }

    /**
     * Permet de valider un match en attente
     */
    public function validerMatch($id1, $id2) {
        $requete = $this->db->prepare(
            'UPDATE personnesmatch SET STATUTPERSONNE2 = "VALIDE"
                WHERE ID_PERSONNE1 = :id1 AND ID_PERSONNE2 = :id2');

        $requete->bindValue(':id1', $id1);
        $requete->bindValue(':id2', $id2);


        $requete->execute();
        $requete->closeCursor();

    }

    /**
     * Permet d'obtenir la liste des matchs en attente d'une personne
     */
    public function getMatchsEnAttente($id) {
        $requete = $this->db->prepare(
            'SELECT ID_PERSONNE1, ID_PERSONNE2, STATUTPERSONNE1, STATUTPERSONNE2
                FROM personnesmatch
                WHERE ID_PERSONNE2 = :id
                AND statutpersonne2 != "VALIDE"
                AND statutpersonne2 != "REFUSE"');

        $requete->bindValue(':id', $id);


        $requete->execute();
        while ($personneMatch = $requete->fetch(PDO::FETCH_OBJ)) {
            $personneMatchs[] = new PersonnesMatch($personneMatch);
        }
        $requete->closeCursor();


        if (isset($personneMatchs[0])) {
            return $personneMatchs;
        }else{
            return false;
        }
    }

}