<?php

/***
 * Classe pour interfacer le serveur PHP au serveur MySQL
 */
class DepartementManager {
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    /**
     * Obtenir tous les départements de la DB
     */
    public function getAllDepartments($id){
        $controles = Array();

        $sql = 'SELECT ID_DEPARTEMENT, NOM 
                    FROM departement';

        $requete = $this->db->prepare($sql);
        $requete->execute();

        while ($departement = $requete->fetch(PDO::FETCH_OBJ)) {
            $departements[] = new Departement($departement);
        }
        $requete->closeCursor();

        return $departements;
    }
}

