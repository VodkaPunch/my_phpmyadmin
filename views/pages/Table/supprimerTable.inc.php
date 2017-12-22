<?php
  $db = new Mypdo();
  $controller = new TableController($db);
?>
<div class="predef_query">
  <?php 
  if(empty($_POST["table_name_del"])){?>
  <label>Supprimer une table : </label><select name="table_name_del" form="del_form">
  	<?php $listeTables = $controller->getList();
    	foreach ($listeTables as $table) { ?>
    		<option value="<?php echo $table->getTableName(); ?>"><?php echo $table->getTableName(); ?></option>
    	<?php
    	} ?>
    </select>	
  	<form method="post" action="#" id="del_form">
  		<input type="submit" value="Supprimer">
    </form>
    <?php }
   	else {
   		$controller->delTable($_POST['table_name_del']);
   		echo "<h2>La table ".$_POST['table_name_del']." a été supprimée !</h2>";
   }
   ?>
</div>