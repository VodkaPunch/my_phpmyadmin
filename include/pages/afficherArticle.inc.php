<?php $db=new Mypdo();
  $manager = new ArticleManager($db); ?>
<div id="aff_art">
    <?php $listeArticles=$manager->getArticleByNum($_GET['art_num']);
    foreach ($listeArticles as $article) { ?>
        <h1> <?php echo $article->getTitre(); ?> </h1>

        <?php echo '<img src="data:image/png;base64,'.base64_encode( $article->getImage() ).'"/>'; ?>	
        <p> <?php echo $article->getTexte(); ?> </p>
    <?php } ?>
</div>
