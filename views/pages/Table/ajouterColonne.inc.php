<?php
  $db = new Mypdo();
  $controller = new TableController($db);
?>
<div class="predef_query">
  <?php 
  if(empty($_POST["table_name_mod"]) && empty($_POST["name_column_add"])){ 
  $listeTables = $controller->getList(); ?>
  <label>Ajouter une colonne à la table : </label><select name="table_name_mod" form="mod_form">
  <?php
      foreach ($listeTables as $table) { ?>
        <option value="<?php echo $table->getTableName(); ?>"><?php echo $table->getTableName(); ?></option>
      <?php
      } ?>
    </select> 
    <form method="post" action="#" id="ajout_colonne">
      <input type="submit" value="Valider">
    </form>
    <?php 
  } else if (!empty($_POST['table_name_mod'])) { ?>
  <div class="predef_query" id="ajout_colonne">
    <form  method="post" action="index.php?page=2&database=<?php echo $_SESSION["db"]; ?>&table_name_mod=<?php echo $_POST['table_name_mod']; ?>" id="mod_column">
      <div class="column_to_mod">
        <label>Nom colonne : </label><input type="text" name="name_column_add">
        <label>Type : </label><input type="text" name="type_column_add">
        <label>Taille : </label><input type="text" name="size_column_add">
      </div>
      <input type="submit" value="Valider">
    </form>
  </div>
  <?php }
  else {
    $table_columns = $_POST['name_column_add']." ".$_POST['type_column_add']."(".$_POST['size_column_add'].")";
    $controller->addColumn($_GET['table_name_mod'], $table_columns);
    echo "<h2>La colonne ".$_POST['name_column_add']." a été ajoutée !</h2>";
  } ?>
</div>