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
		$sql = ('SHOW TABLES');
		$req = $this->db->query($sql);
		while ($table=$req->fetch(PDO::FETCH_OBJ)){
			$listetables[] = new Table($table);
		}
		$req->closeCursor();
		return $listetables;
	}


	public function countRows($table_name)
	{
		$req = $this->db->prepare(
			'SELECT COUNT(*) FROM '.$table_name''); 
		$req->execute(); 
		$res = $req->fetchColumn(); 
	}

	public function namesTable($db_name)
	{
		$sql = ('SELECT TABLE_NAME AS `nom_table` FROM information_schema.TABLES WHERE TABLE_SCHEMA = "'.$db_name.'" GROUP BY TABLE_NAME');
		$req = $this->db->query($sql);
		while ($res=$req->fetch(PDO::FETCH_OBJ)){
			$listetables[] = $res;
		}
		return $listetables;
	}	
}
