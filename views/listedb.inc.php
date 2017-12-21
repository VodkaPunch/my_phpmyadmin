<?php $db=new Mypdo();
  $controller = new DataBaseController($db);
  ?>
<div id="menu">
	<div id="menuInt">
		<p><img src="views/image/accueil.gif" alt="accueil"><a href="index.php?page=0">Accueil</a></p>
		<?php $listeDataBases = $controller->getList();
    	foreach ($listeDataBases as $database) { ?>
    		<p><img src="views/image/s_db.png" alt="db"><a href="index.php?page=2&database=<?php echo $database->getDBName(); ?>"><?php echo $database->getDBName(); ?></a></p>
    	<?php
    	} ?>
	</div>
</div>