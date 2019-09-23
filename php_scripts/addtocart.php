<?php
	session_start();
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
	$status="";
	if (isset($_POST['name']) && $_POST['name']!=""){
		$name = $_POST['name'];
		$result = mysqli_query($conn,"SELECT * FROM `product` where `name` = '$name'");
      	$row = mysqli_fetch_assoc($result);
		$name = $row['name'];
		$price = $row['price'];
		$image = $row['image'];

		$cartArray = array(
			$name=>array(
			'name'=>$name,
			'price'=>$price,
			'quantity'=>1,
			'image'=>$image)
		);

		if(empty($_SESSION["shopping_cart"])) {
			$_SESSION["shopping_cart"] = $cartArray;
			$status = "<div class='box'>Product is added to your cart!</div>";
		}else{
			$array_keys = array_keys($_SESSION["shopping_cart"]);
			if(in_array($name,$array_keys)) {
				$status = "<div class='box' style='color:red;'>
				Product is already added to your cart!</div>";	
			} else {
				$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
				$status = "<div class='box'>Product is added to your cart!</div>";
			}

		}
	}
?>