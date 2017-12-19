<?php
class DataBase{
	private $db_name;
	private $db_date;

	public function __construct($valeurs=array())
	{
		if (!empty($valeurs))
		$this->affecte($valeurs);
	}
	public function affecte($donnees){
		foreach ($donnees as $attribut => $valeur){
			switch ($attribut) {
				case 'Database':
					$this->setDBName($valeur);
					break;
/*				case 'db_date':
					$this->setDBDate($valeur);
					break;*/
			}
		}
	}

	public function setDBName($db_name){
		$this->db_name=$db_name;
	}
	public function getDBName()
	{
		return $this->db_name;
	}
/*	public function setDBDate($db_date){
		$this->db_date=$db_date;
	}
	public function getDBDate()
	{
		return $this->db_date;
	}*/
}
