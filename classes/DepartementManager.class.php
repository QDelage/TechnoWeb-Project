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
    public function getAllDepartments(){
        $controles = Array();

        $sql = 'SELECT ID_DEPARTEMENT, NOM 
                    FROM departement
                    ORDER BY NOM';

        $requete = $this->db->prepare($sql);
        $requete->execute();

        while ($departement = $requete->fetch(PDO::FETCH_OBJ)) {
            $departements[] = new Departement($departement);
        }
        $requete->closeCursor();

        return $departements;
    }

    /**
     * Obtenir un département selon son ID
     */
    public function getDepartement($id){
        $controles = Array();

        $sql = 'SELECT ID_DEPARTEMENT, NOM 
                    FROM departement
                    WHERE ID_DEPARTEMENT = :id';

        $requete = $this->db->prepare($sql);
        $requete->bindValue(':id', $id, PDO::PARAM_STR);
        $requete->execute();

        while ($departement = $requete->fetch(PDO::FETCH_OBJ)) {
            $departements[] = new Departement($departement);
        }
        $requete->closeCursor();

        return $departements[0];
    }
}

