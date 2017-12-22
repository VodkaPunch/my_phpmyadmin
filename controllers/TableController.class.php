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
			'DROP TABLE '.$_SESSION["db"].'.'.$table_name.'');
		$req->execute();	
	}

	public function renameTable($old_db, $new_db)
	{
		$sql = ('RENAME TABLE '.$_SESSION["db"].'.'.$old_db.' TO '.$_SESSION["db"].'.'.$new_db.'');
		$req = $this->db->query($sql);
	}

	public function addColumn($table_name, $columns)
	{
		$req = $this->db->prepare(
			'ALTER TABLE '.$_SESSION["db"].'.'.$table_name.' ADD '.$columns.';');
		$req->execute();
	}

	public function modColumn($table_name, $old_column, $columns)
	{
		$req = $this->db->prepare(
			'ALTER TABLE '.$_SESSION["db"].'.'.$table_name.' CHANGE '.$old_column.' '.$columns.';');
		$req->execute();
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

	public function getColumns($table_name)
	{
		$sql =('SHOW COLUMNS FROM '.$_SESSION["db"].'.'.$table_name.'');
		$req = $this->db->query($sql);
		while ($res=$req->fetch(PDO::FETCH_OBJ)){
			$listecolumns[] = $res;
		}
		return $listecolumns;
	}

	public function countRows($table_name)
	{
		$sql = ('SELECT TABLE_ROWS AS `Table` FROM information_schema.TABLES WHERE TABLE_SCHEMA = "'.$_SESSION["db"].'" AND TABLE_NAME = "'.$table_name.'"'); 
		$req=$this->db->query($sql);
		$res=$req->fetchColumn();

		return $res;
	}
}
