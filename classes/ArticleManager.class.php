<?php
class ArticleManager{
	public function __construct($db)
	{
		$this->db = $db;
	}
	public function add($article)
	{
		$req = $this->db->prepare(
			'INSERT INTO article (art_num, art_titre, art_texte, art_desc, art_date, art_image) VALUES
				(:art_num, :art_titre, :art_texte, :art_desc, :art_date, :art_image)');
		$req->bindValue(':art_titre',$article->getTitre(),
			PDO::PARAM_STR);
		$req->bindValue(':art_texte',$article->getTexte(),
			PDO::PARAM_STR);
		$req->bindValue(':art_desc',$article->getDesc(),
			PDO::PARAM_STR);
		$req->bindValue(':art_date',$article->getDate(),
			PDO::PARAM_STR);
		$req->bindValue(':art_image',$article->getImage(),
			PDO::PARAM_LOB);
		$req->bindValue(':art_num',$article->getNum(),
			PDO::PARAM_INT);
		$req->execute();
	}
	public function getList($pagination)
	{
		$listearticles = array();
		$min = $pagination*5;
		$sql=('SELECT art_num, art_titre, art_texte, art_desc, art_date FROM article ORDER BY art_date ASC LIMIT '.$min.',5');
		$req=$this->db->query($sql);
		while ($article=$req->fetch(PDO::FETCH_OBJ)){
			$listearticles[] = new Article($article);
		}
		return $listearticles;
		$req->closeCursor();
	}
	public function getArticleByNum($art_num){
		$listearticles = array();
		$sql=('SELECT art_titre, art_texte, art_image FROM article WHERE art_num='.$art_num.'');
		$req=$this->db->query($sql);
		while ($article=$req->fetch(PDO::FETCH_OBJ)){
			$listearticles[] = new Article($article);
		}
		return $listearticles;
		$req->closeCursor();
	}
	public function countArticles(){
		$sql=('SELECT COUNT(*) as nbart FROM article');
		$req=$this->db->query($sql);
		$donnees=$req->fetch();
		return $donnees['nbart'];
	}
}
