<?php
 	$_SESSION['db'] = $_GET['database'];
 	require_once('ajouterTable.inc.php');
 	require_once('supprimerTable.inc.php');
 	require_once('renommerTable.inc.php');
	require_once('statsTable.inc.php');
	require_once('ajouterColonne.inc.php');
	require_once('modifierColonne.inc.php');
?>