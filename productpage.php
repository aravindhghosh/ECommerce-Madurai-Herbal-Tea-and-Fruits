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
    <link rel="stylesheet" href="css/slide.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/productpage.css">
    <?php include 'inc/navbar_head.php' ?>
</head>
<body>
  <!--
    HEADER 
  -->
    <?php include 'inc/header.php' ?>
  <!--
    HEADER  ENDS
  -->
    <div class="hero">
  <div class="hero-nav">
    <i class="fa fa-arrow-left"></i>
    <i class="fa fa-arrow-right"></i>     </div>
  
  <div class="product-image">
    <img src="https://goo.gl/zbzb7l" alt="headphones">
  </div>
  
  <div class="product-info">
    <img src="http://www.beatsset.com/images/logo/studio-wireless-logo-main-2-O.png">
    
    <p>Donec sed odio dui. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Praesent commodo cursus magna, vel nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
    
    <h1 class="price">$379.99</h1>
  
    <a href="" class="btn buy-btn">Buy Now</a>
    
    <a href="" class="btn apple-btn"><i class="fa fa-apple"></i></a>
  </div>
</div>

  <!-- Footer -->
    <?php include 'inc/footer.php' ?>
    <!-- Footer -->
    <?php include 'inc/navbar.php' ?>
</body>
</html>