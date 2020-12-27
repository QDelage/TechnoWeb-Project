<?php

/***
 * Classe pour interfacer le serveur PHP au serveur MySQL
 */
class PersonneManager {
    private $db;

    public function __construct($db){
        $this->db = $db;
    }


    /**
     * Inscrire un utilisateur dans la DB
     */
    public function inscription($pers){
        $requete = $this->db->prepare(
            'INSERT INTO personne (NOM, PRENOM, DESCRIPTION, ID_DEPARTEMENT, MAIL, MDPHASH) VALUES
            (:nom, :prenom,:description, :dpt, :mail, :mdp);');

        $requete->bindValue(':nom',$pers->getNom());
        $requete->bindValue(':prenom',$pers->getPrenom());
        $requete->bindValue(':dpt',$pers->getIdDepartement());
        $requete->bindValue(':mail',$pers->getMail());
        $requete->bindValue(':description',$pers->getDescription());

        // Afin de ne pas stocker le mot de passe en clair, on le hash en SHA-256
        // Et pour ne pas le rendre vulnérable aux attaques "facilement", on y ajoute un grain de sel
        $pwd = $pers->getMDP();
        $salt = "48@!alsd";
        $pwd = hash('sha256', $pwd).$salt;
        $pwd = hash('sha256', $pwd);
        $requete->bindValue(':mdp',$pwd);

        $requete->execute();

        $id =  $this->db->lastInsertId();
        $requete->closeCursor();

        return $id;
    }

    /**
     * Vérifie les informations de connexion (mail et mdp) d'un utilisateur pour le connecter
     */
    public function connexion($mail, $pwd){
        $sql = 'SELECT ID_PERSONNE, NOM, PRENOM, PHOTO, DESCRIPTION, ID_DEPARTEMENT, MAIL, MDPHASH 
                    FROM personne 
                    WHERE mail=:log AND mdpHash=:pwd';

        $requete = $this->db->prepare($sql);

        // Il faut de nouveau hasher le mot de passe fourni avec le même grain de sel
        $salt = "48@!alsd";
        $pwd = hash('sha256', $pwd).$salt;
        $pwd = hash('sha256', $pwd);
        $requete->bindValue(':pwd',$pwd);


        // Requete préparée
        $requete->bindValue(':log',$mail,PDO::PARAM_STR);
        $requete->bindValue(':pwd',$pwd,PDO::PARAM_STR);


        $requete->execute();
        while ($personne = $requete->fetch(PDO::FETCH_OBJ)) {
            $personnes[] = new Personne($personne);
        }
        $requete->closeCursor();


        if (isset($personnes[0])) {
            return $personnes[0];
        }else{
            return false;
        }
    }

    /**
     * Permet de rechercher une personne dans la DB selon trois critères
     * Un sport, un niveau, ou un département
     */
    public function recherche($id_sport, $niveau, $id_departement) {

        $sql = 'SELECT NOM, PRENOM, personne.ID_PERSONNE FROM personne 
            INNER JOIN pratique ON personne.ID_PERSONNE = pratique.ID_PERSONNE 
            WHERE ID_DEPARTEMENT LIKE :id_departement AND 
            NIVEAU LIKE :niveau 
            AND ID_SPORT LIKE :id_sport';
        $requete = $this->db->prepare($sql);

        // Rempli les "champs" de la requête à la volée
        if ($id_departement != null) {
            $requete->bindValue(':id_departement', $id_departement, PDO::PARAM_INT);
        }
        else {
            $requete->bindValue(':id_departement', "%", PDO::PARAM_STR);
        }

        if ($id_sport != null) {
            $requete->bindValue(':id_sport', $id_sport, PDO::PARAM_INT);
        }
        else {
            $requete->bindValue(':id_sport',"%", PDO::PARAM_STR);
        }

        if ($niveau != null) {
            $requete->bindValue(':niveau', $niveau, PDO::PARAM_INT);
        }
        else {
            $requete->bindValue(':niveau', "%", PDO::PARAM_STR);
        }

        $requete->execute();

        while ($personne = $requete->fetch(PDO::FETCH_OBJ)) {
            $personnes[] = new Personne($personne);
        }
        $requete->closeCursor();


        if (isset($personnes[0])) {
            return $personnes;
        }else{
            return false;
        }
    }

    /**
     * Permet de modifier les informations d'une personne
     */
    public function update($personne){
        $sql = 'UPDATE personne
                    SET nom=:nom,
                    prenom=:prenom,
                    description=:description,
                    photo=:photo,
                    id_departement=:dpt,
                    mail=:mail,
                    mdpHash=:pwd
                    WHERE ID_PERSONNE=:id';

        $requete = $this->db->prepare($sql);

        // Requete préparée
        $requete->bindValue(':nom',$personne->getNom(),PDO::PARAM_STR);
        $requete->bindValue(':prenom',$personne->getPrenom(),PDO::PARAM_STR);
        $requete->bindValue(':description',$personne->getDescription(),PDO::PARAM_STR);
        $requete->bindValue(':photo',$personne->getPhoto(),PDO::PARAM_STR);
        $requete->bindValue(':dpt',$personne->getIdDepartement(),PDO::PARAM_INT);
        $requete->bindValue(':mail',$personne->getMail(),PDO::PARAM_STR);
        $requete->bindValue(':id',$personne->getidPersonne(),PDO::PARAM_INT);
        // Il faut de nouveau hasher le mot de passe fourni avec le même grain de sel

        // On hash le mot de passe s'il a changé
        if ($personne->getMDP() == $this->getPersonne($personne->getidPersonne())->getMDP()) {
            $pwd = $personne->getMDP();
            $requete->bindValue(':pwd',$pwd);
        } else {
            $pwd = $personne->getMDP();
            $salt = "48@!alsd";
            $pwd = hash('sha256', $pwd).$salt;
            $pwd = hash('sha256', $pwd);
            $requete->bindValue(':pwd',$pwd);
        }


        $requete->execute();

        $requete->closeCursor();
    }



    /**
     * Permet d'obtenir une personne selon son ID
     */
    public function getPersonne($id){
        $sql = 'SELECT ID_PERSONNE, NOM, PRENOM, DESCRIPTION, PHOTO, ID_DEPARTEMENT, MDPHASH 
                    FROM personne 
                    WHERE ID_PERSONNE=:id';

        $requete = $this->db->prepare($sql);

        // Requete préparée
        $requete->bindValue(':id',$id,PDO::PARAM_INT);


        $requete->execute();
        while ($personne = $requete->fetch(PDO::FETCH_OBJ)) {
            $personnes[] = new Personne($personne);
        }
        $requete->closeCursor();


        if (isset($personnes[0])) {
            return $personnes[0];
        }else{
            return false;
        }
    }
}

