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
	session_start();
	//cart
	if(!empty($_GET["action"])) {
		switch($_GET["action"]) {
			case "add":
				$qty = 1;
					$productByCode = mysqli_query($conn,"SELECT * FROM product WHERE code='" . $_GET["code"] . "'");
					$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$qty, 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
					
					if(!empty($_SESSION["cart_item"])) {
						if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
							foreach($_SESSION["cart_item"] as $k => $v) {
									if($productByCode[0]["code"] == $k) {
										if(empty($_SESSION["cart_item"][$k]["quantity"])) {
											$_SESSION["cart_item"][$k]["quantity"] = 0;
										}
										$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
									}
							}
						} else {
							$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
						}
					} else {
						$_SESSION["cart_item"] = $itemArray;
					}
					header("Location: Cart/cart.php");
			break;
			case "remove":
				if(!empty($_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($_GET["code"] == $k)
								unset($_SESSION["cart_item"][$k]);				
							if(empty($_SESSION["cart_item"]))
								unset($_SESSION["cart_item"]);
					}
				}
			break;
			case "empty":
				unset($_SESSION["cart_item"]);
			break;	
		}
	}
?>