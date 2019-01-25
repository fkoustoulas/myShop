<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
session_start();
if(!isset($_SESSION['username']))
	$_SESSION['username']='?';
if(!isset($_REQUEST['p']))
	$_REQUEST['p'] = 'home';
?>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>
<?php echo $_REQUEST['p']?>
</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
<?php
if(!isset($_SESSION['p']))
	$_SESSION['p']="home";
	include "internal/connectdb.php";
?>
<div class="leftmenu">
<?php 
if($_SESSION['username']=='?')
	echo "You must login to have access to this menu";
else{
	echo "<a href='index.php?p=orders'>Οι παραγγελίες μου</a><br>";
	echo "<a href='index.php?p=detailsdb'>Τα στοιχεια μου</a><br>";
	echo "<a href='index.php?p=logout'>Logout</a><br>";
}
?>
</div>
<div class="main">
<?php include $_REQUEST['p'] . ".php"?>
</div>
<div class="footer">
<div class="menu">
<?php include 'menu.php';
if($_SESSION['username']=='?')
	echo "<a href='index.php?p=login' class='mymenu' style='position:inherit;left:95%'>Login</a>";
else echo "<a href='index.php?p=detailsdb' class='mymenu' style='position:inherit;left:90%'>" . $_SESSION['username'] . "</a>";

?>

</div>


</div>
</body>

</html>
