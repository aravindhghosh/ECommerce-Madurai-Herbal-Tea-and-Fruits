<?php
  include 'php_scripts/addtocart.php';
  if(!isset($_SESSION)){ 
    session_start(); 
  }
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
    <link rel="stylesheet" href="css/cart.css">
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
  <br>
    <div class="message_box" style="margin:10px 0px;">
      <?php echo $status; ?>
    </div>
  <div class="row">
    <?php 
      $result = mysqli_query($conn,"SELECT * FROM `product`");
      while($row = mysqli_fetch_assoc($result)){
    ?>
      <div class="column">
        <div class="card">
          <form method="POST" action="<?php 
                 echo $_SERVER['PHP_SELF']; ?>">
            <input type='hidden' name='name' value="<?php echo "".$row['name']; ?>" />
            <?php 
            echo '<img id="my" height="150" width="290" src="data:image;base64,'.$row['image'].' "> '; 
            ?>
            <h4><?php echo $row['name']; ?></h4>
            <p class="price"><?php echo "₹".$row['price']; ?></p>
            <p><button type='submit'>Add to Cart</button></p>
          </form>
        </div>
      </div>
    <?php }
    ?>
  </div>
  <br>
<!-- End promo area -->
    <!-- Footer -->
    <?php include 'inc/footer.php' ?>
    <!-- Footer -->
    <?php include 'inc/navbar.php' ?>
</body>
</html>