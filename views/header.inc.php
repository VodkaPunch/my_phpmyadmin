<?php session_start(); ?>
<!doctype html>
<html lang="fr">

<head>

  <meta charset="utf-8">

<?php
		$title = "Bienvenue sur MyPhpMyAdmin";?>
		<title>
		<?php echo $title ?>
		</title>

<link rel="stylesheet" type="text/css" href="views/css/stylesheet.css" />
</head>
	<body>
	<div id="header">	
		<div id="entete">
			<div class="colonne">
				<a href="index.php?page=0">
					<img src="views/image/boris.jpg" alt="Logo My blog" title="Logo My blog ETNA" width="30%" />
				</a>
			</div>
			<div class="colonne">
				Une alternance SVP
			</div>
			</div>
			<?php if(!isset($_SESSION['login'])) { ?>
			<div id="connect">
				<a href="index.php?page=4">Connexion</a>
			</div>
			<?php } 
			else { ?>
			<div id="connect">
				<a href="index.php?page=6">Deconnexion</a>
			</div>
			<?php } ?>
	</div>
	

