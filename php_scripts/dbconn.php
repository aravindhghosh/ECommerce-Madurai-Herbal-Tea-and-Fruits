<?php
	$servername = "localhost";
	$dbusername = "root";
	$password = "";
	$dbname = "ecommerce";
	// Create connection
	$conn = new mysqli($servername, $dbusername, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
?>