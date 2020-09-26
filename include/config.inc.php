<?php
// Paramètres de la DB
// À modifier en fonction de la configuration

define('DBHOST', "localhost");
define('DBNAME', "PT");
define('DBUSER', "userName");
define('DBPASSWD', "mdp");
define('ENV','dev');
// pour un environememnt de production remplacer 'dev' (développement) par 'prod' (production)
// les messages d'erreur du SGBD s'affichent dans l'environememnt dev mais pas en prod
?>
