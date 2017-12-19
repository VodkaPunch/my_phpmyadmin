<?php
require_once("views/config.inc.php");
require_once("views/autoLoad.inc.php");
require_once("views/header.inc.php");

?>
<div id="corps">
<?php
if ((isset($_SESSION['authOk'])) && ($_SESSION['authOk'] == TRUE)) {
    require_once("views/listedb.inc.php");
    require_once("views/texte.inc.php");
}
else {
    require_once("views/pages/Connexion.inc.php");
}
?>
</div>

<div id="spacer"></div>
<?php
require_once("views/footer.inc.php"); ?>
