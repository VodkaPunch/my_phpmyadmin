<?php
  $db = new Mypdo();
  $controller = new TableController($db); 
  if(empty($_POST["table_name_add"]) && empty($_POST['name_column0']))
  {?>
  <div class="predef_query">
    <form method="post" action="#" id="add_table">
      <label>Ajouter une table : </label><input type="text" name="table_name_add"><br>
      <label>Nombre de colonnes : </label><input type="number" min="1" name="nb_columns">
      <input type="submit" value="Ajouter">
    </form>
  </div>
  <?php }
  else if (!empty($_POST['table_name_add'])) { ?>
  <div class="predef_query" id="ajout_colonne">
    <form  method="post" action="index.php?page=2&database=<?php echo $_SESSION["db"]; ?>&table_name_add=<?php echo $_POST['table_name_add']; ?>&nb_columns=<?php echo $_POST['nb_columns'];?>" id="add_column">
      <?php  
      for ($i=0; $i < $_POST['nb_columns']; $i++) { ?>
      <div class="column_to_add">
        <label>Nom colonne : </label><input type="text" name="name_column<?php echo $i; ?>">
        <label>Type : </label><input type="text" name="type_column<?php echo $i; ?>">
        <label>Taille : </label><input type="text" name="size_column<?php echo $i; ?>">
      </div>
      <?php } ?>
      <input type="submit" value="Valider">
    </form>
  </div>
  <?php }
  else {
    $table_columns = "";
    for ($i=0; $i < $_GET['nb_columns'] - 1 ; $i++) { 
      $table_columns = $table_columns.$_POST['name_column'.$i.'']." ".$_POST['type_column'.$i.'']."(".$_POST['size_column'.$i.'']."),"; 
    }
    $table_columns = $table_columns.$_POST['name_column'.$i.'']." ".$_POST['type_column'.$i.'']."(".$_POST['size_column'.$i.''].")";
    $controller->addTable($_GET['table_name_add'],$table_columns);
    echo "<h2>La table ".$_GET['table_name_add']." a été ajoutée !</h2>";
  }
  ?>
