<?php $db=new Mypdo();
  $manager = new ArticleManager($db); 
  if (!empty($_GET['pagination'])){
    $pagination=$_GET['pagination'];
  }
  else {
    $pagination = 0;
  }
  ?>
  <h1>Liste des articles enregistés</h1>
  <?php $nbart=$manager->countArticles();
  ?>
  <p>Actuellement <?php echo $nbart; ?> articles sont enregistrés</p>
<center>
  <table>
    <tr>
      <th>Nom</th>
      <th>Description</th>
      <th>Date</th>
    </tr>
    <?php $listeArticles = $manager->getList($pagination);
    foreach ($listeArticles as $article) { ?>
      <tr>
        <td><a href="index.php?page=3&art_num=<?php echo $article->getNum(); ?>"> <?php echo $article->getTitre(); ?> </a></td>
        <td> <?php echo $article->getDesc(); ?> </td>
        <td> <?php echo $article->getDate(); ?> </td>
      </tr>
    <?php
    } ?>
  </table>
  <?php
  if ($pagination > 0){ ?>
    <a href="index.php?page=2&pagination=<?php echo $pagination-1 ?>">precedent</a>
  <?php } 
  if (!empty($manager->getList($pagination + 1))) { ?>
    <a href="index.php?page=2&pagination=<?php echo $pagination+1 ?>">suivant</a>
  <?php } ?>
</center>
