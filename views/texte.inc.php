<div id="texte">
<?php
if (!empty($_GET["page"])){
	$page=$_GET["page"];}
	else
	{$page=0;
	}
switch ($page) {

case 0:
	// inclure ici la page accueil photo
	include_once('pages/accueil.inc.php');
	break;
case 1:
	// inclure ici la page ajouter ville
	include("pages/DB/DataBase.inc.php");
    break;
case 2:
// inclure ici la page lister  ville
	include("pages/listerArticles.inc.php");
    break;
case 3:
	include("pages/afficherArticle.inc.php");
	break;

case 4:
	include("pages/Connexion.inc.php");
	break;

case 5:
	include("pages/Inscription.inc.php");
	break;

case 6:
	include("pages/Deconnexion.inc.php");
	break;

default : 	include_once('pages/accueil.inc.php');
}

?>
</div>
