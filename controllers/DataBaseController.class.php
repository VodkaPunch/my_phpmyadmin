<?php
class DataBaseController{
	public function __construct($db)
	{
		$this->db = $db;
	}
	public function addDataBase($db_name)
	{
		$req = $this->db->prepare(
			'CREATE DATABASE IF NOT EXISTS :db_name');
		$req->bindValue(':db_name',$db_name,
			PDO::PARAM_STR);
		$req->execute();
	}
	
}
