<?php
class Table{
	private $table_name;

	public function __construct($valeurs=array())
	{
		if (!empty($valeurs))
		$this->affecte($valeurs);
	}
	public function affecte($donnees){
		foreach ($donnees as $attribut => $valeur){
			switch ($attribut) {
				case 'Table':
					$this->setTableName($valeur);
					break;
			}
		}
	}

	public function setTableName($table_name){
		$this->table_name=$table_name;
	}
	public function getTableName()
	{
		return $this->table_name;
	}
}
