<?php
  session_start();
  if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
  }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ECommerce - Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <?php include 'inc/navbar_head.php' ?>
</head>
<body>
   <!--
    HEADER 
  -->
    <?php include 'inc/adminheader.php' ?>
  <!--
    HEADER  ENDS
  -->
  <br>
  <!-- 
    CONTENT AREA
  -->


  <!-- 
    CONTENT AREA
  -->
    <?php include 'inc/footer.php' ?><!-- footer -->
    <?php include 'inc/navbar.php' ?>
    
</body>
</html>