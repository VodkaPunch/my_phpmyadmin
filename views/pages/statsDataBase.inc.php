<?php
  $db = new Mypdo();
  $controller = new DataBaseController($db);
?>
<div class="predef_query">
  <?php 
  if(empty($_POST["db_name_stats"])){ ?>
  <label>Voir les stats de la BD : </label><select name="db_name_stats" form="stats_form">
    <?php $listeDataBases = $controller->getList();
      foreach ($listeDataBases as $database) { ?>
        <option value="<?php echo $database->getDBName(); ?>"><?php echo $database->getDBName(); ?></option>
      <?php
      } ?>
    </select> 
    <form method="post" action="#" id="stats_form">
      <input type="submit" value="Valider">
    </form>
    <?php 
  }
  else {
    echo "<h2>Stats de la base ".$_POST['db_name_stats']." !</h2>"; ?>
    <table>
      <tr>
        <th>Table</th>
        <th>Taille (Mb)</th>
        <th>Date de création</th>
      </tr>        
      <?php $listeTables = $controller->statsDataBase($_POST['db_name_stats']);
      foreach ($listeTables as $table ) { ?>
        <tr>
          <td><?php echo $table->nom_table; ?></td>
          <td><?php echo $table->size_mb; ?></td>
          <td><?php echo $table->date_creation; ?></td>
        </tr>
      <?php }
   }
   ?></table>
</div>