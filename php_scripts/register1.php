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
	$name = "";
	$username = "";
	$password1 = "";
	$password2 = "";
	$email = "";
	$dob = "";
	$gender = "";
	$city = "";
	$mobile = "";
    if(isset($_POST['submit'])){
	    $name = mysqli_real_escape_string($conn,$_POST['name']);
		$username = mysqli_real_escape_string($conn,$_POST['username']);
		$password1 = mysqli_real_escape_string($conn,md5($_POST['pwd']));
		$password2 = mysqli_real_escape_string($conn,md5($_POST['pwd1']));
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$dob = mysqli_real_escape_string($conn,$_POST['DOB']);
		if(isset($_POST['gender']))
		{
			$gender = mysqli_real_escape_string($conn,$_POST['gender']);
		}
		$city = mysqli_real_escape_string($conn,$_POST['city']);
		$mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
		if(empty($name) || empty($username) || empty($password1) || empty($password2) || empty($email) || empty($dob) || empty($gender) || empty($city) || empty($mobile)){
			print '<script type="text/javascript">';
			print 'alert("All field must be filled");';
			print '</script>';
		}else{
			$user_check_query = "SELECT * FROM customers WHERE username='$username' OR email_id='$email' LIMIT 1";
			$result = mysqli_query($conn, $user_check_query);
			$user = mysqli_fetch_assoc($result);
			if($user){
				if($user['username'] === $username){
					print '<script type="text/javascript">';
					print 'alert("Username Exists");';
					print '</script>';
				}
				else if($user['email'] === $email) {
					print '<script type="text/javascript">';
					print 'alert("Email ID Exists");';
					print '</script>';
				}
			}
			else{
				$year = calculate_Year($dob);
				if($year>=18){
					if($password1==$password2){
				        /*$sql = "INSERT INTO customers (username,name,password,email_id,dateofbirth,gender,city,mobile_no)VALUES ('$username','$name','$password1','$email','$dob','$gender','$city','$mobile')";
					    if ($conn->query($sql) === TRUE) {
					        print '<script type="text/javascript">';
							print 'alert("Registered Successfully");';
							print '</script>';
							$_SESSION['username'] = $username;
  							$_SESSION['success'] = "You are now logged in";
							header("Location: index.php");
				        }else {
				            print '<script type="text/javascript">';
							print 'alert("Registered Unsuccessful, Error '. $sql .' and '. $conn->error .'.");';
							print '</script>';
				        }*/
				        echo "<script>var modal = document.getElementById('myModal');
				        		var btn = document.getElementById('myBtn');
				        		var span = document.getElementsByClassName('close')[0];
				        		btn.onclick = function() {modal.style.display = 'block';}
				        		span.onclick = function() {modal.style.display = 'none';}
				        		window.onclick = function(event) {if (event.target == modal) {modal.style.display = 'none';}}
				        	</script>";
				    }
				    else{
				    	print '<script type="text/javascript">';
						print 'alert("password did not matched, try again");';
						print '</script>';
				    }
				}else{
					print '<script type="text/javascript">';
					print 'alert("Age is less than 18.");';
					print '</script>';
				}
			}
		}
        $conn->close();
    }
    function calculate_Year($birthday){
	    $today = new DateTime();
	    $diff = $today->diff(new DateTime($birthday));
	    return  $diff->y;
	}
	//LOGIN
	if (isset($_POST['login_submit'])) {
		$user_login = mysqli_real_escape_string($conn, $_POST['username']);
		$pwd_login = mysqli_real_escape_string($conn, $_POST['password']);
		if (empty($user_login)){
			print '<script type="text/javascript">';
			print 'alert("Username is required");';
			print '</script>';
		}
		else if (empty($pwd_login)) {
			print '<script type="text/javascript">';
			print 'alert("Password is required");';
			print '</script>';
		}
		else{
			$pwdencrypt = md5($pwd_login);
			$user_check_query = "SELECT * FROM customers WHERE username='$user_login' AND password='$pwdencrypt' LIMIT 1";
			$result = mysqli_query($conn, $user_check_query);
			if(mysqli_num_rows($result) == 1){
				$_SESSION['username'] = $user_login;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				print '<script type="text/javascript">';
				print 'alert("Invalid username [or] password");';
				print '</script>';
			}
		}
	}
	if(isset($_POST['otp_reg'])){
		$sql = "INSERT INTO customers (username,name,password,email_id,dateofbirth,gender,city,mobile_no)VALUES ('$username','$name','$password1','$email','$dob','$gender','$city','$mobile')";
					    if ($conn->query($sql) === TRUE) {
					        print '<script type="text/javascript">';
							print 'alert("Registered Successfully");';
							print '</script>';
							$_SESSION['username'] = $username;
  							$_SESSION['success'] = "You are now logged in";
							header("Location: index.php");
				        }else {
				            print '<script type="text/javascript">';
							print 'alert("Registered Unsuccessful, Error '. $sql .' and '. $conn->error .'.");';
							print '</script>';
				        }
	}
?>

