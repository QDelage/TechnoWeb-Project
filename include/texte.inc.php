<div id="texte">
<?php

include("pages/enTete.inc.php");

if (!empty($_GET["page"])){
	$page=$_GET["page"];}
	else
	{$page=0;
	}
switch ($page) {

case 1:
	// inclure ici la page ajouter citations
    // include("pages/nomDeLaPage.inc.php");
    break;

case 2:
	// inclure ici la page liste des citations
    // include("pages/nomDeLaPage.inc.php");
    break;

case 3:
	// inclure ici la page ajouter ville
    // include("pages/nomDeLaPage.inc.php");
    break;

case 4:
	// inclure ici la page ajouter ville
    // include("pages/nomDeLaPage.inc.php");
    break;

case 5:
	// inclure ici la page ajouter ville
    // include("pages/nomDeLaPage.inc.php");
    break;

default : 	include_once('pages/connexion.inc.php');
}

?>
</div>
