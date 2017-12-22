<?php
  $db = new Mypdo();
  $controller = new TableController($db);
?>
<div class="predef_query">
  <?php 
  if(empty($_POST["table_name_col"]) && empty($_POST["name_column_mod"])){ 
  $listeTables = $controller->getList(); ?>
  <label>Modifier une colonne de la table : </label><select name="table_name_col" form="table_col_form">
  <?php
      foreach ($listeTables as $table) { ?>
        <option value="<?php echo $table->getTableName(); ?>"><?php echo $table->getTableName(); ?></option>
      <?php
      } ?>
    </select> 
    <form method="post" action="#" id="table_col_form">
      <input type="submit" value="Valider">
    </form>
    <?php 
  } else if (!empty($_POST['table_name_col'])) { ?>
  <div class="predef_query" id="ajout_colonne">
    <div class="column_to_mod">
      <select name="column_name_mod" form="col_mod_form">
        <label>Nom colonne : </label>
      <?php $listeColonnes = $controller->getColumns($_POST['table_name_col']);
      foreach ($listeColonnes as $colonne) {
      ?>
          <option value="<?php echo $colonne->Field ; ?>"><?php echo $colonne->Field;?></option>
      <?php } ?>
      </select>
    </div>
    <form id="col_mod_form"  method="post" action="index.php?page=2&database=<?php echo $_SESSION["db"]; ?>&table_name_col=<?php echo $_POST['table_name_col']; ?>">
      <div class="column_to_mod">
        <label>Nom colonne : </label><input type="text" name="name_column_mod">
        <label>Type : </label><input type="text" name="type_column_mod">
        <label>Taille : </label><input type="text" name="size_column_mod">
      </div>
      <input type="submit" value="Valider">
    </form>
  </div>
  <?php }
  else {
    $table_columns = $_POST['name_column_mod']." ".$_POST['type_column_mod']."(".$_POST['size_column_mod'].")";
    $controller->modColumn($_GET['table_name_col'], $_POST['column_name_mod'], $table_columns);
    echo "<h2>La colonne ".$_POST['column_name_mod']." a été modifiée !</h2>";
  } ?>
</div>