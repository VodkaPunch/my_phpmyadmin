<?php
class TableController{
	public function __construct($db)
	{
		$this->db = $db;
	}
	public function addTable($db_name)
	{
		$req = $this->db->prepare(
			'CREATE TABLE IF NOT EXISTS '.$db_name.'');
		/*$req->bindValue(':db_name',$db_name,
			PDO::PARAM_STR);*/
		$req->execute();
	}

	public function delTable($db_name)
	{
		$req = $this->db->prepare(
			'DROP TABLE '.$db_name.'');
		$req->execute();	
	}

	public function renameTable($old_db, $new_db)
	{
		exec('mysqldump -u'.DBUSER.' -p'.DBPASSWD.' '.$old_db.' > temp.sql');
		$sql = ('CREATE TABLE '.$new_db.' CHARACTER SET \'utf8\'');
		$req = $this->db->query($sql);
		exec('mysql --user='.DBUSER.' -p'.DBPASSWD.' '.$new_db.' < temp.sql');
		$sql = ('DROP TABLE '.$old_db.'');
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
