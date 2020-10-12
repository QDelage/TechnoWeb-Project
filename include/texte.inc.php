<?php

include("pages/enTete.inc.php");

if (!empty($_GET["page"])){
    $page=$_GET["page"];
} else {
    $page=0;
}


switch ($page) {

    case 1:
        include("pages/inscription.inc.php");
        break;

    case 2:
        include("pages/recherche.php");
        break;


    default : 	include_once('pages/accueil.inc.php');
}

?>