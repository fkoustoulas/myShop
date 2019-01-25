<?php 	
	include "connectdb.php";
	include 'encr.php';
	$user = $_REQUEST['user'];
	$pass = $_REQUEST['password'];
	$sql = "select * from data where username = '" . encrypt($user, $key) . "' and password = '" . hashpass($pass, $key) . "';";
	
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {
		$row = $result->fetch_assoc();
		$_SESSION['username'] = decrypt($row['username'],$key);
		$_SESSION['id'] = $row['ID'];
		
		header('Location:'.$_SERVER['PHP_SELF']);
	} else {
	    echo "Invalid username or password";
	    include 'login.php';
	}
	$conn->close();
	
?>