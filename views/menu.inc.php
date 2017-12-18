<div id="menu">
	<div id="menuInt">
		<p><a href="index.php?page=0"><img src="image/accueil.gif" class="imagMenu" alt="Accueil"/>Accueil</a></p>
		<p><img src="image/sketchboard.png" class="imagMenu" alt="Articles"/>Articles</p>
		<ul>
			<?php if(isset($_SESSION['login'])){ ?>			
				<li><a href="index.php?page=1">Ajouter</a></li>
			<?php } ?>
			<li><a href="index.php?page=2">Lister</a></li>
		</ul>
	</div>
</div>