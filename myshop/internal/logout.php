<?php 
	$_SESSION['username'] = '?';
	header('Location:'.$_SERVER['PHP_SELF']);
	session_destroy();
?>