<?php
  $db = new Mypdo();
  $controller = new TableController($db);
?>
<div class="predef_query">
  <?php 
  if(empty($_POST["table_name_old"])){?>
  <label>Renommer la BD : </label><select name="table_name_old" form="rename_form">
    <?php $listeTables = $controller->getList();
      foreach ($listeTables as $table) { ?>
        <option value="<?php echo $table->getTableName(); ?>"><?php echo $table->getTableName(); ?></option>
      <?php
      } ?>
    </select> 
    <form method="post" action="#" id="rename_form">
      <label>Renommer en : </label><input type="text" name="table_name_new">
      <input type="submit" value="Renommer">
    </form>
    <?php }
    else {
      $controller->renameTable($_POST['table_name_old'], $_POST['table_name_new']);
      echo "<h2>La table ".$_POST['table_name_old']." a été renommée ".$_POST['table_name_new']."!</h2>";
   }
  ?>
</div>