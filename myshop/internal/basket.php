<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<style>
tr:nth-child(even) {background-color: #f2f2f2}
tr:nth-child(odd) {background-color:#99CCFF}
</style>
</head>

<body>
<?php 
include 'connectdb.php';
if(isset($_SESSION['id'])){
	$id = $_SESSION['id'];
	
	if(isset($_REQUEST['book'])){
		$_SESSION['basket'][] = $_REQUEST['book'];
		$arrayofbooks = $_SESSION['basket'];
	}
	else{
		if(isset($_SESSION['basket'])){
			$arrayofbooks = $_SESSION['basket'];
		}else{
			$arrayofbooks = null;
		}

	}
	if($arrayofbooks!=null){
		echo "<table style='width:70%'>";
		echo '<tr><th>Title</th><th>Description</th><th>Book</th></tr>';
		
		foreach($arrayofbooks as $i){
			$order = mysqli_query($conn,"select * from books where id='$i';");
			$row = $order->fetch_assoc();
			echo "<tr>";
			echo "<td>" . $row['name'] . "</td><td>" . $row['desc'] . "</td><td><img src='" . $row['icon'] . "' width='100' height='150'/></td>";			
			echo "</tr>";
			
		}
		echo '</table>';
	}

	
}
else{
	echo 'Log in to check your basket';
}
?>
</body>

</html>
