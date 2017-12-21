<?php
  $db = new Mypdo();
  $controller = new DataBaseController($db);
?>
<div class="predef_query">
  <?php 
  if(empty($_POST["db_name_add"]))
  {?>
    <form method="post" action="#" id="add_form">
      <label>Ajouter un BD : </label><input type="text" name="db_name_add">
      <input type="submit" value="Ajouter">
    </form>
  <?php }
  else {
    $controller->addDataBase($_POST['db_name_add']);
    echo "<h2>La base ".$_POST['db_name_add']." a été ajoutée !</h2>";
  }
  ?>
</div>
