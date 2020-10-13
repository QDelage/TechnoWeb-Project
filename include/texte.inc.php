<?php

include("enTete.inc.php");

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
        include("pages/inscription.php");
        break;

    case 2:
        include("pages/recherche.php");
        break;


    default : 	include_once('pages/accueil.php');
}

?>