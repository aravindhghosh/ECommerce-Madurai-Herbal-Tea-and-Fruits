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
    if(isset($_POST['createproduct'])){
    	if(isset($_FILES['image1'])){
    	    $name = mysqli_real_escape_string($conn,$_POST['name']);
    	    $products = mysqli_real_escape_string($conn,$_POST['products']);
    		$description = mysqli_real_escape_string($conn,$_POST['description']);
    		$quantity = mysqli_real_escape_string($conn,$_POST['quantity']);
    		$price = mysqli_real_escape_string($conn,$_POST['amount']);
    	    $date_time = date("Y-m-d H:i:s");
    		$total_amount = mysqli_real_escape_string($conn,($price * $quantity));
    	    $image=addslashes($_FILES['image1']['tmp_name']);
    		$image=file_get_contents($image);
    		$image=base64_encode($image);
    	    //db insertion
    	    if(empty($products)){
    	    	print '<script type="text/javascript">';
    			print 'alert("All field must be filled");';
    			print '</script>';
    		}else{
    		    $sql = "INSERT INTO product (name,category,description,quantity,price,total_amount,image,createdtime)VALUES('$name','$products','$description','$quantity','$price','$total_amount','$image','$date_time')";
    			if ($conn->query($sql) === TRUE) {
    				header("Location: adminproduct.php");
    			}else {
    			    print '<script type="text/javascript">';
    				print 'alert("Insertion Unsuccessful, Error '. $sql .' and '. $conn->error .'.");';
    				print '</script>';
    			}
    		}
    	}else{
    		print '<script type="text/javascript">';
    		print 'alert("No Image Selected");';
    		print '</script>';
    	}
	}
?>

