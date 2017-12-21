<?php
  $db = new Mypdo();
  $controller = new DataBaseController($db);
?>
<div class="predef_query">
  <?php 
  if(empty($_POST["db_name_del"])){?>
  <label>Supprimer une BD : </label><select name="db_name_del" form="del_form">
  	<?php $listeDataBases = $controller->getList();
    	foreach ($listeDataBases as $database) { ?>
    		<option value="<?php echo $database->getDBName(); ?>"><?php echo $database->getDBName(); ?></option>
    	<?php
    	} ?>
    </select>	
  	<form method="post" action="#" id="del_form">
  		<input type="submit" value="Supprimer">
    </form>
    <?php }
   	else {
   		$controller->delDataBase($_POST['db_name_del']);
   		echo "<h2>La base ".$_POST['db_name_del']." a été supprimée !</h2>";
   }
   ?>
</div>