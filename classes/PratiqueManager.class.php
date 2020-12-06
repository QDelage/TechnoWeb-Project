<?php

// Nombre de sports à afficher en page d'accueil
define("NOMBRE_SPORTS_TOP", 3);

/***
 * Classe pour interfacer le serveur PHP au serveur MySQL
 */
class PratiqueManager
{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }


    /**
     * Permet d'ajouter un lien de pratique entre une personne et un sport (et son niveau) dans la DB
     */
    public function ajout($pratique) {
        $requete = $this->db->prepare(
            'INSERT INTO pratique (id_personne,id_sport,niveau) VALUES
            (:id_personne, :id_sport, :niveau);');

        $requete->bindValue(':id_personne', $pratique->getidPersonne());
        $requete->bindValue(':id_sport', $pratique->getidSport());
        $requete->bindValue(':niveau', $pratique->getNiveau());


        $requete->execute();

        $requete->closeCursor();

    }

    /**
     * Permet d'obtenir les 3 sports les plus pratiqués de la DB pour la page d'accueil
     */
    public function topSports() {
        $sql = 'SELECT NOM, COUNT(id_personne) AS NBPARTICIPANTS 
        FROM pratique INNER JOIN sport ON pratique.id_sport = sport.id_sport 
        GROUP BY pratique.id_sport ORDER BY COUNT(id_personne) DESC LIMIT '.NOMBRE_SPORTS_TOP;

        $requete = $this->db->prepare($sql);
        $requete->execute();
        while ($pratique = $requete->fetch(PDO::FETCH_OBJ)) {
            $pratiques[] = new Pratique($pratique);
        }

        $requete->closeCursor();
        return $pratiques;
    }


}

