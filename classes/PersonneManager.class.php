<?php

/***
 * Classe pour interfacer le serveur PHP au serveur MySQL
 */
class PersonneManager {
    private $db;

    public function __construct($db){
        $this->db = $db;
    }


    public function inscription($pers){
        $requete = $this->db->prepare(
            'INSERT INTO personne (NOM, PRENOM, ID_DEPARTEMENT, MAIL, MDPHASH) VALUES
            (:nom, :prenom, :dpt, :mail, :mdp);');

        $requete->bindValue(':nom',$pers->getNom());
        $requete->bindValue(':prenom',$pers->getPrenom());
        $requete->bindValue(':dpt',$pers->getIdDepartement());
        $requete->bindValue(':mail',$pers->getMail());

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

    public function connexion($mail, $pwd){
        $sql = 'SELECT MAIL, MDPHASH 
                    FROM PERSONNE 
                    WHERE per_login=:log AND per_pwd=:pwd';

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

        $personne = $requete->fetch(PDO::FETCH_OBJ);

        $requete->closeCursor();

        return $personne; // Retourne true ou false
    }

    
}

