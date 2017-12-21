<?php
  $db = new Mypdo();
  $controller = new TableController($db);
?>
<div class="predef_query">
  <?php 
  if(empty($_POST["table_name_stats"])){ 
  $listeTables = $controller->getList(); ?>
  <label>Voir les stats de la table : </label><select name="table_name_stats" form="stats_form">
  <?php
      foreach ($listeTables as $table) { ?>
        <option value="<?php echo $table->getTableName(); ?>"><?php echo $table->getTableName(); ?></option>
      <?php
      } ?>
    </select> 
    <form method="post" action="#" id="stats_form">
      <input type="submit" value="Valider">
    </form>
    <?php 
  }
  else {
    echo "<h2>Stats de la table ".$_POST['table_name_stats']." !</h2>"; 
    $rows = $controller->countRows($_POST['table_name_stats']); ?>
    <table>
      <tbody>
        <tr>
          <th>Table</th>
          <th>Nombre de ligne</th>
        </tr> 
        <tr>
          <td><?php echo $_POST['table_name_stats']; ?></td>
          <td><?php echo $rows; ?></td>
        </tr>
      </tbody>
    </table>
  <?php } ?>
</div>