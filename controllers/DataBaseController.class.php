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

	public function renameDataBase($old_db, $new_db){
		exec('mysqldump -u'.DBUSER.' -p'.DBPASSWD.' '.$old_db.' > temp.sql');
		$sql = ('CREATE DATABASE '.$new_db.' CHARACTER SET \'utf8\'');
		$req = $this->db->query($sql);
		exec('mysql --user='.DBUSER.' -p'.DBPASSWD.' '.$new_db.' < temp.sql');
		$sql = ('DROP DATABASE '.$old_db.'');
		$req = $this->db->query($sql);
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
