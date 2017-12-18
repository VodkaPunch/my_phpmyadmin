<?php
	session_unset();
	session_destroy();
	$url='index.php';
    header("Location: $url");
?>