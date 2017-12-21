<?php
class TableController{
	public function __construct($db)
	{
		$this->db = $db;
	}
	public function addTable($table_name, $columns)
	{
		$req = $this->db->prepare(
			'CREATE TABLE IF NOT EXISTS '.$_SESSION["db"].'.'.$table_name.' ('.$columns.');');
		$req->execute();
	}

	public function delTable($table_name)
	{
		$req = $this->db->prepare(
			'DROP TABLE '.$table_name.'');
		$req->execute();	
	}

	public function renameTable($old_db, $new_db)
	{
		$sql = ('RENAME TABLE '.$_SESSION["db"].'.'.$old_db.' TO '.$_SESSION["db"].'.'.$new_db.'');
		$req = $this->db->query($sql);
	}

	public function getList()
	{
		$sql = ('SELECT TABLE_NAME AS `Table` FROM information_schema.TABLES WHERE TABLE_SCHEMA = "'.$_SESSION["db"].'" GROUP BY TABLE_NAME');
		$req = $this->db->query($sql);
		while ($res=$req->fetch(PDO::FETCH_OBJ)){
			$listetables[] = new Table($res);
		}
		return $listetables;
	}


	public function countRows($table_name)
	{
		$sql = ('SELECT TABLE_ROWS AS `Table` FROM information_schema.TABLES WHERE TABLE_SCHEMA = "'.$_SESSION["db"].'" AND TABLE_NAME = "'.$table_name.'"'); 
		$req=$this->db->query($sql);
		$res=$req->fetchColumn();

		return $res;
	}
}
