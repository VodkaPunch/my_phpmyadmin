<?php
class Tendency{
	private $id_daily;
	private $positive;
	private $negative;
	private $undefined;
	private $date_daily;

	public function __construct($valeurs=array())
	{
		if (!empty($valeurs))
		$this->affecte($valeurs);
	}
	public function affecte($donnees){
		foreach ($donnees as $attribut => $valeur){
			switch ($attribut) {
				case 'id_daily':
					$this->setIdDaily($valeur);
					break;
				case 'positive':
					$this->setPositive($valeur);
					break;
				case 'negative':
					$this->setNegative($valeur);
					break;
				case 'undefined':
					$this->setUndefined($valeur);
					break;
				case 'date_daily':
					$this->setDateDaily($valeur);
					break;
			}
		}
	}

	public function setPositive($positive){
		$this->positive=$positive;
	}
	public function getPositive()
	{
		return $this->positive;
	}
	public function setNegative($negative){
		$this->negative=$negative;
	}
	public function getNegative()
	{
		return $this->negative;
	}
	public function setUndefined($undefined){
		$this->undefined=$undefined;
	}
	public function getUndefined()
	{
		return $this->undefined;
	}
	public function setDateDaily($date_daily){
		$this->date_daily=$date_daily;
	}
	public function getDateDaily()
	{
		return $this->date_daily;
	}
	public function setIdDaily($id_daily){
		$this->id_daily=$id_daily;
	}
	public function getIdDaily()
	{
		return $this->id_daily;
	}
}
