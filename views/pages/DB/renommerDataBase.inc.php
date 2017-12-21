<?php
  $db = new Mypdo();
  $controller = new DataBaseController($db);
?>
<div class="predef_query">
  <?php 
  if(empty($_POST["db_name_old"])){?>
  <label>Renommer la BD : </label><select name="db_name_old" form="rename_form">
    <?php $listeDataBases = $controller->getList();
      foreach ($listeDataBases as $database) { ?>
        <option value="<?php echo $database->getDBName(); ?>"><?php echo $database->getDBName(); ?></option>
      <?php
      } ?>
    </select> 
    <form method="post" action="#" id="rename_form">
      <label>Renommer en : </label><input type="text" name="db_name_new">
      <input type="submit" value="Renommer">
    </form>
    <?php }
    else {
      $controller->renameDataBase($_POST['db_name_old'], $_POST['db_name_new']);
      echo "<h2>La base ".$_POST['db_name_old']." a été renommée ".$_POST['db_name_new']."!</h2>";
   }
  ?>
</div>