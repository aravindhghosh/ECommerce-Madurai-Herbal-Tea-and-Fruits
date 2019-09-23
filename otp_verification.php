<?php include('php_scripts/register.php') ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ECommerce - Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
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
              </div>
          </nav>
      </div>
    </div>
    <!--
      login form
    --> 
    <div class="login-page">
      <div class="form">
        <h1 align="center">LOGIN</h1>
        <form class="login-form" method="post" action="<?php 
                 echo $_SERVER['PHP_SELF']; ?>">
          <p><strong>Email Verification sent to <?php echo $_SESSION['email']; ?></strong></p>
          <?php if(isset($message)) { echo $message; } ?>
          <input type="password" name="otp" placeholder="Enter OTP"/>
          <button type="submit" name="otp_submit">Submit OTP</button>
          <p class="message">Not received? <a href="otp_verification.php?resend='1'.php">Resend</a></p>
        </form>
      </div>
    </div>
    <!--
      login form
    -->
    <?php include 'inc/footer.php' ?><!-- footer -->
    <?php include 'inc/navbar.php' ?>
</body>
</html>