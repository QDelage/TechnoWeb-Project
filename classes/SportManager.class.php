<?php

/***
 * Classe pour interfacer le serveur PHP au serveur MySQL
 */
class SportManager {
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function getAllSports($id){
        $controles = Array();

        $sql = 'SELECT ID_SPORT, NOM 
                    FROM sport';

        $requete = $this->db->prepare($sql);
        $requete->execute();

        while ($sport = $requete->fetch(PDO::FETCH_OBJ)) {
            $sports[] = new Sport($sport);
        }
        $requete->closeCursor();

        return $sports;
    }
}

