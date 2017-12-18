<?php
$db=new Mypdo();
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
	// on teste l'existence de nos variables. On teste également si elles ne sont pas vides
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) && (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm']))) {
	// on teste les deux mots de passe
    	if ($_POST['pass'] != $_POST['pass_confirm']) {
    		$erreur = 'Les 2 mots de passe sont différents.';
    	}
    	else {

    		// on recherche si ce login est déjà utilisé par un autre users
    		$req=('SELECT count(*) FROM users WHERE user_name="'.($_POST['login']).'"');
    		$res = $db->prepare($req);
            $res->execute();

    		if ($res->rowCount() == 1) {
        		$req = ('INSERT INTO users VALUES(NULL, "'.($_POST['login']).'", "'.(md5($_POST['pass'])).'")');
        		$res = $db->prepare($req);
                $res->execute();

        		exit();
    		}
    		else {
    		  $erreur = 'Un user possède déjà ce login.';
    		}
    	}
	}
	else {
	   $erreur = 'Au moins un des champs est vide.';
	}
}
?>
    Inscription à l'espace users :<br />
    <form action="#" method="post">
        Login : <input type="text" name="login" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>"><br />
        Mot de passe : <input type="password" name="pass" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"><br />
        Confirmation du mot de passe : <input type="password" name="pass_confirm" value="<?php if (isset($_POST['pass_confirm'])) echo htmlentities(trim($_POST['pass_confirm'])); ?>"><br />
        <input type="submit" name="inscription" value="Inscription">
    </form>
    <?php
    if (isset($erreur)) echo '<br />',$erreur;
    ?>