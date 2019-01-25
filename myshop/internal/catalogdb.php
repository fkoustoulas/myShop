<?php 

include 'connectdb.php';
$i = 1;
$sql = "select * from books";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
	echo "<table style='width:70%'>";
	echo '<tr><th>Title</th><th>Description</th><th>Book</th></tr>';
	
	while($row = $result->fetch_assoc()){
		
		echo "<tr>";
		echo "<td style='font-weight:bold'>" . $row['name'] . "<br><a href='?p=basket&book=". $i . "'>Add to basket</a></td>";
		echo "<td>" . $row['desc'] . '</td>'; 
		echo "<td> <img src='" . $row['icon'] . "' width='100' height='150'/>" . '</td>';
		echo '</tr>';
		$i++;
	}
	echo '</table>';
	
}
else echo 'error on loading books data!';
$conn->close();

?>