<?php
$db=new Mypdo();

if (isset($_POST['login']) && isset($_POST['mdp'])) {
    $req = ('SELECT * FROM users WHERE user_name=? AND user_passwd=?');
    $res = $db->prepare($req);
    $login = $_POST['login'];
    $mdp = md5($_POST['mdp']);
    $res->execute(array($login, $mdp));
    if ($res->rowCount() == 1) {
        $_SESSION['login'] = $login;
        $_SESSION['mdp'] = $mdp;
        $authOK = true;
        $url='index.php?page=4';
        header("Location: $url");
    }
    else {
    	echo "<h3>Oups</h3>";
    }
}
?>

<h1>Connexion utilisateur</h1>
<form action="index.php?page=4" method="post">
    <label for="nom">Nom :</label>
    <input type="text" name="login" id="nom" required />
    <label for="mdp">Mot de passe :</label>
    <input type="password" name="mdp" id="mdp" required />
    <input type="submit" value="Connexion">
</form>
<?php
if (isset($_SESSION['login'])){
	echo "<h3>Vous etes connectes</h3>";
}
?>
<a href="index.php?page=5">Vous inscrire</a>
