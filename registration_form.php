<?php 
  include 'php_scripts/register.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ECommerce - Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/otp.css">
    <?php include 'inc/navbar_head.php' ?>
</head>
<body>
    <div class="navbar_outer_wrap">  
      <div class="container-fluid pr-0 pl-0 ">
          <nav class="navbar navbar-light navbar-expand-md bg-light  header">
              <a href=""><img src="images/logo.png" height="42" width="75"></a> 
              <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar2">
                  <ul class="navbar-nav  text-center nav_wrap">
                      <li class="nav-item active">
                          <a class="nav-link" href="index.php">Home </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#">Tea</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#">Fruits</a> 
                      </li>
                      
                   </ul>
                    <ul class="nav navbar-nav  flex-nowrap right_side_content">
                        <li class="nav-item">
                            <a href="login_form.php">Login</a>
                        </li>
                    </ul>
              </div>
          </nav>
      </div>
    </div>
    <!--
      login form
    --> 
    <div class="login-page">
      <div class="form">
        <h3 align="center">Create your Account</h3>
        <form class="register-form" method="post" action="<?php 
                 echo $_SERVER['PHP_SELF']; ?>">
          <input type="text" name="name" placeholder="name" required/>
          <input type="text" name="username" placeholder="username" required/>
          <input type="password" name="pwd" placeholder="password" required/>
          <input type="password" name="pwd1" placeholder="retype password" required/>
          <input type="text" name="email" placeholder="email address" required/>
          <input type="date" name="DOB" placeholder="DOB" required/>
          <label for="1"><input type="radio" name="gender" value="Male" checked>Male</label>
          <label for="2"><input type="radio" name="gender" value="Female">Female</label>
          <label for="3"><input type="radio" name="gender" value="Other">Other</label>
          <input type="text" name="city" placeholder="City" required/>
          <input type="number" name="mobile" placeholder="Mobile Number" required/>
          <button id="myBtn" type="submit" name="submit">Register</button>
          <p class="message">Already registered? <a href="login_form.php">Sign In</a></p>
        </form>
      </div>
    </div>
    <!--
      login form
    -->
    <!--
      OTP CODE STARTS
    -->
    <div id="myModal" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close">&times;</span>
          <h2>Modal Header</h2>
        </div>
        <div class="modal-body">
          <form class="register-form" method="post" action="<?php 
                     echo $_SERVER['PHP_SELF']; ?>">
              <input type="text" name="otp" placeholder="Enter your 6 digit OTP sent your mail" required/>
              <button type="submit" name="otp_reg">Confirm Registration</button>
              <p class="message">Already registered? <a href="login_form.php">Sign In</a></p>
            </form>
        </div>
        <div class="modal-footer">
          <h3>Modal Footer</h3>
        </div>
      </div>
    </div>
    <!--
      OTP CODE ENDS
    -->
    <?php include 'inc/footer.php' ?><!-- footer -->
    <?php include 'inc/navbar.php' ?>
    
</body>
</html>