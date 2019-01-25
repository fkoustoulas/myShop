<?php 
	include 'connectdb.php';
	include 'encr.php';
	$user = $_SESSION['username'];
	$sql = "select * from data where username='" . encrypt($user, $key) . "';";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
		$row = $result->fetch_assoc();
		echo "User: " . decrypt($row['username'],$key) . "<br>";
		echo "Postal code: " . decrypt($row['postalcode'],$key) . "<br>";
		echo "Address: " . decrypt($row['address'],$key) . "<br>";
	}
?>
