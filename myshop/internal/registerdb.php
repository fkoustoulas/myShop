<?php 
//establish connection with db
include "connectdb.php";

//post variables from form in register.php
$user = $_REQUEST['r_user'];
$password = $_REQUEST['r_pass'];
$postal = $_REQUEST['r_postal'];
$address = $_REQUEST['r_address'];


//boolean for user errors
$data = false;

//log for user errors
$msguser = "";
$msgpass = "";
$msgpostal = "";
$msgaddr = "";

include 'encr.php';
$sql = "select username from data where username = '" . encrypt($user, $key) . "';";
$result = mysqli_query($conn, $sql);

if(ctype_space($user) || $user==null){
	$msguser = "username is blank!";
	$data = true;
}
else if(mysqli_num_rows($result) > 0){
	$msguser = "username already exists!";
	$data = true;
}
if(ctype_space($postal) || $postal==null){
	$msgpostal = "postal code is blank!";
	$data = true;
}
if(ctype_space($address) || $address==null){
	$msgaddr = "password is blank!";
	$data = true;
}
if(ctype_space($password) || $password==null){
	$msgpass = "password is blank!";
	$data = true;
}


if($data){
	echo "<p style='color:red'>" . $msguser . "<br>" . $msgpass . "<br>" . $msgpostal . "<br>" . $msgaddr . "<br></p>";
	include 'register.php';
}
else{
	$sql = "insert into data(username, password, postalcode, address) values('" . encrypt($user, $key) . "','"  . hashpass($password, $key) . "','"  . encrypt($postal, $key) . "','"  . encrypt($address, $key) . "');";
  	if ($conn->query($sql) === TRUE) {
    	echo "New record created successfully";
    	include 'login.php';
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
}
$conn->close();
?>







