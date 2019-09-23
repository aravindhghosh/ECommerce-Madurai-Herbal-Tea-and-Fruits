<?php
  include 'php_scripts/addproducts.php';
  if(!isset($_SESSION)) 
  { 
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
    <!--
      login form
    --> 
    <div class="login-page">
      <div class="form">
        <h3 align="center">ADD PRODUCTS TO DB</h3>
        <form class="login-form" method="post" action="<?php 
                 echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
          <input type="text" name="name" placeholder="name" required/>
          <select name="products" required/>
            <option value="" disabled selected>Category</option>
            <option value="Tea">Tea</option>
            <option value="Coffee">Coffee</option>
            <option value="Fruits">Fruits</option>
          </select>
          <textarea placeholder="Description" name="description" required/></textarea>
          <input type="number" name="quantity" placeholder="quantity" min="1" max="1000" required/>
          <input type="text" name="amount" placeholder="price" required/>
          <label for="files" align="center">Upload Image for the products</label>
         <!-- <input type="file" name="product_image" accept="image/*" required/>-->
          <input type="file" name="image1" id="im" placeholder="choose image..." required/>
          <button type="submit" name="createproduct">Insert</button>
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