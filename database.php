<?php
	$servername = "localhost";
	$username = "hvlias";
	$password = "hvlias@123";
	$db = "db1";
	$connection = mysqli_connect($servername, $username, $password,$db);
	
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>