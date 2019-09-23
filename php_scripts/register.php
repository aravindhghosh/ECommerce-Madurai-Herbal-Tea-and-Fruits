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
				if($year>=18 && $year<=120){
					if(strlen($password1)>=8 && strlen($password2)>=8){
						if($password1==$password2){
							/*$rndno=rand(100000, 999999);
							$_SESSION['username'] = $username;
							$_SESSION['name'] = $name;
							$_SESSION['password1'] = $password1;
							$_SESSION['email'] = $email;
							$_SESSION['dob'] = $dob;
							$_SESSION['gender'] = $gender;
							$_SESSION['city'] = $city;
							$_SESSION['mobile'] = $mobile;
							$_SESSION['otp'] = $rndno;
							$to = $email;
							$subject = "Email Verification for ECommerce Site";
							$txt = "Hi ".$name.", Your OTP is ".$rndno.".";
							$result = sendOTP($to,$subject,$txt);
							$message = "";
							if ($result == true) {
								header("Location: otp_verification.php");
							}
							else{
								$message = "<p><strong>OTP NOT SENT!!!!!!!!!!!</strong></p>";	
							}
					        */$sql = "INSERT INTO customers (username,name,password,email_id,dateofbirth,gender,city,mobile_no)VALUES ('$username','$name','$password1','$email','$dob','$gender','$city','$mobile')";
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
					    else{
					    	print '<script type="text/javascript">';
							print 'alert("password did not matched, try again");';
							print '</script>';
					    }//password match
					}else{
						print '<script type="text/javascript">';
						print 'alert("Password must contain atleast 8 Characters");';
						print '</script>';
					}//password len
				}else{
					print '<script type="text/javascript">';
					print 'alert("Age is less than 18.");';
					print '</script>';
				}//age
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
			/*$pwdencrypt = md5($pwd_login);
			$user_check_query = "SELECT * FROM admin WHERE admin_name='$user_login' AND password='$pwdencrypt' LIMIT 1";
			$result = mysqli_query($conn, $user_check_query);
			if(mysqli_num_rows($result) == 1){
				$_SESSION['username'] = $user_login;
				$_SESSION['success'] = "You are now logged in";
				header('location: admin.php');
			}else{*/
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
	}
	if (isset($_POST['otp_submit'])){
		$otp = $_SESSION['otp'];
		$totp = $_POST['otp'];
		if($otp==$totp){
			$username = $_SESSION['username'];
			$name = $_SESSION['name'];
			$password1 = $_SESSION['password1'];
			$email = $_SESSION['email'];
			$dob = $_SESSION['dob'];
			$gender = $_SESSION['gender'];
			$city = $_SESSION['city'];
			$mobile = $_SESSION['mobile'];
			$sql = "INSERT INTO customers (username,name,password,email_id,dateofbirth,gender,city,mobile_no)VALUES ('$username','$name','$password1','$email','$dob','$gender','$city','$mobile')";
			if ($conn->query($sql) === TRUE) {
			    print '<script type="text/javascript">';
				print 'alert("Registered Successfully");';
				print '</script>';
				$to = $email;
				$subject = "Thank you for Registration";
				$txt = "hi ".$name.", your account created successfully";
				$headers = "From: meenaatchi141996@gmail.com";
				mail($to,$subject,$txt,$headers);
				$_SESSION['username'] = $username;
  				$_SESSION['success'] = "You are now logged in";
				header("Location: index.php");
			}else {
				print '<script type="text/javascript">';
				print 'alert("Registered Unsuccessful, Error '. $sql .' and '. $conn->error .'.");';
				print '</script>';
			}
		}else{
			/*print '<script type="text/javascript">';
			print 'alert("Invalid OTP, Click resend");';
			print '</script>';*/
			$message = "<p><strong> Invalid OTP, click Resend </strong></p>";
		}
	}
	/*if(isset($_GET['resend'])){
		$otp = $_SESSION['otp'];
		$name = $_SESSION['name'];
		$email = $_SESSION['email'];
    	$to = $email;
		$subject = "Email Verification for ECommerce Site - (Resend)";
		$txt = "Hi ".$name.", Your OTP is ".$otp.".";
		$result = sendOTP($to,$subject,$txt);
		if ($result == true) {
			$message = "<p><strong>OTP SENT AGAIN!!!!!!!!!!!</strong></p>";
		}
		else{
			$message = "<p><strong>OTP NOT SENT!!!!!!!!!!!</strong></p>";	
		}
  	}
  	function sendOTP($to1,$subject1,$txt) {
  		require('src/PHPMailer.php');
  		require('src/PHPMailerAutoload.php');
		require('src/SMTP.php');
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug = 2;
		$mail->SMTPAuth = false;
		$mail->Host = "smtp.gmail.com";
		$mail->Port = "587";
		$mail->SMTPSecure = 'tls'; // tls or ssl
		$mail->Username = "aravindhghosh.p@gmail.com";
		$mail->Password = "Ar@vindh96";
		$mail->From = "aravindhghosh.p@gmail.com";
		$mail->FromName = "Aravindh Ghosh";
		$mail->AddAddress($to1);
		$mail->Subject = $subject1;
		$mail->Body = ($txt);
		if(!$mail->Send()) {
		    echo "Mailer Error: " . $mail->ErrorInfo;
		    return false;
		 } else {
		    return true;
		 }
		require_once "Mail.php";
		$from = 'aravindhghosh.p@gmail.com';
		$to = $to1;
		$subject = $subject1;
		$body = $txt;

		$headers = array(
		    'From' => $from,
		    'To' => $to,
		    'Subject' => $subject
		);

		$smtp = Mail::factory('smtp', array(
		        'host' => 'ssl://smtp.gmail.com',
		        'port' => '465',
		        'auth' => true,
		        'username' => 'aravindhghosh.p@gmail.com',
		        'password' => 'Ar@vindh96'
		    ));

		$mail = $smtp->send($to, $headers, $body);

		//return $mail;
	}*/
?>

