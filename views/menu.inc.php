<?php $db=new Mypdo();
  $controller = new DataBaseController($db);
  ?>
<div id="menu">
	<div id="menuInt">
		<p><a href="index.php?page=0">Accueil</a></p>
		<?php $listeDataBases = $controller->getList();
    	foreach ($listeDataBases as $database) { ?>
    		<p><a href="#"><?php echo $database->getDBName(); ?></a></p>
    	<?php
    	} ?>
	</div>
</div>