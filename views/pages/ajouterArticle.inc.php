<?php
$db = new Mypdo();
$manager = new ArticleManager($db);
if(empty($_POST["art_titre"])){
  ?><h1>Ajouter un article</h1><br>
  <form method="post" action="#" id="article-form" enctype="multipart/form-data">
    <input type="text" name="art_titre" placeholder="Titre">
    <input type="text" name="art_desc" placeholder="Description courte">
    <input type="date" name="art_date">
    <input type="file" name="art_image" size="50">
    <textarea type="textarea" rows="4" cols="50" name="art_texte" form="article-form" placeholder="Description longue..."></textarea>
    <input type="submit" value="Valider">
    <?php }
else {
  $imageData = file_get_contents($_FILES["art_image"]["tmp_name"]);
  $valeurs = array('art_titre' =>$_POST['art_titre'],'art_texte'=>$_POST['art_texte'],'art_desc'=>$_POST['art_desc'],'art_date'=>$_POST['art_date'], 'art_image'=>$db->quote($imageData) );
  $article = new Article($valeurs);
  $manager->add($article);
  echo '<h1>Ajouter un article</h1>';
  echo '<p><img src="./image/valid.png" alt="Valider" /> L article "<strong>'.$_POST['art_titre'].'</strong>" a été ajouté.';
} ?>
