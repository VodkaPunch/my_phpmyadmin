<?php
class DataBaseController{
	public function __construct($db)
	{
		$this->db = $db;
	}
	public function addDataBase($db_name)
	{
		$req = $this->db->prepare(
			'CREATE DATABASE IF NOT EXISTS '.$db_name.'');
		/*$req->bindValue(':db_name',$db_name,
			PDO::PARAM_STR);*/
		$req->execute();
	}

	public function delDataBase($db_name)
	{
		$req = $this->db->prepare(
			'DROP DATABASE '.$db_name.'');
		$req->execute();	
	}

	public function getList()
	{
		$sql = ('SHOW DATABASES');
		$req = $this->db->query($sql);
		while ($database=$req->fetch(PDO::FETCH_OBJ)){
			$listedatabases[] = new DataBase($database);
		}
		$req->closeCursor();
		return $listedatabases;
	}
}
