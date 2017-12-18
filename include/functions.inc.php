<?php
	function getEnglishDate($date){
		$membres = explode('/', $date);
		$date = $membres[2].'-'.$membres[1].'-'.$membres[0];
		return $date;
	}
	
	function addJours($date, $nbJours){
		$membres = explode('/', $date);
		$date = $membres[2].'-'.$membres[1].'-'.(intval($membres[0])+$nbJours);
		return $date;
	}
	
	function escape($valeur)
	{
    	// Convertit les caractères spéciaux en entités HTML
    	return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
	}
?>