<?php

include("navbar.inc.php");

if (!empty($_GET["page"])){
    $page=$_GET["page"];
} else {
    $page=0;
}


switch ($page) {

    case 0:
        include("pages/accueil.php");
        break;

    case 1:
        if (!isset($_SESSION["pers"])) {
            include("pages/inscription.php");
        }
        else {
            include("pages/accueil.php");
        }
        break;

    case 2:
        if (!isset($_SESSION["pers"])) {
            include("pages/recherche.php");
        }
        else {
            include("pages/accueil.php");
        }
        break;


    default : 	include_once('pages/accueil.php');
}

?>