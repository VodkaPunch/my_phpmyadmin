<?php
class Fonction{
	private $fon_num;
	private $fon_libelle;

	public function __construct($valeurs=array())
	{
		if (!empty($valeurs))
		$this->affecte($valeurs);
	}
	public function affecte($donnees){
		foreach ($donnees as $attribut => $valeur){
			switch ($attribut) {
				case 'fon_num':
					$this->setNum($valeur);
					break;
				case 'fon_libelle':
					$this->setLibelle($valeur);
			}
		}
	}

	public function getNum()
	{
		return $this->fon_num;
	}

	public function setNum()
	{
		$this->fon_num=$fon_num;
	}

	public function getLibelle()
	{
		return $this->fon_libelle;
	}

	public function setLibelle()
	{
		$this->fon_libelle=$fon_libelle;
	}
}
